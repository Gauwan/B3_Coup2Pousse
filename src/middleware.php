<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

//Pattern for header & footer
$pattern = function ($request, $response, $next) {

    $this->renderer->render($response,'includes/header.phtml');

    $response = $next($request, $response);

    $this->renderer->render($response,'includes/footer.phtml');

    return $response;
};


//Blocage des utilisateurs
$connectUSER = function ($request, $response, $next) {

    $newResponse = $next($request, $response);
    if (empty($_SESSION["C2P_ID"]))
        $newResponse = $response->withRedirect('/signin/');

    return $newResponse;
};

$disconnectUSER = function ($request, $response, $next) {

    $newResponse = $next($request, $response);
    if (isset($_SESSION["C2P_ID"]))
        $newResponse = $response->withRedirect('/search/');

    return $newResponse;
};