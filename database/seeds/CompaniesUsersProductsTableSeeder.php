<?php

use Illuminate\Database\Seeder;

class CompaniesUsersProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create a companies
         */
        factory( \Logistic\Company::class, 2 )
            ->create()
            ->each(function ($company) {
                /**
                 * Create new users
                 */
                $company->users()->saveMany( factory( \Logistic\User::class, 4 )->make() );
                /**
                 * Create new products
                 */
                $company->products()->saveMany( factory( \Logistic\Product::class, 15 )->make() );
            });

    }
}
