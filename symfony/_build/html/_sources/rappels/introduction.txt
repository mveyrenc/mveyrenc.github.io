.. _rappels-introduction:

####################
Programmation en PHP
####################

PHP est un language créé par Rasmus Lerdorf en 1994, pour suivre les visiteurs de son curriculum vitae en ligne.

PHP (officiellement, ce sigle est un acronyme récursif pour PHP: Hypertext Preprocessor) est un langage de scripts et Open Source, spécialement conçu pour le développement d'applications web.

Il peut être intégré facilement au HTML :

.. code-block:: html+php

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	  "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	  <head>
	    <title>Exemple</title>
	  </head>
	  <body>
	    Je travaille avec la version <?php echo phpversion() ?> de PHP.
	  </body>
	</html>

Ce code va être exécuté côté serveur pout générer une page uniquement en HTML, qui est ensuite envoyé au client :

.. code-block:: html

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	  "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	  <head>
	    <title>Exemple</title>
	  </head>
	  <body>
	    Je travaille avec la version 5.5.9-1ubuntu4.3 de PHP.
	  </body>
	</html>