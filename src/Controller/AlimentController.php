<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function index(AlimentRepository $alimentRepository)
    {
        $aliments = $alimentRepository->findAll();

        return $this->render('aliment/index.html.twig', [
            'aliments' => $aliments,
            'title' => "Liste des Aliments"
        ]);
    }

    /**
     * @Route("/aliments/{calorie}", name="alimentsParColorie")
     */
    public function alimentsParColorie(AlimentRepository $alimentRepository, $calorie)
    {
        $aliments = $alimentRepository->getAlimentsParNbCalorie($calorie);
        return $this->render('aliment/index.html.twig', [
            'aliments' => $aliments,
            'title' => "Liste des Aliments avec moins de 50 Calorie"
        ]);
    }
}
