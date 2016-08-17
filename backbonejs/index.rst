

.. revealjs:: Backbone.js
    :class: first-slide
    :title-heading: h1
    :subtitle: MVC Javascript framework
    :subtitle-heading: h2
    
    .. image:: /_static/images/backbonejs_logo.gif

.. revealjs:: C'est quoi Backbone.js ?
    :title-heading: h1

    .. raw:: html

        <ul>
            <li>Framework Javascript MVC</li>
            <li>Première version en 2010</li>
            <li>Version 1.2.3 sortie en septembre 2015</li>
            <li>Ultra-léger (71 ko non-minifié, 23 Ko minifié)</li>
            <li>une seule vraie dépendance : underscore.js (et jQuery aussi...)</li>
            <li>Hébergé sur <a href="https://github.com/jashkenas/backbone">Github</a></li>
        </ul>


.. revealjs:: On fait quoi avec ?
    :title-heading: h1

    .. raw:: html

        <ul>
            <li>Single-page apps</li>
            <li>RESTFul car Backbone ne sait pas stocker de données</li>
            <li>Trello</li>
            <li>Foursquare</li>
            <li>Bitbucket</li>
            <li>Basecamp</li>
            <li>...</li>
        </ul>


.. revealjs::

    .. revealjs:: 

        .. raw:: html

            <h1>MVC oui, mais attention à la terminologie...</h1>


    .. revealjs:: Model

        Dans Backbone, 2 concepts composent la couche Model : 
         * les modèles
         * les collections
    
    .. revealjs:: View

        Dans Backbone, les **templates** représentent la couche View.
    
    .. revealjs:: Controller

        Dans Backbone, les **vues** sont en réalité les Controllers.



.. revealjs:: 

    .. revealjs::
    
        .. raw:: html

            <h1>Les modèles</h1>

    .. revealjs:: Définition et instanciation
        
        .. rv_code::

            var CardModel = Backbone.Model.extend({
                urlRoot: 'https://api.trello.com/1/cards/',
            });

            var card = new CardModel({
                title: 'Connecteur Sugar CRM',
                author: 'Franck'
            });

    .. revealjs:: POST
        
        .. rv_code::

            var card = new CardModel({
                title: 'Connecteur Sugar CRM',
                author: 'Franck'
            });

            card.save();
        
        La méthode **save** réalise un POST sur https://api.trello.com/1/cards .

    .. revealjs:: GET
    
        .. rv_code::

            var card = new CardModel({id: '50f68b0ab78052ba760115b8'});

            card.fetch();
        
        La méthode **fetch** réalise un GET sur https://api.trello.com/1/cards/50f68b0ab78052ba760115b8 .

    .. revealjs:: PUT
    
        .. rv_code::

            var card = new CardModel({id: '50f68b0ab78052ba760115b8'});
            card.set('Title', 'Implémenter un connecteur Sugar CRM');
            card.save();
        
        La méthode **save** réalise un PUT sur https://api.trello.com/1/cards/50f68b0ab78052ba760115b8 .

    .. revealjs:: DELETE
    
        .. rv_code::

            card.destroy();
        
        La méthode **destroy** réalise un DELETE sur https://api.trello.com/1/cards/50f68b0ab78052ba760115b8 .

