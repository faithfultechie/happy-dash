<?php

namespace App\Livewire\Document;

use App\Models\Document;
use Livewire\Component;

class Show extends Component
{
    public Document $document;

    public function render()
    {
        return view('livewire.document.show');
    }
}
