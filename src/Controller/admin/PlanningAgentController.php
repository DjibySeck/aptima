<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningAgentController extends AbstractController
{
    #[Route('/admin/planning/agent', name: 'app_planning_agent')]
    public function index(): Response
    {
        return $this->render('planning_agent/index.html.twig', [
            'controller_name' => 'PlanningAgentController',
        ]);
    }
}
