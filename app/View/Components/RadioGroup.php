<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = '',
        public array $options = [],
        public ?string $value = '',
        public ?bool $hasAllOption = false,
        public ?string $label = null,
        public ?bool $required = false
    ) {
        $this->withLabels();

        if ($hasAllOption) {
            array_unshift($this->options, 'All');   //put the all at the first.
        }
    }

    protected function withLabels()
    {
        $this->options =  array_is_list($this->options) ?
            array_combine($this->options, $this->options) : $this->options;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}
