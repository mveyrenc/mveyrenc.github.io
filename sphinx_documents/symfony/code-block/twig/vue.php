<ul id="navigation">
    <?php foreach ($navigation as $item): ?>
        <li>
            <a href="<?php echo $item->getHref() ?>"><?php echo $item->getName() ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
return $this->render('EpsiBlogBundle:Blog:show.html.twig', array(
            'id' => $id,
            'name' => 'Post du blog',
            'date' => new \DateTime(),
            'tags' => array( 'php', 'symfony' ),
            'html' => '<b>ceci est du texte en gras</b>'
        ));
?>