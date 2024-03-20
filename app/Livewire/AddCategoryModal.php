<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddCategoryModal extends ModalComponent
{
    public $name;

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function saveCategory()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Category::class)],
        ]);
        $category = Category::create([
            'name' => $this->name,
        ]);
        $this->resetInputFields();
        $this->dispatch('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-category-modal');
    }
}
