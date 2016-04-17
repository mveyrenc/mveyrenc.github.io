##################################
Relation Many-To-Many dans Symfony
##################################

Dans le cas des relations OneToMany et ManyToOne, le paramètre ``inversedBy`` est toujours du côté de la relation propriétaire et l'attribut ``mappedBy`` est toujours du côté de l'inverse.

***********************
Déclation des attributs
***********************

Dans l'entité propriétaire
==========================

.. code-block:: php

    class Author {
        // ...

        /**
         * @var Book[]
         *
         * @ORM\ManyToMany(
         *      targetEntity="Namespace\Of\MyBundle\Entity\Book",
         *      inversedBy="authors"
         * )
         */
        private $books;

        // ...
    }

Dans l'entité inverse
=====================

.. code-block:: php

    class Book {
        // ...

        /**
         * @var Author[]
         *
         * @ORM\ManyToMany(
         *      targetEntity="Namespace\Of\MyBundle\Entity\Author",
         *      mappedBy="books"
         * )
         */
        private $authors;

        // ...
    }

****************************************
Méthodes get et set générée par Doctrine
****************************************

Dans l'entité propriétaire
==========================

.. code-block:: php

    class Author {
        // ...

        /**
         * Constructor
         */
        public function __construct() {
            // ...
            $this->books = new ArrayCollection();
            // ...
        }

        // ...

        /**
         * Add book
         *
         * @param Book $book
         * @return Author
         */
        public function addBook(Book $book) {
            $this->books[] = $book;
            return $this;
        }

        /**
         * Remove book
         *
         * @param Book $book
         */
        public function removeBook(Book $book) {
            $this->books->removeElement($book);
        }

        /**
         * Get books
         *
         * @return Book[]
         */
        public function getBooks() {
            return $this->books;
        }

        // ...
    }

Dans l'entité inverse
=====================

.. code-block:: php

    class Book {
        // ...

        /**
         * Constructor
         */
        public function __construct() {
            // ...
            $this->authors = new ArrayCollection();
            // ...
        }

        // ...

        /**
         * Add author
         *
         * @param Author $author
         * @return Book
         */
        public function addAuthor(Author $author) {
            $this->authors[] = $author;
            return $this;
        }

        /**
         * Remove authors
         *
         * @param Author $author
         */
        public function removeAuthor(Author $author) {
            $this->authors->removeElement($author);
        }

        /**
         * Get authors
         *
         * @return Author[]
         */
        public function getAuthors() {
            return $this->authors;
        }

        // ...
    }

*******************************************************
Modifications effectuées en base de donnée par Doctrine
*******************************************************

.. code-block:: mysql

    CREATE TABLE author_book (
        author_id int(11) NOT NULL,
        book_id int(11) NOT NULL,
        PRIMARY KEY (author_id,book_id)
    );
    ALTER TABLE author_book ADD CONSTRAINT FK_XXX FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE;
    ALTER TABLE author_book ADD CONSTRAINT FK_YYY FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE;
