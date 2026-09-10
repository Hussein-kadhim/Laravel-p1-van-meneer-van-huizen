<?php
namespace App\Providers\Categories;
 
use App\Models\Category;

class index
{
   public function  index()
   {
      $categories = Category::all();
      return $categories->toArray();
   }
}