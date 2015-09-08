
.. PHP/Symfony slides file, created by
   hieroglyph-quickstart on Wed Feb 25 18:33:33 2015.

###########
PHP/Symfony
###########

***********************
Installation de Symfony
***********************

.. slide:: Correction des droits
    :level: 3


    * nous allons ajouter l'utilisateur d'Apache (``www-data``) dans notre groupe

        .. code-block:: bash

            $ sudo usermod -a -G www-data $(whoami)

    * ensuite nous ajouter dans le groupe ``www-data``

        .. code-block:: bash

            $ sudo usermod -a -G $(whoami) www-data

.. slide:: Correction des droits
    :level: 3

    * nous forçons les droits à 775 pour tous les nouveaux fichiers créés par notre utilisateur

        .. code-block:: bash

            # ~/.profile
            umask 002

    * rechargeons notre profil

        .. code-block:: bash

            $ source ~/.profile

.. slide:: Correction des droits
    :level: 3

    * nous faisons de même pour www-data

        .. code-block:: bash

            # /etc/init.d/apache2
            do_start()
            {
                # Return
                #   0 if daemon has been started
                #   1 if daemon was already running
                #   2 if daemon could not be started

                umask 002

    * redémarrons Apache

        .. code-block:: bash

            $ sudo service apache2 restart




