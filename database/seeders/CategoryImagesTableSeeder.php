<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_images')->delete();
        
        \DB::table('category_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'path' => 'UFPUZVheUZixz0ImLrctdyfqskcXX5XLB8OKwBc8.webp',
                'category_id' => 1,
                'created_at' => '2025-12-13 16:20:59',
                'updated_at' => '2025-12-13 16:20:59',
            ),
            1 => 
            array (
                'id' => 2,
                'path' => 'lm5EleM1heWxnXADS0Pxp4Lu3Rq9a7DCmijmQGeJ.webp',
                'category_id' => 2,
                'created_at' => '2025-12-13 16:21:13',
                'updated_at' => '2025-12-13 16:21:13',
            ),
        ));
        
        
    }
}