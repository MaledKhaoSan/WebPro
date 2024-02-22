<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertBox extends Component
{
    public string $title;
    public string $message;

    public function __construct($title = '', $message = '')
    {
        $this->title = $title;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alert-box');
    }
}
