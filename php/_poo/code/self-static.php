<?php

class A {

    public static function qui() {
        echo __CLASS__;
    }

    public static function test() {
        self::qui();
    }

}

class B extends A {

    public static function qui() {
        echo __CLASS__;
    }

}

B::test();      // Affiche A

class C {

    public static function qui() {
        echo __CLASS__;
    }

    public static function test() {
        static::qui();
    }

}

class D extends C {

    public static function qui() {
        echo __CLASS__;
    }

}

D::test();      // Affiche D
