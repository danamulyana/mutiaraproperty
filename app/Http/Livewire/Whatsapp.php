<?php

namespace App\Http\Livewire;

use App\Models\Utils;
use Livewire\Component;

class Whatsapp extends Component
{
    public $number_wa;
    public $message_wa;
    public $position_wa;

    public function mount()
    {
        $utils = Utils::find(1);

        $this->number_wa = $utils->whatsapp_no;
        $this->message_wa = $utils->whatsapp_message;
        $this->position_wa = $utils->whatsapp_position;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <div class="whatsapp-btn" style="{{ $position_wa === 0 ? 'left:40px;' : 'right:40px;' }}">
                    <a href="https://api.whatsapp.com/send?phone={{ $number_wa }}&text={{ $message_wa }}" class="logo" target="_blank">
                        <i class="ri-whatsapp-line"></i>
                    </a>
                </div>
            </div>
        blade;
    }
}
