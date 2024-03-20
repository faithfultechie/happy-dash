<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use WireUi\View\Components\Modal;
use LivewireUI\Modal\ModalComponent;

class EditCategoryModal extends ModalComponent
{
    public $category, $name;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function saveCategory()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', Rule::unique(Category::class)->ignore($this->category)],
        ]);

        $this->category->update($validatedData);
        $this->closeModal();
        $this->dispatch('pg:eventRefresh-default');
    }

    public function render()
    {
        return view('livewire.edit-category-modal');
    }
}
