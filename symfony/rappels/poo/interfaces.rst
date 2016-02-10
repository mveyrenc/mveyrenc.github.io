.. _rappels-poo-interface:

**********
Interfaces
**********

Les interfaces vous permettent de créer du code qui spécifie quelles méthodes une classe doit implémenter, sans avoir à définir comment ces méthodes fonctionneront.

Déclaration d'une interface
***************************

Les interfaces sont définies en utilisant le mot-clé ``interface``, de la même façon que pour une classe standard, mais sans qu'aucune des méthodes n'ait son contenu de spécifié.

De par la nature même d'une interface, toutes les méthodes déclarées dans une interface doivent être publiques.

.. code-block:: php

    interface iTemplate
    {
        public function setVariable($name, $var);
        public function getHtml($template);
    }

Utilisation d'une interface
***************************

L'opérateur ``implements`` permet de déclarer qu'une classe implémente une interface. Toutes les méthodes de l'interface doivent être implémentées dans une classe ; si ce n'est pas le cas, une
erreur fatale sera émise. Les classes peuvent implémenter plus d'une interface, en séparant chaque interface par une virgule.

.. code-block:: php

    class Template implements iTemplate
    {
        private $vars = array();

        public function setVariable($name, $var)
        {
            $this->vars[$name] = $var;
        }

        public function getHtml($template)
        {
            foreach($this->vars as $name => $value) {
                $template = str_replace('{' . $name . '}', $value, $template);
            }

            return $template;
        }
    }

.. note::
    Les interfaces peuvent être étendues comme des classes, en utilisant l'opérateur ``extends``.
