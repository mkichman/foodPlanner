<?php


namespace App\Http\Controllers;



use App\Product;
use App\Providers\ProductServiceProvider;
use Illuminate\Http\Request;

class Products extends Controller
{
    protected $productService;

    public function __construct()
    {
        $this->productService = new ProductServiceProvider();
    }

    public function index()
    {
        $products = Product::all()->toArray();

        $products = array_slice($products, 0, 20);


        return view('products/products', compact('products'));
    }


    public function searchProduct(Request $request)
    {
        if(empty($request))
        {
           return [];
        }

        if(empty($this->productService->searchedResult) || $request->searchProduct !== $this->productService->searchedProduct)
        {
            $this->productService->searchProduct($request->searchProduct);
        }

        $products = array_slice($this->productService->searchedResult, $request->start, $request->length);

        foreach($products as $key => $product)
        {
            $result['data'][] = array_values($product);
        }

        $resultCount = count($this->productService->searchedResult);
        $result['recordsTotal'] = $resultCount;
        $result['recordsFiltered'] = $resultCount;
        $result['draw'] = $request->draw;

        return $result;
    }

















}