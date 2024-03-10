<?php

namespace App\Livewire;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalPagar extends Component
{
    public $modalPagar;
    public $showModal = false;
    public function render()
    {

        return view('livewire.modal-pagar');
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
