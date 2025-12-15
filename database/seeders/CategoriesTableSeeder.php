<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'موبایل',
                'category_id' => NULL,
                'created_at' => '2025-12-13 16:20:59',
                'updated_at' => '2025-12-13 16:20:59',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'سامسونگ',
                'category_id' => 1,
                'created_at' => '2025-12-13 16:21:13',
                'updated_at' => '2025-12-13 16:21:13',
            ),
        ));
        
        
    }
}