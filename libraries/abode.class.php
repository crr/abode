<?php
namespace Abode;

use App\User;

class Abode {
    public function getName() {
        return env('ABODE_NAME', 'Humble Abode');
    }
    public function getDescription() {
        return env('ABODE_DESC', '');
    }
    public function getBackground() {
        return env('ABODE_BACKGROUND', '');
    }
    public function getNavBackground() {
        return env('ABODE_NAVBACKGROUND', '');
    }

    //User Functions
    public static function getUserName($input) {
        $name = User::find($input)->name;
        return $name;
    }
}
?>