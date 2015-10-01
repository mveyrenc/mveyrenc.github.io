.. revealjs::

    .. revealjs:: Le routeur
        :title-heading: h1

    .. revealjs:: Definition
        :class: text-left

        Le router fait la correspondance entre les URLs et les les contrôleurs

        .. list-table::
            :header-rows: 1

            * - Nom
              - Chemin
              - Contrôleur

            * - epsi_blog_default_index
              - /hello/{name}
              - EpsiBlogBundle:Default:index

            * - epsi_blog_post_index
              - /post
              - EpsiBlogBundle:Post:index

            * - epsi_blog_post_new
              - /post/new
              - EpsiBlogBundle:Post:new

            * - epsi_blog_post_show
              - /post/{id}
              - EpsiBlogBundle:Post:show

    .. revealjs:: Suite du cours

        http://mveyrenc.github.io/symfony/_build/html/routing.html
        