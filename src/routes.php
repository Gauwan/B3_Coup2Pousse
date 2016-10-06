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

    return $this->renderer->render($response, '/signup.phtml', $args);

})->add($blockUSER)->add($pattern);

$app->get('/signup/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, '/signup.phtml', $args);

})->add($blockUSER)->add($pattern);


$app->post('/signup/process/', function ($request, $response, $args) {

    $db = new dbUsers();
    if ( $db->registrationUser($_POST["login"],$_POST["email"],$_POST["password"], $_POST["firstname"], $_POST["lastname"],$_POST["birthday"]))
        return $response->withRedirect('/');
    else
        return $response->withRedirect('/signout/error');
});


// Connexion
$app->get('/signin/', function ($request, $response, $args) {

    return $this->renderer->render($response, '/signin.phtml', $args);

})->add($blockUSER)->add($pattern);

$app->get('/signin/{error}', function ($request, $response, $args) {

    return $this->renderer->render($response, '/signin.phtml', $args);

})->add($blockUSER)->add($pattern);


$app->post('/signin/process/', function ($request, $response, $args) {

    $db = new dbUsers();
    if ( $db->connectionUser($_POST["email"],$_POST["password"]))
        return $response->withRedirect('/');
    else
        return $response->withRedirect('/signin/error');
});


// Déconnexion
$app->get('/signout/', function ($request, $response, $args) {

    session_destroy();

    return $response->withRedirect('/signin/');

})->add($permUSER);

//