<?php

namespace App\Controller\Admin;

use App\Entity\ReseauIncendie;
use App\Form\ReseauIncendieType;
use App\Repository\ReseauIncendieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/reseau/incendie')]
class ReseauIncendieController extends AbstractController
{
    #[Route('/', name: 'app_reseau_incendie_index', methods: ['GET'])]
    public function index(ReseauIncendieRepository $reseauIncendieRepository): Response
    {
        return $this->render('reseau_incendie/index.html.twig', [
            'reseau_incendies' => $reseauIncendieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reseau_incendie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReseauIncendieRepository $reseauIncendieRepository): Response
    {
        $reseauIncendie = new ReseauIncendie();
        $form = $this->createForm(ReseauIncendieType::class, $reseauIncendie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reseauIncendieRepository->save($reseauIncendie, true);

            return $this->redirectToRoute('app_reseau_incendie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reseau_incendie/new.html.twig', [
            'reseau_incendie' => $reseauIncendie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reseau_incendie_show', methods: ['GET'])]
    public function show(ReseauIncendie $reseauIncendie): Response
    {
        return $this->render('reseau_incendie/show.html.twig', [
            'reseau_incendie' => $reseauIncendie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reseau_incendie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReseauIncendie $reseauIncendie, ReseauIncendieRepository $reseauIncendieRepository): Response
    {
        $form = $this->createForm(ReseauIncendieType::class, $reseauIncendie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reseauIncendieRepository->save($reseauIncendie, true);

            return $this->redirectToRoute('app_reseau_incendie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reseau_incendie/edit.html.twig', [
            'reseau_incendie' => $reseauIncendie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reseau_incendie_delete', methods: ['POST'])]
    public function delete(Request $request, ReseauIncendie $reseauIncendie, ReseauIncendieRepository $reseauIncendieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reseauIncendie->getId(), $request->request->get('_token'))) {
            $reseauIncendieRepository->remove($reseauIncendie, true);
        }

        return $this->redirectToRoute('app_reseau_incendie_index', [], Response::HTTP_SEE_OTHER);
    }
}
