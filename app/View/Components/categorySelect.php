<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

// category select field
class categorySelect extends Component
{
    public $categories;
    public $currentCategory;

    public function __construct($currentCategory)
    {
        $this->currentCategory = $currentCategory;
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('components.category-select');
    }
}
