<?php

use Illuminate\Database\Seeder;

class IssueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new \Logistic\ProductsOrder;
        $model->chunk(50, function ($attributes) {
            foreach ($attributes as $attribute) {
                $attribute->issues()->save(
                    factory( \Logistic\Issue::class )->make()
                );
            }
        });

    }
}
