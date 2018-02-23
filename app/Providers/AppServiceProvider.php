<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('url',getenv('URL'));
        View::share('url_local',getenv('URL_LOCAL'));

        $objCategory = new Category;
        $objProducts = new Product;
        $objBrands = new Brand;
        $cats=  $objCategory->cats_parrent();
        $slide = $objProducts->slide();
        $brands = $objBrands->count_brands();

        View::share('catsPublic',$cats);
        View::share('slideProducts',$slide);
        View::share('brands',$brands);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
