<?php

namespace App\Controller;

use App\Entity\DepotSauvage;
use App\Form\DepotSauvageType;
use App\Repository\DepotSauvageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/depot/sauvage')]
class DepotSauvageController extends AbstractController
{
    #[Route('/', name: 'app_depot_sauvage_index', methods: ['GET'])]
    public function index(DepotSauvageRepository $depotSauvageRepository): Response
    {
        return $this->render('depot_sauvage/index.html.twig', [
            'depot_sauvages' => $depotSauvageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_depot_sauvage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DepotSauvageRepository $depotSauvageRepository): Response
    {
        $depotSauvage = new DepotSauvage();
        $form = $this->createForm(DepotSauvageType::class, $depotSauvage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $depotSauvageRepository->save($depotSauvage, true);

            return $this->redirectToRoute('app_depot_sauvage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('depot_sauvage/new.html.twig', [
            'depot_sauvage' => $depotSauvage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_depot_sauvage_show', methods: ['GET'])]
    public function show(DepotSauvage $depotSauvage): Response
    {
        return $this->render('depot_sauvage/show.html.twig', [
            'depot_sauvage' => $depotSauvage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_depot_sauvage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DepotSauvage $depotSauvage, DepotSauvageRepository $depotSauvageRepository): Response
    {
        $form = $this->createForm(DepotSauvageType::class, $depotSauvage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $depotSauvageRepository->save($depotSauvage, true);

            return $this->redirectToRoute('app_depot_sauvage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('depot_sauvage/edit.html.twig', [
            'depot_sauvage' => $depotSauvage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_depot_sauvage_delete', methods: ['POST'])]
    public function delete(Request $request, DepotSauvage $depotSauvage, DepotSauvageRepository $depotSauvageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depotSauvage->getId(), $request->request->get('_token'))) {
            $depotSauvageRepository->remove($depotSauvage, true);
        }

        return $this->redirectToRoute('app_depot_sauvage_index', [], Response::HTTP_SEE_OTHER);
    }
}
