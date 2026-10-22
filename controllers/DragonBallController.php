<?php

require_once __DIR__ . '/../models/DragonBallModel.php';

class DragonBallController
{
    private DragonBallModel $dragonBallModel;

    public function __construct()
    {
        $this->dragonBallModel = new DragonBallModel();
    }

    public function index(?int $page = 1): void
    {
        $page = $page ?? 1;
        $limit = 5;

        $pagination = $this->dragonBallModel->getPagination();

        $characters = $this->dragonBallModel->getCharactersByPages($limit, $page);

        require __DIR__ . '/../views/dragon-ball.php';
    }

    public function show(int $id): void
    {
        $pagination = $this->dragonBallModel->getPagination();
        $maxNumber = $pagination['totalItems'] ?? ($pagination['total'] ?? 58);

        $character = $this->dragonBallModel->getCharacterById($id);

        require __DIR__ . '/../views/dragon-ball-detail.php';
    }
}