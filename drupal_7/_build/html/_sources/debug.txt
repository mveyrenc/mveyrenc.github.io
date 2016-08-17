#####
Debug
#####

Drush
*****

.. code-block:: bash

    $ ./bin/drush wd-show --tail

.. seealso::
    https://www.drupal.org/node/960926

Code PHP
********

XDebug
------

.. seealso::
  - Installation Xdebug : http://xdebug.org/docs/install
  - Configurer PHPStorm et Xdebug : https://confluence.jetbrains.com/display/PhpStorm/Zero-configuration+Web+Application+Debugging+with+Xdebug+and+PhpStorm


Module devel
------------

.. code-block:: php

    // dumper une variable
    global $user;
    $account = $user;
    dpm($account);

    // ou pour afficher toutes les variables disponibles
    dpm(get_defined_vars());

    // ou
    dpm(debug_backtrace());

    drupal_set_message()

    // Debug d'une query
    dpq($query);


Module Drupal for Firebug
-------------------------

.. code-block:: php

    // dumper une variable
    firep($item, $optional_title)


.. seealso::
    - http://www.wdtutorials.com/drupal-7/drupal-7-useful-modules-developers#.VWbENbziBWU
    - Module MailLog : https://www.drupal.org/project/maillog