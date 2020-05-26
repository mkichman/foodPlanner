<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class RecipeProduct extends Model
{
    protected $table = 'recipes_products';

    public $timestamps = true;

    protected $fillable = ['productId', 'productQty', 'recipeId'];
}