.. revealjs:: 

    .. revealjs::
    
        .. raw:: html

            <h1>Les collections</h1>

    .. revealjs:: 

        * Listes ordonnées de modèles
        * Elles fournissent des méthodes (add, remove, sort, push, pop, shift)
        * et des événements
        * Par exemple, dans Trello, une todolist est une collection.

    .. revealjs:: Définition et instanciation
        
        .. rv_code::

            var CardCollection = Backbone.Collection.extend({
                model: CardModel,
                url: 'https://api.trello.com/1/cards',
            });

            var todolist = new CardCollection();

    .. revealjs:: GET
    
        .. rv_code::

            todolist.fetch();

        La méthode **fetch** réalise un GET sur https://api.trello.com/1/cards .

        .. rv_code::

            todolist.toJSON(); 

            /* 
                [
                    {"title": "Tâche 1", "author": "Franck"},
                    {"title": "Tâche 2", "author": "Madeline"}
                ]
            */

    .. revealjs:: Ajouter des modèles
    
        .. rv_code::

            card3 = new CardModel({title: 'Tâche 3', author: 'Madeline'});
            card4 = new CardModel({title: 'Tâche 4', author: 'Madeline'});

            todolist.add([card3,card4]);

            todolist.toJSON(); 

            /* 
                [
                    {"title": "Tâche 1", "author": "Franck"},
                    {"title": "Tâche 2", "author": "Madeline"},
                    {"title": "Tâche 3", "author": "Madeline"},
                    {"title": "Tâche 4", "author": "Madeline"}
                ]
            */

    .. revealjs:: Supprimer des modèles
    
        .. rv_code::

            todolist.remove(card4);

            todolist.toJSON(); 

            /* 
                [
                    {"title": "Tâche 1", "author": "Franck"},
                    {"title": "Tâche 2", "author": "Madeline"},
                    {"title": "Tâche 3", "author": "Madeline"}
                ]
            */

    .. revealjs:: Récupérer des modèles

        .. rv_code::

            /* 
                [
                    {"title": "Tâche 1", "author": "Franck"},
                    {"title": "Tâche 2", "author": "Madeline"},
                    {"title": "Tâche 3", "author": "Madeline"}
                ]
            */

            var MadelineCards = todolist.where({author: 'Madeline'});

            console.log(MadelineCards);

            /* 
                [
                    {"title": "Tâche 2", "author": "Madeline"},
                    {"title": "Tâche 3", "author": "Madeline"}
                ]
            */



    .. revealjs:: Collections et persistence

        * Les collections ne permettent pas la persistence des données.
        * Ce sont uniquement les modèles, individuellement, qui permettent la persistence...
        * ...avec Model.save() et Model.destroy().

.. revealjs::

    .. revealjs:: Les vues
        :title-heading: h1
        :subtitle: (les contrôleurs)
        :subtitle-heading: h2

        Les vues Backbone sont en réalité des contrôleurs.

    .. revealjs:: Déclaration et instanciation

        .. rv_code::

            var TaskListView = Backbone.View.extend({
                el: '#main-container',

                initialize: function() {
                    this.collection = new CardCollection();
                    this.collection.fetch();
                },

                render: function() {
                    var list = $("ul");

                    this.collection.forEach( // Underscore.js method
                        function(card) {
                            var item = $("li");
                            item.text(card.get("title"));
                            list.append(item);
                        }
                    );

                    this.$el.append(list);
                },

            });

            new TaskListView();

        A noter la définition de la propriété **el** qui permet de mapper la vue avec une zone de la page HTML.

    .. revealjs:: Rendu de la vue

        * Le code précédent n'éxécute pas la méthode render.
        * Ajax = asynchrone.
        * On doit écouter un événement (ou implémenter un callback) pour déclencher ce rendu.

        .. rv_code::

            initialize: function() {
                this.collection = new CardCollection();
                this.listenTo(this.collection, "sync", this.render);
                this.collection.fetch();
            }

    .. revealjs:: Contrôleur ?

        Les vues sont des contrôleurs car elles pilotent :

        * la logique d'affichage des informations
        * les interactions avec l'utilisateur

        .. rv_code::

            var TaskListView = Backbone.View.extend({
                ...

                events: {
                    'click button.add-task' : 'addTask'
                },

                ...

                addTask: function() {
                    var newTask = this.collection.create({
                        title: 'Tâche 5', 
                        author: 'Fabien'
                    });
                },

            });

.. revealjs:: 
    
    .. revealjs:: Les événements
        :title-heading: h1

        * Javascript et le DOM sont événementiels.
        * Backbone émet des événements. (model change, collection add...)
        * Backbone permet de définir ses propres événements.
    
    .. revealjs:: Exemple
        :title-heading: h1

        .. rv_code::

            var objectA = {};
            _.extend(objectA, Backbone.Events);

            var objectB = {};
            _.extend(objectB, Backbone.Events);

            objectA.listenTo(objectB, 'dance', function(event, what){ 
                console.log(event + ' ' + what); 
            });
            objectB.trigger("dance" , "the boogie !");

            // objetA log : dance the boogie !


        

    .. revealjs:: Inversion de contrôle
        :title-heading: h1

        * La programmation événementielle permet l'inversion de contrôle.
        * Grâce aux événements, si on modifie l'implémentation de objetA, on n'a pas besoin de modifier l'implémentation de objetB.

