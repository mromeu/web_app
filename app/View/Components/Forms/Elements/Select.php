<?php

namespace App\View\Components\Forms\Elements;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $id = null,
        public $name,
        public $required = false,
        public $label = '',
        public $options = [],
        public $selected = null,
        public $model = null,
        public $col = '',
    )
    {
        //
        $this->id       = $id;
        $this->name     = $name;
        $this->label    = $label;
        $this->options  = $options;
        $this->selected = $selected;        
        $this->model    = $model;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.forms.elements.select');
    }

}
