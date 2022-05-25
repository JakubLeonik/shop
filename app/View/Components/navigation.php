<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class navigation extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation', [
            'categories' => $this->categories
        ]);
    }
}
