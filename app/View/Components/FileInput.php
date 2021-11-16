<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $name; 
    public $head;
    
     public function __construct( $name , $head='' )
    {
        $this->name = $name;
        $this->head = $head;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-input');
    }
}
