<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

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


// Route::get('/tokens/create', function (Request $request) {
//     $email = $request->query('email');
//     $password = $request->query('password');
//     $name = $request->query('name');
//     if(!Auth::attempt(['email'=>$email,'password'=>$password]))
//     {
//         $user = User::create([
//             'name' => $name,
//             'email' => $email,
//             'password' => Hash::make($password)
//         ]);
//         $user->name = $name;
//         $user->email = $email;
//         $user->password = Hash::make($password);
//         $user->save();
//         if(Auth::attempt(['email' => $email, 'password' => $password])) {
//             $sellerToken = $user->createToken('seller token',['create','update','delete']);
//             $buyerToken = $user->createToken('buyer token',['create','update','delete']);
//             $guestToken = $user->createToken('guest token',['none']);
//             return [
//                 'sellerToken' => $sellerToken->plainTextToken,
//                 'buyerToken' => $buyerToken->plainTextToken,
//                 'guestToken' => $guestToken->plainTextToken,
//                 'this user' => Auth::user()
//             ];
//         }
//     }
// });

Route::get('/login',function(Request $request) {
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
        ];
    }
    // Invalid credentials
    return ['error' => 'Invalid credentials'];
});


Route::get('/hash',function(Request $request) {
    $password = $request->query('password');
    return Hash::make($password);
});



