<?php
namespace App\Controllers\Products;
 
use App\Models\Product;

class index
{
   public function  index()
   {
      $products = Product::all();
      return $products->toArray();
   }
}