<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

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
