<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
})->add($pattern);

$app->get('/404/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info(" '/404/' route");

    // Render index view
    return $this->renderer->render($response, '404.phtml', $args);
})->add($pattern);


/////////////////////////
//////// Account ////////
/////////////////////////

// Inscription
$app->get('/signup/', function ($request, $response, $args) {

    return $this->renderer->render($response, 'account/signup.phtml', $args);

})->add($blockUSER)->add($pattern);


$app->get('/signup/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, '/account/signup.phtml', $args);

})->add($blockUSER)->add($pattern);


$app->post('/account/signup/process/', function ($request, $response, $args) {

    return $response->withRedirect('/account/signup/');

})->add($register);


// Connexion
$app->get('/account/signin/', function ($request, $response, $args) {

    return $this->renderer->render($response, '/account/signin.phtml', $args);

})->add($blockUSER)->add($pattern);


$app->get('/account/signin/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, '/account/signin.phtml', $args);

})->add($blockUSER)->add($pattern);


$app->post('/account/signin/process/', function ($request, $response, $args) {

    $db = new dbUsers();
    if ( $db->connectionUser($_POST["email"],$_POST["mdp"]))
        return $response->withRedirect('/');
    else
        return $response->withRedirect('/signin/');

})->add($connect);


// Déconnexion
$app->get('/account/signout/', function ($request, $response, $args) {

    session_destroy();

    return $response->withRedirect('/');

})->add($permUSER);