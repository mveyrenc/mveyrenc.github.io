<?php

class MyParentClass {

    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    public function myPublic() {
        return $this->public;
    }

    protected function myProtected() {
        return $this->protected;
    }

    private function myPrivate() {
        return $this->private;
    }

}

class MyClass extends MyParentClass {}

$parentObjet = new MyParentClass();
var_dump($parentObjet->public);           // Affiche string(6) "Public"
var_dump($parentObjet->protected);        // PHP Fatal error:  Cannot access protected property MyParentClass::$protected
var_dump($parentObjet->private);          // PHP Fatal error:  Cannot access private property MyParentClass::$private
var_dump($objet->myPublic());       // Affiche string(6) "Public"
var_dump($parentObjet->myProtected());    // PHP Fatal error:  Call to protected method MyParentClass::myProtected()
var_dump($parentObjet->myPrivate());      // PHP Fatal error:  Call to protected method MyParentClass::myPrivate()

$objet = new MyClass();
var_dump($objet->public);           // Affiche string(6) "Public"
var_dump($objet->protected);        // PHP Fatal error:  Cannot access protected property MyClass::$protected
var_dump($objet->private);          // PHP Notice:  Undefined property: MyClass::$private
var_dump($objet->myPublic());       // Affiche string(6) "Public"
var_dump($objet->myProtected());    // PHP Fatal error:  Call to protected method MyClass::myProtected()
var_dump($objet->myPrivate());      // PHP Fatal error:  Call to private method MyParentClass::myPrivate()