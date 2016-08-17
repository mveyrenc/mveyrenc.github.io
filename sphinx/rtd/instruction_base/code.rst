####
Code
####

.. index::
    code

*************
Bloc littéral
*************

.. index::
    single: code; bloc littéral

Un bloc n'est pas interprété s'il est précédé de ``::`` et d'une ligne vide :

.. sidebar:: Rendu

    Block one::

        **No** interpretation of
        |special| characters.

.. code-block:: rst

    Block one::

        **No** interpretation of
        |special| characters.

:clear:`both`

************************
Bloc littéral interprété
************************

.. index::
    single: code; bloc littéral interprété
    single: directive; parsed-literal

.. sidebar:: Rendu

    .. parsed-literal::

       ( (title_, subtitle_?)?,
         decoration_?,
         (docinfo_, transition_?)?,
         `%structure.model;`_ )


    .. _title: #code
    .. _subtitle: https://www.openwide.fr
    .. _decoration: https://www.openwide.fr
    .. _docinfo: https://www.openwide.fr
    .. _transition: https://www.openwide.fr
    .. _%structure.model;: https://www.openwide.fr


.. code-block:: rst

    .. parsed-literal::

       ( (title_, subtitle_?)?,
         decoration_?,
         (docinfo_, transition_?)?,
         `%structure.model;`_ )

    .. _title: #code
    .. _subtitle: https://www.openwide.fr
    .. _decoration: https://www.openwide.fr
    .. _docinfo: https://www.openwide.fr
    .. _transition: https://www.openwide.fr
    .. _%structure.model;: https://www.openwide.fr

:clear:`both`

************
Bloc de code
************

.. index::
    single: code; bloc de code
    single: directive; code-block

.. sidebar:: Rendu

    .. code-block:: json

        {
        "windows": [
            {
            "panes": [
                {
                "shell_command": [
                    "echo 'did you know'",
                    "echo 'you can inline'"
                ]
                },
                {
                "shell_command": "echo 'single commands'"
                },
                "echo 'for panes'"
            ],
            "window_name": "long form"
            }
        ],
        "session_name": "shorthands"
        }

.. code-block:: none

    .. code-block:: json

        {
        "windows": [
            {
            "panes": [
                {
                "shell_command": [
                    "echo 'did you know'",
                    "echo 'you can inline'"
                ]
                },
                {
                "shell_command": "echo 'single commands'"
                },
                "echo 'for panes'"
            ],
            "window_name": "long form"
            }
        ],
        "session_name": "shorthands"
        }

:clear:`both`

.. list-table::
    :header-rows: 1

    * - Language
      - Lexer
    * - 
      - none
    * - Laisser Pygments deviner
      - guess
    * - PHP
      - php, php3, php4, php5
    * - PHP+HTML
      - html+php
    * - Twig+HTML
      - html+twig
    * - Twig
      - twig
    * - HTML+Smarty
      - html+smarty
    * - Smarty
      - smarty
    * - Configuration Apache
      - apacheconf, aconf, apache
    * - Configuration Nginx
      - nginx
    * - Docker
      - docker, dockerfile
    * - Ini
      - ini, cfg, dosini
    * - Properties
      - properties, jproperties
    * - CSS
      - css
    * - Sass
      - sass
    * - Scss
      - scss
    * - JsonLd
      - jsonld, json-ld
    * - Json
      - json
    * - Yaml
      - yaml
    * - Diff
      - diff, udiff
    * - XML
      - xml
    * - HTML
      - html
    * - Javascript
      - js, javascript
    * - Rst
      - rst, rest, restructuredtext
    * - Tex
      - tex, latex
    * - Bash
      - bash, sh, ksh, shell
    * - BashSession
      - console
    * - MySql
      - mysql
    * - Postgres
      - postgresql, postgres
    * - Sqlite
      - sqlite3
    * - Sql
      - sql

**************************************
Lignes surlignées et numéros de lignes
**************************************

.. code-block:: python
   :linenos:
   :emphasize-lines: 3,5

   def some_function():
       interesting = False
       print 'This line is highlighted.'
       print 'This one is not...'
       print '...but this one is.'

.. code-block:: rst

    .. code-block:: python
       :linenos:
       :emphasize-lines: 3,5

       def some_function():
           interesting = False
           print 'This line is highlighted.'
           print 'This one is not...'
           print '...but this one is.'