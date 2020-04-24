<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name','description','price'
    ];

    public static  $rules = [
        'product_name' => 'required|string|max:80',
        'description' => 'required|string|max:500',
        'price' => 'required|numeric',
        'category_id' => 'required|integer|exists:categories,id',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'ammount');
    }
}
