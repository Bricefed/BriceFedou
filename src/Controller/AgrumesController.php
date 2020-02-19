<?php

namespace App\Controller;

use App\Repository\AgrumeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgrumesController extends AbstractController
{
    /**
     * @Route("/agrumes", name="agrumes")
     */
    public function index(AgrumeRepository $repository)
    {
        $agrumes = $repository -> findAll();
        return $this->render('agrumes/index.html.twig', [
            'agrumes' => $agrumes
        ]);
    }
    
    /**
    *@Route("/", name="home")
    */
    public function home()
    {
        return $this->render('home.html.twig');
    }
}
