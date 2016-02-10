<?php

class OtherClass extends MyClass
{

    public static $my_static = 'variable statique';

    public static function doubleColon()
    {
        echo parent::CONST_VALUE."\n";
        echo self::$my_static."\n";
    }

}

OtherClass::doubleColon();
