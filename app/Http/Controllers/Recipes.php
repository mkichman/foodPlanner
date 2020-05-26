<?php


namespace App\Http\Controllers;


use App\Providers\RecipeServiceProvider;
use Illuminate\Http\Request;

class Recipes extends Controller
{

    protected $recipeService;

    public function __construct()
    {
        $this->recipeService = new RecipeServiceProvider();
    }

    public function index()
    {


        return view('recipes/recipes');
    }

    public function addRecipe()
    {
       $categories = $this->recipeService->getCategories();
       $categories = $categories->pluck('name')->all();

       return view('recipes/add', compact('categories'));
    }

    public function createRecipe(Request $request)
    {
        if(empty($request))
        {
            return;
        }

        $all = $request->all();
        $products = [];

        foreach($all as $key => $val)
        {
            if(strpos($key, 'product') !== false)
            {
                if(strpos($key, 'Id') !== false)
                {
                    //create array where key is product ID and value is product Qty
                    $iter = explode('Id', $key);
                    $products[$val] = $all['productQty' . $iter[1]];
                }
                continue;
            }
        }

        // put the data into recipes
        $recipeId = $this->recipeService->insertRecipe($request);

        // put products into recipes products
        $this->recipeService->insertProducts($products, $recipeId);

        // put categories into recipes categories
        $this->recipeService->insertCategories($all['categories'], $recipeId);
    }
}