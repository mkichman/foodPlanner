<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $table = 'recipes_categories';

    public $timestamps = true;

    protected $fillable = ['categoryId', 'recipeId'];
}