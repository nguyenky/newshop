<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Faker\Factory;
class ProductsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats       = Category::all()->pluck('id');
        $brands     = Brand::all()->pluck('id');
        $arrCats    = $cats->toArray();
        $arrBrands  = $cats->toArray();
        Product::truncate();
        $faker = Factory::create();
        for( $i =0;$i <= 2; $i++ ){
            Product::create([
                'name' => $faker->text($maxNbChars =20),
                'category_id' => $arrCats[$random_keys=array_rand($arrCats,1)],
                'price' => rand(10,1000),
                'tag_id' => rand(1,5),
                'created_by' => 1,
                'picture' => $faker->imageUrl($width = 268, $height=249, 'fashion', true, 'Faker', false),
                'preview' => $faker->text($maxNbChars =200),
                'brand_id' => $arrBrands[$random_keys=array_rand($arrBrands,1)],
                'slide' => true
            ]);
        }
        for( $i =0;$i <= 200; $i++ ){
        	Product::create([
        		'name' => $faker->text($maxNbChars =20),
		        'category_id' => $arrCats[$random_keys=array_rand($arrCats,1)],
		        'price' => rand(10,1000),
		        'tag_id' => rand(1,5),
		        'created_by' => 1,
		        'picture' => $faker->imageUrl($width = 268, $height=249, 'fashion', true, 'Faker', false),
		        'preview' => $faker->text($maxNbChars =200),
		        'brand_id' => $arrBrands[$random_keys=array_rand($arrBrands,1)],
		        'slide' => false
        	]);
        }
    }
}
