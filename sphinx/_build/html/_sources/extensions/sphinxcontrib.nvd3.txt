##################
sphinxcontrib.nvd3
##################

Line Chart
==========

.. only:: html

    .. nvd3-linechart:: /_static/nvd3-chart/line-sample.csv
        :jquery_on_ready:
        :use_interactive_guideline:
        :x_axis_format: AM_PM
        :extras: {"tooltip": {"y_start": "", "y_end": ""}}

.. code-block:: rst

    .. nvd3-linechart:: /_static/nvd3-chart/line-sample.csv
        :jquery_on_ready:
        :use_interactive_guideline:
        :x_axis_format: AM_PM
        :extras: {"tooltip": {"y_start": "", "y_end": ""}}

Line Plus Bar Chart
===================

.. only:: html

    .. nvd3-lineplusbarchart:: /_static/nvd3-chart/line-sample.csv
        :chart_kwargs: {"ydata1": {"bar": true}}

.. code-block:: rst

    .. nvd3-lineplusbarchart:: /_static/nvd3-chart/line-sample.csv
        :chart_kwargs: {"ydata1": {"bar": true}}

Line With Focus Chart
=====================

.. only:: html

    .. nvd3-linewithfocuschart:: /_static/nvd3-chart/line-sample.csv

.. code-block:: rst

    .. nvd3-linewithfocuschart:: /_static/nvd3-chart/line-sample.csv

Cumulative Line Chart
=====================

.. only:: html

    .. nvd3-cumulativelinechart:: /_static/nvd3-chart/cumulativeline-sample.csv
        :x_is_date:

Discrete Bar Chart
==================

.. only:: html

    .. nvd3-discretebarchart::

        xdata,ydata
        A,3
        B,12
        C,-10
        D,5
        E,25
        F,-7
        G,2

.. code-block:: rst

    .. nvd3-discretebarchart::

        xdata,ydata
        A,3
        B,12
        C,-10
        D,5
        E,25
        F,-7
        G,2


Multi Bar Chart
===============

.. only:: html

    .. nvd3-multibarchart::

        xdata,ydata1,ydata2
        0,8,16
        1,1,2
        2,7,14
        3,9,18
        4,8,16
        5,7,14
        6,4,8
        7,6,12
        8,9,18
        9,4,8

.. code-block:: rst

    .. nvd3-multibarchart::

        xdata,ydata1,ydata2
        0,8,16
        1,1,2
        2,7,14
        3,9,18
        4,8,16
        5,7,14
        6,4,8
        7,6,12
        8,9,18
        9,4,8

Multi Bar Horizontal Chart
==========================

.. only:: html

    .. nvd3-multibarhorizontalchart::

        xdata,ydata1,ydata2
        0,8,16
        1,1,2
        2,7,14
        3,9,18
        4,8,16
        5,7,14
        6,4,8
        7,6,12
        8,9,18
        9,4,8

.. code-block:: rst

    .. nvd3-multibarhorizontalchart::

        xdata,ydata1,ydata2
        0,8,16
        1,1,2
        2,7,14
        3,9,18
        4,8,16
        5,7,14
        6,4,8
        7,6,12
        8,9,18
        9,4,8


Pie Chart
=========

.. only:: html

    .. nvd3-piechart::

        xdata,ydata
        Orange,3
        Banana,4
        pear,0
        Kiwi,1
        Apple,5
        Strawberry,7
        Pineapple,3

.. code-block:: rst

    .. nvd3-piechart::

        xdata,ydata
        Orange,3
        Banana,4
        pear,0
        Kiwi,1
        Apple,5
        Strawberry,7
        Pineapple,3

Scatter Chart
=============

.. only:: html

    .. nvd3-scatterchart:: /_static/nvd3-chart/scatter-sample.csv
        :height: 450
        :extras: {"tooltip": {"y_start": "", "y_end": " calls"}}

.. code-block:: rst

    .. nvd3-scatterchart:: /_static/nvd3-chart/scatter-sample.csv
        :height: 450
        :extras: {"tooltip": {"y_start": "", "y_end": " calls"}}

Stacked Area Chart
==================

.. only:: html

    .. nvd3-stackedareachart::

        xdata,ydata1,ydata2
        100,6,8
        101,11,20
        102,12,16
        103,7,12
        104,11,20
        105,10,28
        106,11,28

.. code-block:: rst

    .. nvd3-stackedareachart::

        xdata,ydata1,ydata2
        100,6,8
        101,11,20
        102,12,16
        103,7,12
        104,11,20
        105,10,28
        106,11,28