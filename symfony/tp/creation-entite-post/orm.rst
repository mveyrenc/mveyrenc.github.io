#####
L'ORM
#####

**********
Définition
**********

.. epigraph::

   Un ORM (Object-Relation Mapper, ou mapping objet-relationnel en français) et un composant qui permet de créer l'illusion qu'une base de données relationnelle est une base de données orientée objet en définissant des correspondances entre la base de données et les objets manipulés dans le code.

   -- Wikipedia

***********
Explication
***********

Un ORM est une librairie, ici en PHP, qui fait le mapping entre vos objets et votre base de données. Elle enregistre vos objets dans la base de données (création, modification et suppression) et transforme le résultat de vos requêtes en un ou une collection d'objet. Ainsi, dans votre code, vous ne manipulez que des objets et n'avez pas besoin de vous occupez de comment sont stockées les données.

**************
Fonctionnement
**************

Dans les classes entité, comme ``Post``, vous trouvez des annotations commançant par ``@ORM``. Ces annotations décrivent à votre ORM comment il doit mapper vos objets avec la base de données.

Reprenons la classe ``Post`` :

.. code-block:: php
   :linenos:

   namespace Epsi\Bundle\BlogBundle\Entity;

   use Doctrine\ORM\Mapping as ORM;

   /**
    * Post
    *
    * @ORM\Table()
    * @ORM\Entity(repositoryClass="Epsi\Bundle\BlogBundle\Entity\PostRepository")
    */
   class Post
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
        * @ORM\Column(name="title", type="string", length=100)
        */
       private $title;

       /**
        * @var \DateTime
        *
        * @ORM\Column(name="date", type="datetime")
        */
       private $date;

       /**
        * @var string
        *
        * @ORM\Column(name="body", type="text")
        */
       private $body;


       /**
        * Get id
        *
        * @return integer
        */
       public function getId()
       {
           return $this->id;
       }

       /**
        * Set title
        *
        * @param string $title
        * @return Post
        */
       public function setTitle($title)
       {
           $this->title = $title;

           return $this;
       }

       /**
        * Get title
        *
        * @return string
        */
       public function getTitle()
       {
           return $this->title;
       }

       /**
        * Set date
        *
        * @param \DateTime $date
        * @return Post
        */
       public function setDate($date)
       {
           $this->date = $date;

           return $this;
       }

       /**
        * Get date
        *
        * @return \DateTime
        */
       public function getDate()
       {
           return $this->date;
       }

       /**
        * Set body
        *
        * @param string $body
        * @return Post
        */
       public function setBody($body)
       {
           $this->body = $body;

           return $this;
       }

       /**
        * Get body
        *
        * @return string
        */
       public function getBody()
       {
           return $this->body;
       }
   }

Avant la déclaration de la classe (l 5-10), des annotations indiquent à l'ORM :

* que notre classe est une entité à persister dans une base de données

   .. code-block:: php

      @ORM\Entity(repositoryClass="Epsi\Bundle\BlogBundle\Entity\PostRepository")

* et la description de la table dans laquelle il faut la persister

   .. code-block:: php

      @ORM\Table()

Avant chaque attribut (l 22-26), des annotations décrivent à l'ORM la colonne dans laquelle est stockée l'attribut. Par exemple, pour le ``title`` :

   .. code-block:: php

      @ORM\Column(name="title", type="string", length=100)

En lisant des annotations, l'ORM va savoir :

* les différences de schema entre vos entités et votre base de données
* enregistrer vos entités dans la base de données
* resortir des entrées de votre base de données sous la forme d'un ou d'une collection d'objet.


