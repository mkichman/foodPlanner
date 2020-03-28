<?php


namespace App\Http\Controllers;



use App\Product;
use PhpParser\Node\Scalar\MagicConst\Dir;

class Products extends Controller
{

    public function index()
    {

        $products =  Product::all()->toArray();


//        dd($products);

//        echo '<pre>';
//        print_r($products);
//        die();

        $products = array_slice($products, 0, 20);


        return view('products/products', compact('products'));
    }
















}