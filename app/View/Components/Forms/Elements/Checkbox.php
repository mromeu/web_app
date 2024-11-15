<?php

namespace App\View\Components\Forms\Elements;
use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $name,
        public $checked = false,
        public $label = null,
        public $model = null,
    )
    {
        //
        $this->id       = $id;
        $this->name     = $name;
        $this->model    = $model;
        $this->label    = $label;
        $this->checked  = $checked;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.forms.elements.checkbox');
    }

}
