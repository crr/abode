<?php

namespace App;

require_once __DIR__.'/../nest.class.php';

use App\User;
use Illuminate\Database\Eloquent\Model;

class Nest extends Eloquent
{
    public static $nest = new Nest();
    public function __construct(){}
}
