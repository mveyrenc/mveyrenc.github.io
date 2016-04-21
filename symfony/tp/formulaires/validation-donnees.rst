#########################
La validation des données
#########################

La validation des données est importante car elle permet de s'assurer que les données que nous avons en base sont cohérentes. Cette validation doit être effectuée à chaque fois que l'on enregistre des données en base, que ces données proviennent d'un formulaire, d'un import ou de toute au source.

Afin que cette validation soit effectuée à chaque fois, les **règles de validation** doivent être décrites **dans les entités**, et nulle part ailleurs.

********************************
Définir les règles de validation
********************************

Comme les indications destinées à l'ORM, les règles de validation sont décrites dans l'entité sous forme d'annotation au dessus de chaque champ à valider.

En premier lieu, il faut importer le namespace suivant :

.. code-block:: php

    use Symfony\Component\Validator\Constraints as Assert;

Ensuite, on peut utiliser ce namespace pour ajouter des contraintes :

.. code-block:: php
    :emphasize-lines: 27

    namespace Epsi\Bundle\BlogBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * Tag
     *
     * @ORM\Table()
     * @ORM\Entity(repositoryClass="Epsi\Bundle\BlogBundle\Entity\TagRepository")
     */
    class Tag
    {
        /**
         * @var integer
         *
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(name="name", type="string", length=30)
         * @Assert\NotBlank()
         */
        private $name;

        // ...
    }

Ici, on interdit que le champ ``name`` soit vide.

Si vous allez sur la page http://localhost/Symfony/web/app_dev.php/tag/new et que vous mettez juste un espace dans le ``name``, vous verrez apparaître le message 'This value should not be blank.' lors de la validation du formulaire.

Vous trouverez dans la documentation de Symfony toutes les contraintes disponibles par défaut : http://symfony.com/doc/2.7/reference/constraints.html.




