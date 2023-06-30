<?php

namespace App\Controller;

use App\Entity\Dechetterie;
use App\Form\DechetterieType;
use App\Repository\DechetterieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dechetterie')]
class DechetterieController extends AbstractController
{
    #[Route('/', name: 'app_dechetterie_index', methods: ['GET'])]
    public function index(DechetterieRepository $dechetterieRepository): Response
    {
        return $this->render('dechetterie/index.html.twig', [
            'dechetteries' => $dechetterieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dechetterie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DechetterieRepository $dechetterieRepository): Response
    {
        $dechetterie = new Dechetterie();
        $form = $this->createForm(DechetterieType::class, $dechetterie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dechetterieRepository->save($dechetterie, true);

            return $this->redirectToRoute('app_dechetterie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dechetterie/new.html.twig', [
            'dechetterie' => $dechetterie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dechetterie_show', methods: ['GET'])]
    public function show(Dechetterie $dechetterie): Response
    {
        return $this->render('dechetterie/show.html.twig', [
            'dechetterie' => $dechetterie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dechetterie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dechetterie $dechetterie, DechetterieRepository $dechetterieRepository): Response
    {
        $form = $this->createForm(DechetterieType::class, $dechetterie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dechetterieRepository->save($dechetterie, true);

            return $this->redirectToRoute('app_dechetterie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dechetterie/edit.html.twig', [
            'dechetterie' => $dechetterie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dechetterie_delete', methods: ['POST'])]
    public function delete(Request $request, Dechetterie $dechetterie, DechetterieRepository $dechetterieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dechetterie->getId(), $request->request->get('_token'))) {
            $dechetterieRepository->remove($dechetterie, true);
        }

        return $this->redirectToRoute('app_dechetterie_index', [], Response::HTTP_SEE_OTHER);
    }
}
