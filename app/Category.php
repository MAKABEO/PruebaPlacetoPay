<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public static  $rules = [
        'name' => 'required|string|max:80',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
