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
$permUSER = function ($request, $response, $next) {

    $newResponse = $next($request, $response);
    if (empty($_SESSION["C2P_ID"]))
        $newResponse = $response->withRedirect('/account/signin/');

    return $newResponse;
};

$blockUSER = function ($request, $response, $next) {

    $newResponse = $next($request, $response);
    if (isset($_SESSION["C2P_ID"]))
        $newResponse = $response->withRedirect('/account/profile/');

    return $newResponse;
};