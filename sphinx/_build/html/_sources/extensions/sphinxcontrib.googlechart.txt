#########################
sphinxcontrib.googlechart
#########################

* https://pypi.python.org/pypi/sphinxcontrib-googlechart
* https://pythonhosted.org/sphinxcontrib-googlechart/

********
piechart
********

.. only:: html

    .. sidebar:: Rendu

        .. piechart::

            dog: 100
            cat: 80
            rabbit: 40

.. code-block:: rst

    .. piechart::

        dog: 100
        cat: 80
        rabbit: 40

:clear:`both`

**********
piechart3d
**********

.. only:: html

    .. sidebar:: Rendu

        .. piechart3d::
            :size: 480x240

            dog: 100
            cat: 80
            rabbit: 40

.. code-block:: rst

    .. piechart3d::
        :size: 480x240

        dog: 100
        cat: 80
        rabbit: 40

:clear:`both`

*********
linechart
*********

.. only:: html

    .. sidebar:: Rendu

        .. linechart::

            bicycle: 15, 35, 20, 40
            bicycle.color: ff0000
            car: 60, 75, 60, 30
            car.color: 0000ff

.. code-block:: rst

    .. linechart::

        bicycle: 15, 35, 20, 40
        bicycle.color: ff0000
        car: 60, 75, 60, 30
        car.color: 0000ff

:clear:`both`

***********
linechartxy
***********

.. only:: html

    .. sidebar:: Rendu

        .. linechartxy::

            bicycle: (0, 15), (30, 35), (60, 20), (90, 40)
            car: (0, 60), (20, 75), (40, 60), (90, 30)

.. code-block:: rst

    .. linechartxy::

        bicycle: (0, 15), (30, 35), (60, 20), (90, 40)
        car: (0, 60), (20, 75), (40, 60), (90, 30)

:clear:`both`

*******************
holizontal_barchart
*******************

.. only:: html

    .. sidebar:: Rendu

        .. holizontal_barchart::

            bicycle: 15, 25, 20, 30
            bicycle.color: ff0000
            bicycle.axis: x
            bicycle.axis_label: slow, fast
            car: 40, 50, 60, 45
            car.color: 0000ff

.. code-block:: rst

    .. holizontal_barchart::

        bicycle: 15, 25, 20, 30
        bicycle.color: ff0000
        bicycle.axis: x
        bicycle.axis_label: slow, fast
        car: 40, 50, 60, 45
        car.color: 0000ff

:clear:`both`

*****************
vertical_barchart
*****************

.. only:: html

    .. sidebar:: Rendu

        .. vertical_barchart::

            bicycle: 15, 25, 20, 30
            bicycle.color: ff0000
            bicycle.axis: y
            bicycle.axis_label: slow, fast
            car: 40, 50, 60, 45
            car.color: 0000ff

.. code-block:: rst

    .. vertical_barchart::

        bicycle: 15, 25, 20, 30
        bicycle.color: ff0000
        bicycle.axis: y
        bicycle.axis_label: slow, fast
        car: 40, 50, 60, 45
        car.color: 0000ff

:clear:`both`

*******************
holizontal_bargraph
*******************

.. only:: html

    .. sidebar:: Rendu

        .. holizontal_bargraph::

            bicycle: 15, 25, 20, 30
            bicycle.color: ff0000
            bicycle.axis: x
            bicycle.axis_label: slow, fast
            car: 40, 50, 60, 45
            car.color: 0000ff

.. code-block:: rst

    .. holizontal_bargraph::

        bicycle: 15, 25, 20, 30
        bicycle.color: ff0000
        bicycle.axis: x
        bicycle.axis_label: slow, fast
        car: 40, 50, 60, 45
        car.color: 0000ff

:clear:`both`

*****************
vertical_bargraph
*****************

.. only:: html

    .. sidebar:: Rendu

        .. vertical_bargraph::

            bicycle: 15, 25, 20, 30
            bicycle.color: ff0000
            bicycle.axis: x
            bicycle.axis_label: slow, fast
            car: 40, 50, 60, 45
            car.color: 0000ff

.. code-block:: rst

    .. vertical_bargraph::

        bicycle: 15, 25, 20, 30
        bicycle.color: ff0000
        bicycle.axis: x
        bicycle.axis_label: slow, fast
        car: 40, 50, 60, 45
        car.color: 0000ff

:clear:`both`

***********
venndiagram
***********

.. only:: html

    .. sidebar:: Rendu

        .. venndiagram::

            data: 100, 80, 40, 20, 20, 20, 10

.. code-block:: rst

    .. venndiagram::

        data: 100, 80, 40, 20, 20, 20, 10

:clear:`both`

*********
plotchart
*********

.. only:: html

    .. sidebar:: Rendu

        .. plotchart::

            data: (50, 60), (75, 20), (20, 30), (10, 70), (45, 10)

.. code-block:: rst

    .. plotchart::

        data: (50, 60), (75, 20), (20, 30), (10, 70), (45, 10)

:clear:`both`

********
mapchart
********

.. only:: html

    .. sidebar:: Rendu

        .. mapchart::

            data: CN, JP, KR
            color: ff0000, 00ff00, 0000ff

.. code-block:: rst

    .. mapchart::

        data: CN, JP, KR
        color: ff0000, 00ff00, 0000ff

:clear:`both`

.. only:: html

    .. sidebar:: Rendu

        .. mapchart::

            CN: "People's Republic of China"
            CN.color: ff0000
            JP: Japan
            JP.color: 00ff00
            KR: "Republic of Korea"
            KR.color: 0000ff

.. code-block:: rst

    .. mapchart::

        CN: "People's Republic of China"
        CN.color: ff0000
        JP: Japan
        JP.color: 00ff00
        KR: "Republic of Korea"
        KR.color: 0000ff

:clear:`both`

##################################
sphinxcontrib.googlechart.graphviz
##################################

Cette extension fait la même chose que ``sphinx.ext.graphviz`` mais ne nécessite pas les binaires :program:`graphviz`.

.. only:: html

    .. sidebar:: Rendu

        .. graphviz::

            digraph {
                A -> B;
            }

.. code-block:: rst

    .. graphviz::

        digraph {
            A -> B;
        }

:clear:`both`

.. only:: html

    .. sidebar:: Rendu

        .. graph::

            A -- B;

.. code-block:: rst

    .. graph::

        A -- B;

:clear:`both`

.. only:: html

    .. sidebar:: Rendu

        .. graph::

            C_0--H_0[type=s];C_0--H_1[type=s];C_0--H_2[type=s];C_0--C_1[type=s];C_1--H_3[type=s];C_1--H_4[type=s];C_1--H_5[type=s];

.. code-block:: rst

    .. graph::

        C_0--H_0[type=s];C_0--H_1[type=s];C_0--H_2[type=s];C_0--C_1[type=s];C_1--H_3[type=s];C_1--H_4[type=s];C_1--H_5[type=s];

:clear:`both`

.. only:: html

    .. sidebar:: Rendu

        .. digraph::

            A -- B;

.. code-block:: rst

    .. digraph::

        A -- B;
