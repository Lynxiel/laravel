<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Log;

class Select extends Component
{
    public string $name;
    public string $model;
    public string $display;
    public string $value;
    public int|string|null|array $selected;
    public bool $multiple;

    public function __construct($name, $model, $display, $value = 'id', $selected = null, $multiple = false)
    {
        $this->name = $name;
        $this->model = $model;
        $this->display = $display;
        $this->value = $value;
        $this->selected = is_array($selected) ? $selected : [$selected];
        $this->multiple = $multiple;
    }

    public function options()
    {
        $modelClass = 'App\\Models\\' . $this->model;

        if (!class_exists($modelClass)) {
            throw new \Exception("Model class {$modelClass} does not exist.");
        }

        return $modelClass::pluck($this->display, $this->value)->toArray();
    }

    public function render()
    {
        return view('components.select', [
            'options' => $this->options()
        ]);
    }
}
