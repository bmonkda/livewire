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

    public $active;
    
    public $count = 0;

    public $open = true;

    function save() {
        array_push($this->paises, $this->pais);
        $this->reset('pais');
    }

    function delete($index) {
        unset($this->paises[$index]);
    }

    function changeActive($pais) {
        $this->active = $pais;
    }

    function increment() {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.paises');
    }
}
