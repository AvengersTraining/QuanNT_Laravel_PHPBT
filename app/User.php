<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $firstName = 'Alice';

    public $lastName = 'Bob';


    public static $macros = [];


    public static function addMacro($name, $macro) {
        static::$macros[$name] = $macro;
    }


    public function __call(string $name, array $arguments) {
        $macro = static::$macros[$name];
        return call_user_func_array($macro->bindTo($this, static::class), $arguments);
    }
}
