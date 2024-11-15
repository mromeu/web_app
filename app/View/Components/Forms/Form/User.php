<?php

namespace App\View\Components\Forms\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class User extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $model,
        public $cargos,
    )
    {
        $this->model = $model;
        $this->cargos = $cargos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {

        return view('components.forms.form.user');
    }
}
