<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        $tags = ['New','Sale Off','-50%','Hot','Common'];
        foreach ($tags as $key => $value) {
        	Tag::create([
        		'name' => $value,
        		'new_price' => rand(1,50),
                'slug_name' => 'slug_name_'.$key
        	]);
        }
    }
}
