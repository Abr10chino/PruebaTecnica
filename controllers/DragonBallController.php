<?php

require_once __DIR__ . '/../models/DragonBallModel.php';

class DragonBallController
{
    private DragonBallModel $dragonBallModel;

    public function __construct()
    {
        $this->dragonBallModel = new DragonBallModel();
    }

    public function index(): void
    {
        $characters = $this->dragonBallModel->getCharacters();

        require __DIR__ . '/../views/dragon-ball.php';
    }

    public function show(int $id): void
    {
        $character =
            $this->dragonBallModel->getCharacterById($id);

        require __DIR__ . '/../views/dragon-ball-detail.php';
    }
}