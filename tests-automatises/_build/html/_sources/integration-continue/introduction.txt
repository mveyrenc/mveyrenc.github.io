######################
L'intégration continue
######################

* compilation du code
* tests unitaires
* packaging
* déploiement
* tests acceptance

----

* `Jenkins <https://jenkins.io/>`_

Pour tester :

.. code-block:: console

    docker pull jenkins
    docker run --name jenkins -p 8080:8080 -p 50000:50000 jenkins
