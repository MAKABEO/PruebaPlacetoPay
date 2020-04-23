<?php


namespace App\Http\View\Composer;


use App\Category;
use App\Product;
use Illuminate\View\View;

class ShopComposer
{
    /**
     * The user repository implementation.
     *
     * @var Product
     */
    protected $products;

    /**
     * The user repository implementation.
     *
     * @var Category
     */
    protected $categories;

    /**
     * Create a new profile composer.
     *
     * @param Product $products
     */
    public function __construct(Product $products, Category $categories)
    {
        // Dependencies automatically resolved by service container...
        $this->products = $products->paginate(12);
        $this->categories = $categories->all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['products' => $this->products, 'categories' => $this->categories]);
    }
}
