<?php
namespace Abode;

class Abode {
    public function getName() {
        return env('ABODE_NAME', 'Humble Abode');
    }
    public function getBackground() {
        return env('ABODE_BACKGROUND', '');
    }
}
?>