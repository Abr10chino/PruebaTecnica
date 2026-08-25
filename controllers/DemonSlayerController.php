<?php

require_once __DIR__ . '/../models/DemonSlayerModel.php';

class DemonSlayerController
{
    private DemonSlayerModel $demonSlayerModel;

    public function __construct()
    {
        $this->demonSlayerModel = new DemonSlayerModel();
    }

    public function index(): void
    {
        $characters = $this->demonSlayerModel->getCharacters();

        require __DIR__ . '/../views/demon-slayer.php';
    }

    public function show(int $id): void
    {
        $character = $this->demonSlayerModel->getCharacterById($id);

        require __DIR__ . '/../views/demon-slayer-detail.php';
    }
}
