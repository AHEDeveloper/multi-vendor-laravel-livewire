<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sellers')->delete();
        
        \DB::table('sellers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'امیرحسین اسماعیلی',
                'shop_name' => 'دیجی کالا',
                'mobile' => '09165389234',
                'email' => 'esmailiamirhosein45@gmail.com',
                'password' => '$2y$12$J4df6wHcEnypZ06R4tLhHuVKs5tzWWE.JOC0kAITqcSrGKpPLv7c6',
                'address' => 'تیران کرون روستا افجان خیابان بیمارستان',
                'description' => '',
                'deleted_at' => NULL,
                'created_at' => '2025-12-13 16:21:29',
                'updated_at' => '2025-12-13 16:21:29',
            ),
        ));
        
        
    }
}