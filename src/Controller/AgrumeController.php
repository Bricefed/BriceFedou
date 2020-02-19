<?php

namespace App\Controller;

use App\Entity\Agrume;
use App\Form\AgrumeType;
use App\Repository\AgrumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/agrume")
 */
class AgrumeController extends AbstractController
{
    /**
     * @Route("/", name="agrume_index", methods={"GET"})
     */
    public function index(AgrumeRepository $agrumeRepository): Response
    {
        return $this->render('agrume/index.html.twig', [
            'agrumes' => $agrumeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="agrume_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $agrume = new Agrume();
        $form = $this->createForm(AgrumeType::class, $agrume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agrume);
            $entityManager->flush();

            return $this->redirectToRoute('agrume_index');
        }

        return $this->render('agrume/new.html.twig', [
            'agrume' => $agrume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agrume_show", methods={"GET"})
     */
    public function show(Agrume $agrume): Response
    {
        return $this->render('agrume/show.html.twig', [
            'agrume' => $agrume,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="agrume_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Agrume $agrume): Response
    {
        $form = $this->createForm(AgrumeType::class, $agrume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agrume_index');
        }

        return $this->render('agrume/edit.html.twig', [
            'agrume' => $agrume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="agrume_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Agrume $agrume): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agrume->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($agrume);
            $entityManager->flush();
        }

        return $this->redirectToRoute('agrume_index');
    }
}
