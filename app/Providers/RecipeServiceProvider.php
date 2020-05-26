<?php


namespace App\Providers;


use App\Category;
use App\Recipe;
use App\RecipeCategory;
use App\RecipeProduct;
use Illuminate\Http\Request;

class RecipeServiceProvider
{

    public function __construct()
    {
    }

    public function getRecipes()
    {

    }

    public function getCategories()
    {
        $model = $this->getCategoryModel();
        return $model->get();
    }
    protected function getModel()
    {
        return new Recipe();
    }

    protected function getCategoryModel()
    {
        return new Category();
    }

    protected function getRecipesProductsModel()
    {
        return new RecipeProduct();
    }

    public function insertRecipe(Request $request)
    {
        $model = $this->getModel();
        $model->name = $request->recipeName;
        $model->preparation = $request->preparation;

        $model->save();

        return $model->id;
    }

    public function insertProducts($products, $recipeId)
    {
        foreach($products as $id => $qty)
        {
            $data = [
                'productId' => $id,
                'productQty' => $qty,
                'recipeId' => $recipeId,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            RecipeProduct::insert($data);
        }
    }

    public function insertCategories($categories, $recipeId)
    {
        foreach($categories as $key => $id)
        {
            $data = [
                'categoryId' => $id,
                'recipeId' => $recipeId,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            RecipeCategory::insert($data);
        }
    }

}