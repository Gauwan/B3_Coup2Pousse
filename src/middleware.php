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