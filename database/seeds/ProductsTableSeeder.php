<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;
use App\Category;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class,100)->create(); //llamo a mi fatory de prodcutos, le digo que creee cien productos
        factory(Category::class,5)->create();
        factory(ProductImage::class,200)->create();
    }
}
