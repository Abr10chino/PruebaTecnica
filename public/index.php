<?php

require_once __DIR__ . '/../controllers/DemonSlayerController.php';
require_once __DIR__ . '/../controllers/DragonBallController.php';
require_once __DIR__ . '/../controllers/DashboardController.php';

$controllerDemonSlayer = new DemonSlayerController();
$controllerDragonBall = new DragonBallController();
$controllerDashboard = new DashboardController();

$action = $_GET['action'] ?? 'dashboard';

switch($action){
    case 'dashboard':
        $controllerDashboard->index();
        break;
    case 'demon-slayer':
        $controllerDemonSlayer->index();
        break;

    case 'demon-slayer-show':

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if ($id === false || $id === null || $id <= 0) {
            $controllerDemonSlayer->index();
            exit;
        }

        $controllerDemonSlayer->show($id);

        break;

    case 'dragon-ball':
        $controllerDragonBall->index();
        break;

    case 'dragon-ball-show':

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if ($id === false || $id === null || $id <= 0) {
            $controllerDragonBall->index();
            exit;
        }

        $controllerDragonBall->show($id);

        break;
}
