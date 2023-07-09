<?php

namespace App\Controller\Admin;

use App\Entity\CentreTri;
use App\Form\CentreTriType;
use App\Repository\CentreTriRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/centre/tri')]
class CentreTriController extends AbstractController
{
    #[Route('/', name: 'app_centre_tri_index', methods: ['GET'])]
    public function index(CentreTriRepository $centreTriRepository): Response
    {
        return $this->render('centre_tri/index.html.twig', [
            'centre_tris' => $centreTriRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_centre_tri_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CentreTriRepository $centreTriRepository): Response
    {
        $centreTri = new CentreTri();
        $form = $this->createForm(CentreTriType::class, $centreTri);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $centreTriRepository->save($centreTri, true);

            return $this->redirectToRoute('app_centre_tri_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('centre_tri/new.html.twig', [
            'centre_tri' => $centreTri,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centre_tri_show', methods: ['GET'])]
    public function show(CentreTri $centreTri): Response
    {
        return $this->render('centre_tri/show.html.twig', [
            'centre_tri' => $centreTri,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_centre_tri_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CentreTri $centreTri, CentreTriRepository $centreTriRepository): Response
    {
        $form = $this->createForm(CentreTriType::class, $centreTri);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $centreTriRepository->save($centreTri, true);

            return $this->redirectToRoute('app_centre_tri_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('centre_tri/edit.html.twig', [
            'centre_tri' => $centreTri,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_centre_tri_delete', methods: ['POST'])]
    public function delete(Request $request, CentreTri $centreTri, CentreTriRepository $centreTriRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centreTri->getId(), $request->request->get('_token'))) {
            $centreTriRepository->remove($centreTri, true);
        }

        return $this->redirectToRoute('app_centre_tri_index', [], Response::HTTP_SEE_OTHER);
    }
}
