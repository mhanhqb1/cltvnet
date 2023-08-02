<?php
namespace App\View\Components;

use Illuminate\View\Component;

class InputTypes extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name,
        public string $type,
        public string $label,
        public ?string $value = '',
        public array $options = [],
        public mixed $renderData = null,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $params = [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value,
            'renderData' => $this->renderData,
            'options' => $this->options,
        ];
        $view = '';
        switch ($this->type) {
            case 'text':
                $view = 'input';
                break;
            case 'textarea':
                $view = 'textarea';
                break;
            case 'text_editor':
                $view = 'text-editor';
                break;
            case 'file':
                $view = 'file';
                break;
            case 'select':
                $view = 'select';
                break;
            default:
                $view = 'input';
                break;
        }
        return view('components.'.$view, $params);

    }
}
