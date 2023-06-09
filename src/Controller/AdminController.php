<?php

namespace App\Controller;

use App\Entity\IssueCategory;
use App\Form\Type\IssueCategoryType;
use App\Service\IssuesManager;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/category/add', name: 'new_category')]
    public function addCategory(Request $request, EntityManagerInterface $entityManager)
    {
        $category = new IssueCategory();
        $form = $this->createForm(IssueCategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $category = $form->getData();
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($category);
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
            // ... perform some action, such as saving the task to the database
            return $this->redirectToRoute('home');
        }

        return $this->render('admin/newcategory.html.twig', [
            'form' => $form
        ]);
    }

    // try to make controller to status  changing
//    #[Route('/status/change', name: 'change_status')]
//    public function changeComplaintStatus(Request $request, int $complaintId, IssuesManager $issuesManager): Response
//    {
//        $statusId = $request->request->get('status_id');
//
//        $complaint = $this->getDoctrine()->getRepository(Complaint::class)->find($complaintId);
//
//        if (!$complaint) {
//            throw $this->createNotFoundException('Скарга з таким ідентифікатором не знайдена.');
//        }
//
//        if (!array_key_exists($statusId, $issuesManager->getStatuses())) {
//            throw $this->createNotFoundException('Статус з таким ідентифікатором не знайдений.');
//        }
//
//        $statusLabel = $issuesManager->getStatuses()[$statusId];
//
//        // Змінити статус скарги
//        $complaint->setStatus($statusLabel);
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->persist($complaint);
//        $entityManager->flush();
//
//        return new Response('Status was changed.');
//    }


}