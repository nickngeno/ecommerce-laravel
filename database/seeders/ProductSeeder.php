<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=> 'Liverpool',
                'description'=>'home kit',
                'price'=>'120',
                'picture'=>'https://store.liverpoolfc.com/media/catalog/product/cache/236ed41ccdfb36d5c5b8767303b43c6f/C/Z/CZ2643.jpg'
            ],
            [
                'name'=> 'Chelsea',
                'description'=>'home kit',
                'price'=>'79',
                'picture'=>'https://productview2.fanobject.com/0027/9741/00279741_00.jpg?'
            ],
            [
                'name'=> 'Manchester United',
                'description'=>'home kit',
                'price'=>'150',
                'picture'=>'https://images.footballfanatics.com/manchester-united/manchester-united-home-shirt-2020-21_ss4_p-12013843+u-xtr1w4xbtu4xsrdzdz8+v-8ec7537ae24f4568bc623ff9279cf738.jpg?_hv=1&w=340'
            ],
            [
                'name'=> 'Manchester City',
                'description'=>'home kit',
                'price'=>'100',
                'picture'=>'https://images.footballfanatics.com/manchester-city/manchester-city-home-shirt-2020-21_ss4_p-12014287+u-1h0c9x7zhod9c4jnxjvu+v-cdc2c3c260364949bbcbdb029d515b17.jpg?_hv=1&w=340'
            ]
        ]);
    }
}
