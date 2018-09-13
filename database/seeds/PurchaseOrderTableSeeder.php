<?php

use Illuminate\Database\Seeder;

class PurchaseOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \Logistic\Product::query();
        $products = $products->get(['id', 'price'])->random(15)->toArray();
        $products = array_pluck( $products, 'price', 'id' );
        factory( \Logistic\PurchaseOrder::class, 20 )
            ->create()
            ->each( function ( $purchase ) use ( $products ) {
                foreach ( $products as $key => $price ) {
                    $purchase->products_order()->save(
                        factory( \Logistic\ProductsOrder::class )->make([
                            'price'        => $price,
                            'product_id'   => $key,
                        ])
                    );
                }
            });
    }
}
