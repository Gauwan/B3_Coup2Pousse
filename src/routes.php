<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render search view
    return $this->renderer->render($response, 'search.phtml', $args);
})->add($connectUSER)->add($pattern);

$app->get('/404/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info(" '/404/' route");

    // Render index view
    return $this->renderer->render($response, '404.phtml', $args);
})->add($connectUSER)->add($pattern);


/////////////////////////
//////// Account ////////
/////////////////////////

// Inscription
$app->get('/signup/', function ($request, $response, $args) {

    return $this->renderer->render($response, 'signup.phtml', $args);

})->add($disconnectUSER)->add($pattern);

$app->get('/signup/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, 'signup.phtml', $args);

})->add($disconnectUSER)->add($pattern);


$app->post('/signup/process/', function ($request, $response, $args) {

    $db = new dbUsers();
    if ( $db->registrationUser($request->getParsedBody()['establishment'], $request->getParsedBody()['login'], $request->getParsedBody()['password'], $request->getParsedBody()['fullname'], $request->getParsedBody()['email']))
        return $response->withRedirect('/signin/');
    else
        return $response->withRedirect('/signup/error');
});


// Connexion
$app->get('/signin/', function ($request, $response, $args) {

    return $this->renderer->render($response, 'signin.phtml', $args);

})->add($disconnectUSER)->add($pattern);

$app->get('/signin/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, 'signin.phtml', $args);

})->add($disconnectUSER)->add($pattern);


$app->post('/signin/process/', function ($request, $response, $args) {

    $db = new dbUsers();
    if ( $db->connectionUser($request->getParsedBody()['login'], $request->getParsedBody()['password'], $request->getParsedBody()['cookie']))
        return $response->withRedirect('/');
    else
        return $response->withRedirect('/signin/error');
});


// Déconnexion
$app->get('/signout/', function ($request, $response, $args) {

    session_destroy();

    return $response->withRedirect('/signin/');

})->add($connectUSER);

//

$app->get('/add/', function ($request, $response, $args) {

    return $this->renderer->render($response, '/addAide.phtml', $args);

})->add($connectUSER)->add($pattern);

// Profile
$app->get('/profile/', function ($request, $response, $args) {

    return $this->renderer->render($response, '/profile.phtml', $args);

})->add($connectUSER)->add($pattern);

$app->get('/profile/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, '/profile.phtml', $args);

})->add($connectUSER)->add($pattern);


$app->post('/profile/process/', function ($request, $response, $args) {

    $db = new dbUsers();
    if ( $db->connectionUser($request->getParsedBody()['email'], $request->getParsedBody()['password']))
        return $response->withRedirect('/search/');
    else
        return $response->withRedirect('/signin/error');
});

// Aide
$app->post('/aide/add/process/', function ($request, $response, $args) {

  $db = new dbAides();
  if ( $db->addAide($request->getParsedBody()['category'], $request->getParsedBody()['level'], $request->getParsedBody()['commentary']) )
    return $reponse->withRedirect('/search/');
  else
    return $response->withRedirect('/aide/add/error');

});

$app->get('/aide/add/{error}', function ($request, $response, $args) {

  return $this->renderer->render($response, '/addAide.phtml', $args);

})->add($connectUSER)->add($pattern);

$app->get('/aide/add/', function ($request, $response, $args) {

  return $this->renderer->render($response, '/addAide.phtml', $args);

})->add($connectUSER)->add($pattern);
