<?php

namespace App\View\Components\Forms\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $index,
    )
    {
        //
        $this->index     = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.elements.button-group');
    }
}
