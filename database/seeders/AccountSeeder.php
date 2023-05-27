<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Product;
use App\Models\Shop;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ProductSeeder::class,
        // $account = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $account[] = Account::factory()->create();
        // }
        // for ($i = 0; $i < 10; $i++) {
        //     $shop = Shop::factory()->create();
        //     $account[$i]->shop($shop);
        //     $account[$i]->save();
        //     Product::factory()->count(20)->create(['shop_id' => $shop->id]);
        // }
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
        Account::factory()
            ->hasShop()
            ->create();
    }
}
