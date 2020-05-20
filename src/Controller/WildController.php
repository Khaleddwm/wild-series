<?php
/**
 * Auteur: Khaled Benharrat
 * Date: 19/05/2020
 */

// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index() :Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /**
     * @Route("/wild/show/{slug}", requirements={"slug"="^[a-z0-9-]+$"}, defaults={"slug"=false}, name="wild_slug")
     */
    public function show(string $slug) :Response
    {
        // Returns a slug if it is defined
        if (!empty($slug)) {
            $slug = ucwords(preg_replace('/-/', ' ', $slug));
        } else {
            $slug = "Aucune série sélectionnée, veuillez choisir une série";
        }
        return $this->render('wild/show.html.twig', ['slug' => $slug]);
    }
}