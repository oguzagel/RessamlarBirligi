<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AktifPasif extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $name; 
    public $head;
    public $value;
    
     public function __construct( $name , $head='', $value=1  )
    {
        $this->name = $name;
        $this->head = $head;
        $this->value = $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.aktif-pasif');
    }
}