.. revealjs:: 

    .. revealjs:: Les templates
        :title-heading: h1

        * Fonction render précédente pas très propre...
        * Par défaut, fonction de templating de Underscore.js, basique mais peut suffire.
        
        .. rv_code::

            <script type="text/template" id="todos_tpl">
                <h2>Mes tâches</h2>
                <ul class="todo_list">
                    <% _.each(todos, function(todo){ %>
                        <li><h3><%= todo.title %></h3></li>
                    <% }) %>
                </ul>
            </script>


        .. rv_code::

            var TasksView = Backbone.View.extend({
                ...
                template: _.template($('#todos_tpl').html()),
                ...
                render: function() {
                    this.$el.html(this.template({todos: this.collection.toJSON()}));
                }
            });

    
    .. revealjs:: Des fichiers séparés
        :title-heading: h1

        * On peut écrire chaque template dans un fichier.
        * Il faudra charger ces fichiers lorsqu'on en a besoin, comme pour les autres dépendances.
        * Utilisation de RequireJS et RequireJS Text
          
        .. rv_code:: 

            define([
                "backbone",
                "underscore",
                "text!templates/menu.html"
            ],
            function(Backbone, _, MenuTpl) {

                var MenuView = Backbone.View.extend({
                    el: "#menu",
                    template: _.template(MenuTpl),
                    ...
                });

                return MenuView;
            });
    
    .. revealjs:: et d'autres libs de templating
        :title-heading: h1

        * Backbone est modulaire.
        * On peut donc utiliser n'importe quelle librairie JS de templating (Handlebars, Mustache, Jade...)

.. revealjs::

    .. revealjs:: Le router
        :title-heading: h1

        * classique
        * permet d'associer des URIs à des vues

    .. revealjs:: Exemple pour notre TODO

        .. rv_code:: 

            define([
                'backbone',
                'views/tasks',
                'views/card',
            ], 
            function(Backbone, TasksView, CardView){
              
                var Router = Backbone.Router.extend({
                    
                    routes: {
                        'todo/:id':  'card',
                        '':          '_default',
                    },
                    
                    card: function(id) {
                        new CardView(id);
                    },

                    _default: function() {
                        new TasksView();
                    },

                });

                return Router;
            });

    .. revealjs:: Instanciation du router et démarrage de l'application

        Nous avons :

        * un modèle et une collection de cards
        * une vue principale pour notre application
        * un router
          
        **Nous devons maintenant instancier notre router et démarrer notre application.**

    .. revealjs:: main.js

        main.js est le script principal de notre application.

        .. rv_code:: 

            require(["backbone", "router"], 
                function (Backbone, Router) {
                    new Router();
                    Backbone.history.start();
                }
            );

    .. revealjs:: index.html

        L'application sera représentée par un fichier HTML constituant le layout de la page.

        .. rv_code:: 

            &lt;!DOCTYPE html&gt;
            &lt;html lang=&quot;en&quot;&gt;
                &lt;head&gt;
                    &lt;title&gt;Cetim&lt;/title&gt;
                    &lt;link rel=&quot;stylesheet&quot; href=&quot;http://fonts.googleapis.com/css?family=Lato:300,400,700&quot;&gt;
                    &lt;link rel=&quot;stylesheet&quot; href=&quot;css/styles.css&quot;&gt;
                &lt;/head&gt;
                &lt;body&gt;
                    &lt;header&gt;
                        &lt;div id=&quot;menu&quot;&gt;
                        &lt;!-- menu view --&gt;
                        &lt;/div&gt;
                    &lt;/header&gt;
                    
                    &lt;section id=&quot;main-container&quot;&gt;
                        &lt;!-- content view --&gt;
                    &lt;/section&gt;

                    &lt;footer id=&quot;main-footer&quot; class=&quot;text-center&quot;&gt;
                        &lt;!-- footer view --&gt;
                    &lt;/footer&gt;
                    &lt;script data-main=&quot;js/main.js&quot; src=&quot;js/require.js&quot;&gt;&lt;/script&gt;
                &lt;/body&gt;
            &lt;/html&gt;


    .. revealjs:: démo

        .. raw:: html

            <a href="file:///data/home/fgrenier/workspace/backbonejs_tasks_tuto/todolist_app/index.html" target="_blank">
                TODO app
            </a>

.. revealjs:: Exemple
    :title-heading: h1
    :subtitle: m.cetim.fr

    * Site mobile
    * Exploitant les données d'un site eZ Publish (pas toujours bien structurées...)
    * API Rest pas très conventionnelle
    * http://m.cetim.fr

.. revealjs:: Ressources
    :title-heading: h1

    * http://addyosmani.github.io/backbone-fundamentals
    * http://backbonejs.org
    * http://stackoverflow.com/questions/tagged/backbone.js
    * https://backbonetutorials.com


.. revealjs:: Merci à tous
    :class: last-slide
    :title-heading: h1
    


