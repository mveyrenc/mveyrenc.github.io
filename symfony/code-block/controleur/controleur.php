public function showAction($id) {
    // on instancie une réponse
    $response = new Response();
    // on définit le contenu
    $response->setContent('Ceci est le contenu de la page');
    // on définit le code HTTP
    $response->setStatusCode(Reponse::HTTP_OK);
    // on retourne la réponse
    return $response;
}

public function showAction($id) {
    return $this->render('EpsiBlogBundle:Blog:show.html.twig', array(
                'id' => $id,
    ));
}

public function showAction($id) {
    return $this->redirect($this->generateUrl('epsi_blog_index', array('page' => 5)));
}