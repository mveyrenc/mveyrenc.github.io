###############
Les formulaires
###############

:program:`Symfony` dispose du composant ``Form`` pour faciliter la création des formulaires. Ce composant permet de créer un formulaire à partir d'un objet existant, et son objectif est d'hydrater cet objet.

*******************************
Gestion basique d'un formulaire
*******************************

Prenons comme exemple le formulaire associé à l'entité ``Post`` :

.. literalinclude:: code-block/formulaire/Form_PostType.php
    :language: php


La méthode ``buildForm()`` permet de construire le formulaire en ajoutant des champs avec la méthode ``add()``.

Dans la méthode ``setDefaultOptions()``, on lie le formulaire à l'objet qu'il doit hydraté.

La méthode ``getName()`` doit retourner un identifiant unique.

Ensuite dans le contrôleur, on instancie un formulaire en lui passant un objet :

.. literalinclude:: code-block/formulaire/Controleur_PostController.php
    :language: php

Pour finir, on affiche le formulaire dans les templates Twig :

.. literalinclude:: code-block/formulaire/template_new.html.twig
    :language: html+jinja

Lorsque l'on affiche le formulaire, :program:`Symfony` choisit le champ HTML qui sera le plus adapté à l'attribut : le titre est une ligne de texte, la date est un ensemble de 5 listes déroulantes (jour, mois, années, heure, minute), le boby est un textarea et les tags, une sélection multiple.

Lors de la construction du formulaire, il est possible d'adapter en ajoutant un paramètre à la méthode ``add()`` dans ``buildForm()`` :

.. code-block:: php

    $builder
                ->add('title', 'text')
                ->add('date', 'date')
                ->add('body')
                ->add('author')
                ->add('tags')
        ;

Certains types peuvent prendre des paramètres. Pour plus d'informations voici la page de documentation de :program:`Symfony` : http://symfony.com/fr/doc/current/reference/forms/types.html

**********************
Validation des données
**********************

Le composant ``Form`` de :program:`Symfony` permet de créer facilement des formulaires et d'hydrater l'objet qui lui est associé, mais il ne valide pas les données du formulaire tout simplement car ce n'est pas à lui le faire. Pour rappel, dans un modèle MVC, le seul et unique responsable des données est le modèle, l'entité.

Premièrement voici le namespace à utiliser dans les annotations pour ajouter des contraintes : ``use :program:`Symfony`\Component\Validator\Constraints as Assert;``

Ensuite pour chaque champ, il ne reste plus qu'à ajouter les contraintes pour chaque champs. Voici quelques exemples :

.. code-block:: php

    class Post {
        // ...

        /**
         * @var string
         *
         * @ORM\Column(name="title", type="string", length=255)
         * @Assert\Length(
         *      min = "10"
         * )
         */
        private $title;

        /**
         * @var DateTime
         *
         * @ORM\Column(name="date", type="datetime")
         */
        private $date;

        /**
         * @var string
         *
         * @ORM\Column(name="body", type="text")
         * @Assert\NotBlank()
         */
        private $body;

        /**
         * @var User
         * 
         * @ORM\ManyToOne(
         *      targetEntity="Epsi\Bundle\BlogBundle\Entity\User",
         *      inversedBy="posts"
         * )
         * @ORM\JoinColumn(nullable=false)
         * @Assert\Valid()
         */
        private $author;

        // ...
    }

Pour plus d'informations voici la page de documentation de :program:`Symfony` : http://symfony.com/fr/doc/current/reference/constraints.html

*******************************
Personnalisation de l'affichage
*******************************

Depuis sa version 2.6, :program:`Symfony` intègre deux layouts basés sur Bootstrap. Nous allons utilisé le layout ``bootstrap_3_horizontal``.

.. code-block:: yaml

    twig:
        form:
            # resources: ['bootstrap_3_layout.html.twig']
            resources: ['bootstrap_3_horizontal_layout.html.twig']

Précédent, pour afficher le formulaire, nous avons utiliser la méthode la plus courte, c'est à dire :

.. code-block:: html+jinja

    {{ form_start(form) }}
        {{ form_errors(form) }}

        {{ form_row(form.title) }}
        {{ form_row(form.date) }}

        <input type="submit" />
    {{ form_end(form) }}

Mais il est possible d'afficher les formulaires champ par champ en remplissant l'appel à la fonction ``form_row`` par la fonction suivante :

.. code-block:: html+jinja

    {{ form_row(form.title) }}

On peut également afficher chaque élément du champ séparément :

.. code-block:: html+jinja

    <div>
        {{ form_label(form.title) }}
        {{ form_errors(form.title) }}
        {{ form_widget(form.title) }}
    </div>





