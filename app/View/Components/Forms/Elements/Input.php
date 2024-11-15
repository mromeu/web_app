<?php

namespace App\View\Components\Forms\Elements;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
        public string $id = '',
        public string $name,
        public bool $required = false,
        public $placeholder = null,
        public $value = null,
        public $col = '',
        public $label = null,
        public $model = null,
    )
    {
        //
        $this->type     = $type;
        $this->id       = $id;
        $this->name     = $name;
        $this->placeholder = $placeholder;
        $this->model    = $model;
        $this->value    = $value;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.forms.elements.input');
    }

}
