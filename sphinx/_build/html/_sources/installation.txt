######################
Installation de Sphinx
######################

***************************
Installation des pré-requis
***************************

.. code-block:: console
    
    sudo apt-get install python-pip python-dev build-essential
    sudo apt-get install graphviz librsvg2-bin plotutils
    sudo pip install --upgrade pip 
    sudo pip install --upgrade virtualenv 
    sudo pip install sphinx
    sudo pip install watchdog

***********************
Installation des thèmes
***********************

reveal.js
=========

Pour les présentations.

.. code-block:: console

    git submodule add \
        https://github.com/Open-Wide/sphinxjp.themes.revealjs.git \
        docs/_themes/sphinxjp.themes.revealjs
    cd docs/_themes/sphinxjp.themes.revealjs
    sudo python setup.py install

.. code-block:: python

    # docs/sphinx_doc/config.py

    extensions = ['sphinxjp.themes.revealjs']

    exclude_patterns = ['_build']

    html_theme = 'revealjs'
    html_use_index = False
    html_theme_options = {
        "lang": "fr",
        "theme": "openwide",
        "slide_number": True,
    }

Read the Docs
=============

Pour les autres documents.

.. code-block:: console

    git submodule add \
        https://github.com/Open-Wide/sphinx_rtd_theme.git \
        docs/_themes/sphinx_rtd_theme
    cd docs/_themes/sphinx_rtd_theme
    sudo python setup.py install

.. code-block:: python

    # docs/sphinx_doc/config.py

    extensions = ['sphinx_rtd_theme']

    exclude_patterns = ['_build']

    html_theme = 'sphinx_rtd_theme'
    html_theme_options = {
        'subtitle': subtitle,
        'reference': reference
    }

*********************** 
Pour construire des PDF
*********************** 

.. code-block:: bash

    sudo apt-get install texlive-latex-recommended texlive-latex-base \
        texlive-lang-french fonts-linuxlibertine ttf-linux-libertine \
        python-genshi python-lxml python-jinja2-doc ttf-bitstream-vera \
        jsmath libjs-mathjax dvipng texlive-latex-extra \
        texlive-fonts-recommended texlive-lang-cyrillic

.. code-block:: python

    # docs/sphinx_doc/config.py

    extensions = ['sphinx_rtd_theme']
    latex_elements = {
        'pointsize': '12pt'
    }

..
    sudo pip install sphinx_rtd_theme
    sudo pip install sphinx-scruffy
    sudo pip install sphinxcontrib-seqdiag
    sudo pip install blockdiagcontrib-octicons
    sudo pip install sphinxcontrib-blockdiag
    sudo pip install sphinxcontrib-fancybox
    sudo pip install sphinxjp.themes.revealjs