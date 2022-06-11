<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success_message', 'Category has been deleted succssfully!');
    }
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
