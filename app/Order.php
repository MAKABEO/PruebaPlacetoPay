<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_name','customer_email','customer_mobile','status','totalAmmount'
    ];

    public static  $rules = [
        'customer_name' => 'required|string|max:80',
        'customer_email' => 'required|string|max:120',
        'customer_mobile' => 'required|string|max:40',
        'status' => 'required|string|max:20',
        'user_id' => 'required|integer|exists:users,id',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
