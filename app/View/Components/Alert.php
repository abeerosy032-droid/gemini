<?php
namespace App\View\Components;
use Illuminate\View\Component;

// 5. Blade Component يمتلك Logic داخلي لترجمة النوع (type) إلى ألوان وتنسيقات
class Alert extends Component {
    public $type;
    public $message;
    public $colorClass;

    public function __construct($type = 'info', $message = '') {
        $this->type = $type;
        $this->message = $message;
        $this->colorClass = $this->getColorClass();
    }

    private function getColorClass() {
        return match($this->type) {
            'success' => 'bg-green-100 text-green-800 border-green-300',
            'error' => 'bg-red-100 text-red-800 border-red-300',
            'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
            default => 'bg-blue-100 text-blue-800 border-blue-300',
        };
    }

    public function render() { return view('components.alert'); }
}