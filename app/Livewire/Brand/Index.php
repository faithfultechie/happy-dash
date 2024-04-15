<?php

namespace App\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithFileUploads;

    public $app_name, $logo, $footer_links;

    protected $listeners = ['refresh' => '$refresh'];

    public function save()
    {
        $validatedData = $this->validate([
            'app_name' => ['required', 'string'],
            'footer_links' => ['string', 'nullable'],
            'logo' => ['required', 'file', 'mimes:jpg,png,jpeg', 'nullable'],
        ]);

        if ($this->logo) {
            $validatedData['logo'] = $this->logo->store('documents', 'public');
        }
        Brand::create($validatedData);

        session()->flash('success', 'Settings updated successfully.');
        return redirect()->route('settings');
    }

    public function render()
    {
        return view('livewire.brand.index');
    }
}
