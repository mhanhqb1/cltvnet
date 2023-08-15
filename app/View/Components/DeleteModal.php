<?php
namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $id,
        public string $url,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delete-modal', [
            'id' => $this->id,
            'url' => $this->url
        ]);

    }
}
