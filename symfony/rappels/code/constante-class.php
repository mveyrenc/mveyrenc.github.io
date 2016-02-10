<?php

class MyClass
{

    const CONST_VALUE = 'Une valeur constante';

    public function displayConst()
    {
        echo self::CONST_VALUE;
    }

}

echo MyClass::CONST_VALUE;
