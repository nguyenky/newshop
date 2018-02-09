<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandsDataSeeder::class);
        $this->call(CategoriesDataSeeder::class);
        $this->call(ProductsDataSeeder::class);
        $this->call(TagsDataSeeder::class);
    }
}
