<?php


namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;

class Categories extends Controller
{

    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->categoryName;
        $category->save();

        return view('recipes/categories/add', ['actionMessage' => 'Kategoria została dodana']);

    }
}