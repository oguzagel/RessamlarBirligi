<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputText extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public  $name; 
    public $head;
    public $value;
    public $type;
    
     public function __construct( $name , $head='', $value=null, $type='text'  )
    {
        $this->name = $name;
        $this->head = $head;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-text');
    }
}
