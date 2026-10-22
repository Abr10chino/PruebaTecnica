<?php

require_once __DIR__ . '/../models/DemonSlayerModel.php';

class DemonSlayerController
{
    private DemonSlayerModel $demonSlayerModel;

    public function __construct()
    {
        $this->demonSlayerModel = new DemonSlayerModel();
    }

    public function index(?int $page = 1): void
    {
        $page = $page ?? 1;

        $pagination = $this->demonSlayerModel->getPagination();

        $characters = $this->demonSlayerModel->getCharactersByPages($page);

        require __DIR__ . '/../views/demon-slayer.php';
    }

    public function show(int $id): void
    {


        $pagination = $this->demonSlayerModel->getPagination();
        
        $maxNumber = $pagination['totalItems'] ?? 50;

        $character = $this->demonSlayerModel->getCharacterById($id);

        require __DIR__ . '/../views/demon-slayer-detail.php';
    }
}
