<?php

namespace App\Controller\Admin;

use App\Entity\StatutAgent;
use App\Form\StatutAgentType;
use App\Repository\StatutAgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/statut/agent')]
class StatutAgentController extends AbstractController
{
    #[Route('/', name: 'app_statut_agent_index', methods: ['GET'])]
    public function index(StatutAgentRepository $statutAgentRepository): Response
    {
        return $this->render('statut_agent/index.html.twig', [
            'statut_agents' => $statutAgentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_statut_agent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StatutAgentRepository $statutAgentRepository): Response
    {
        $statutAgent = new StatutAgent();
        $form = $this->createForm(StatutAgentType::class, $statutAgent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statutAgentRepository->save($statutAgent, true);

            return $this->redirectToRoute('app_statut_agent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statut_agent/new.html.twig', [
            'statut_agent' => $statutAgent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_statut_agent_show', methods: ['GET'])]
    public function show(StatutAgent $statutAgent): Response
    {
        return $this->render('statut_agent/show.html.twig', [
            'statut_agent' => $statutAgent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_statut_agent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatutAgent $statutAgent, StatutAgentRepository $statutAgentRepository): Response
    {
        $form = $this->createForm(StatutAgentType::class, $statutAgent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statutAgentRepository->save($statutAgent, true);

            return $this->redirectToRoute('app_statut_agent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statut_agent/edit.html.twig', [
            'statut_agent' => $statutAgent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_statut_agent_delete', methods: ['POST'])]
    public function delete(Request $request, StatutAgent $statutAgent, StatutAgentRepository $statutAgentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statutAgent->getId(), $request->request->get('_token'))) {
            $statutAgentRepository->remove($statutAgent, true);
        }

        return $this->redirectToRoute('app_statut_agent_index', [], Response::HTTP_SEE_OTHER);
    }
}
