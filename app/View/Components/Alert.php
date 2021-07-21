<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * The alert type.
     *
     * @var String
     */
    public $type;

    /**
     * The aler message.
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public function __construct($type,$message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
