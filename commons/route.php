<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', [App\Controllers\TeacherController::class, 'getTeacher']);
$router->get('add-teacher', [App\Controllers\TeacherController::class, 'addTeacher']);
$router->post('post-teacher', [App\Controllers\TeacherController::class, 'postTeacher']);
$router->get('delete-teacher/{id}', [App\Controllers\TeacherController::class, 'deleteTeacher']);
$router->get('edit-teacher/{id}', [App\Controllers\TeacherController::class, 'editTeacher']);
$router->post('update-teacher/{id}', [App\Controllers\TeacherController::class, 'updateTeacher']);


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
