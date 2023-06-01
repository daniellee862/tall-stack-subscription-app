<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class Landingpage extends Component
{
    public $email;
    public function subscribe()
    {
        $subscriber = Subscriber::create([
            'email' => $this->email,
        ]);
    }

    public function render()
    {
        return view('livewire.landingpage');
    }
}
