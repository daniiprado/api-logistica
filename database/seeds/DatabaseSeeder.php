<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompaniesUsersProductsTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PurchaseOrderTableSeeder::class);
        $this->call(IssueTableSeeder::class);
    }
}
