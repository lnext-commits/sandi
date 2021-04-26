<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class HomeController extends Controller
{
    private $title = 'Главная';

    public function index ()
    {
        $names = [];
        $menu = [];
        $products = [];
        if (Category::count()){

            $mainCategories = Category::whereParentId('0')->get();

            foreach ($mainCategories as $mainCategory){
                $childCategories  = Category::whereParentId($mainCategory->id)->get();

                foreach ($childCategories as $childCategory){
                    $menu[$mainCategory->id][$childCategory->id] = Category::whereParentId($childCategory->id)->get()->toArray();
                }
            }
            $categoryAll = Category::with('product')->get();

            foreach ($categoryAll as $item){
                $names[$item->id] = $item->name_category;
                $products[$item->id] = $item->product()->get();
            }
        }
        return view('home', [
            'title' => $this->title,
            'names' => $names,
            'menu' => $menu,
            'products' => $products

        ]);
    }
    public function set ()
    {
        $xml = simplexml_load_file('sandi.xml');
        $flagSetCategory = Category::count();
        if($flagSetCategory == 0){
            foreach ( $xml->shop->categories->category as $item) {
                Category::create([
                    'id' => $item['id'],
                    'name_category' => $item['description'],
                    'parent_id' => $item['parentId'] ? $item['parentId'] : 0
                ]);
            }
        }
       $flagSetProduct = Product::count();
        if ($flagSetProduct == 0) {
            foreach ($xml->shop->offers->offer as $item){
                Product::create([
                    'category_id' => (int)$item->categoryId,
                    'name_product' => (string)$item->name,
                    'model' => (string)$item->model,
                    'vendor' => (string)$item->vendor,
                    'vendor_code' => (string)$item->vendorCode,
                    'description' => (string)$item->description,
                ]);
            }
        }
        return redirect(route('home'));
    }
}
