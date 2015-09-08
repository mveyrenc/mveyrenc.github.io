return $this->render('EpsiBlogBundle:Blog:show.html.twig', array(
                'id' => $id,
    ));
    
$templating = $this->get('templating');
$contenu = $templating->render('EpsiBlogBundle:Blog:show.html.twig', array(
                'id' => $id,
    ));
return new Response($contenu);