<?php


namespace App\Providers;

use App\Product;
use App\RecipeProduct;

class ProductServiceProvider
{
    public $searchedResult;
    public $searchedProduct;

    protected function getProductModel()
    {
        return new Product();
    }

    protected function getRecipeProductModel()
    {
        return new RecipeProduct();
    }

    public function searchProduct($productName)
    {
        $this->searchedProduct = $productName;

        $model = $this->getProductModel();
        $this->searchedResult =  $model->where('name', 'LIKE', '%'. $productName .'%')
            ->get(['id', 'name', 'kcal'])
            ->toArray();
    }


}