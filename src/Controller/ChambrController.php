<?php

namespace App\Controller;

use App\Entity\Chambr;
use App\Form\ChambrType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambrController extends AbstractController
{
    /**
     * @Route("/chambr", name="chambr")
     */
    public function index()
    {
        return $this->render('chambr/index.html.twig', [
            'controller_name' => 'ChambrController',
        ]);
    }
 /**
     * @Route("/chambr/create", name="chambr_create", methods={"POST","GET"})
     */
    public function create( Request $request, EntityManagerInterface $em):Response
    {
        $chambre = new Chambr();
        $form = $this->createForm(ChambrType::class,$chambre);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // dd($chambr);
            // $em = $this->getDoctrine()->getManager();
            $em->persist($chambre);
            $em->flush();
            return $this->redirectToRoute('chambr_index');
            
            
        }
       // dump($form);
       
        return $this->render('chambr/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
  
    
}
