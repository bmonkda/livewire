<?php

namespace App\Livewire;

use Livewire\Component;

class Paises extends Component
{
    public $paises = [
        'Venezuela',
        'Colombia',
        'Brasil',
    ];

    public $pais;

    function save() {
        array_push($this->paises, $this->pais);
        $this->reset('pais');
    }

    function delete($index) {
        unset($this->paises[$index]);
    }

    public function render()
    {
        return view('livewire.paises');
    }
}
