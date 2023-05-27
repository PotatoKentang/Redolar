<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Illuminate\Support\Facades\Crypt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});



//make a example format for the login

Route::get('/login', function (Request $request) {
    $email = $request->query('email');
    $password = $request->query('password');

    // Retrieve the account based on the email
    $account = Account::where([
        'email'=>$email,
    ])->first();
    if ($account && Hash::check($password,$account->password)) {
        // Credentials are valid, generate a token for the account
        $sellerToken = $account->createToken('seller token',['create','update','delete']);
        $buyerToken = $account->createToken('buyer token',['create','update','delete']);
        $guestToken = $account->createToken('guest token',['none']);
        return [
            'sellerToken' => $sellerToken->plainTextToken,
            'buyerToken' => $buyerToken->plainTextToken,
            'guestToken' => $guestToken->plainTextToken,
            'account' => Crypt::encryptString($account->id)
        ];
    }
    // Invalid credentials
    return ['error' => 'Invalid credentials'];
});

Route::get('/register',function(Request $request){
    $name = $request->query('name');
    $email = $request->query('email');
    $password = $request->query('password');
    $phone = $request->query('phone');
    $image = $request->query('image');
    $account = Account::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'phone' => $phone,
        'image' => $image,
    ]);
    $account->save();
    return ['message' => 'Register successful'];
});

Route::get('/logout', function (Request $request) {
    // Retrieve the account ID from the encrypted account data
    $accountId = Crypt::decryptString($request->query('account'));

    // Retrieve the account based on the ID
    $account = Account::find($accountId);

    // Revoke all tokens for the account
    $account->tokens()->delete();

    // Logout successful
    return ['message' => 'Logout successful'];
});


Route::get('/hash',function(Request $request) {
    $password = $request->query('password');
    return Hash::make($password);
});



