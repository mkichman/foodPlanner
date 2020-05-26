<?php


namespace App\Providers;


use App\RecipeCategory;

class CategoryServiceProvider
{

    protected function getRecipesCategoriesModel()
    {
        return new RecipeCategory();
    }


}