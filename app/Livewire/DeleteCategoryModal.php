<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteCategoryModal extends ModalComponent
{
    public $category;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function delete()
    {
        try {
            $this->category->delete();
            $this->dispatch('pg:eventRefresh-default');
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Cannot delete category. Please make sure there are no associated records.');
            return redirect()->route('category.index');
        }
    }

    public function render()
    {
        return view('livewire.delete-category-modal');
    }
}
