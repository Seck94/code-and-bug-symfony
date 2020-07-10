<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant/listeetudiant", name="etudiant_listeetudiant")
     */
   
    public function lister(EtudiantRepository $er){
        $alls=$er->findBy(array(),array(),$_POST["limit"],$_POST['offset']);
        for($i=0;$i<count($alls);$i++){
            $data[$i]['nom']=$alls[$i]->getNom();
            $data[$i]['prenom']=$alls[$i]->getPrenom();
            $data[$i]['email']=$alls[$i]->getEmail();
            $data[$i]['telephone']=$alls[$i]->getTelephone();
            
            $data[$i]['date']=$alls[$i]->getDate();

        }

        return new JsonResponse($data);
    }

        
    /**
     * @Route("/", name="etudiant_index")
     */
    public function index(FlashyNotifier $flashy, EtudiantRepository $etudiantRepository)
    {
        
         $etudiants = $etudiantRepository->findAll();
         if(isset($_POST['search']))
         {
             $etudiants=$etudiantRepository->findStudent($_POST['search']);
         }
        $flashy->info('Vous venez d\'ajouter un nouveau étudiant !', 'http://127.0.0.1:8000/');
        return $this->render('etudiant/index.html.twig',compact('etudiants'));
    }

     /**
     * @Route("/etudiant/create", name="etudiant_create", methods={"POST","GET"})
     */
    public function create( Request $request, EntityManagerInterface $em): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // dd($etudiant);
            // $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('etudiant_index');
            
            
        }
       // dump($form);
       
        return $this->render('etudiant/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

       /**
     * @Route("/etudiant/{id<[0-9]+>}/update", name="etudiant_update", methods={"POST","GET"})
     */
    public function update( Request $request, EntityManagerInterface $em,Etudiant $etudiant): Response
    {
        //$etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // dd($etudiant);
            // $em = $this->getDoctrine()->getManager();
            //$em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('etudiant_index');
            
        }
       // dump($form);
       
        return $this->render('etudiant/create.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route("/etudiant/{id<[0-9]+>}/delete", name="etudiant_delete")
     */
    public function delete( Request $request, EntityManagerInterface $em,Etudiant $etudiant) 
    {
     $em -> remove($etudiant);
     $em -> flush();   
     return $this->redirectToRoute('etudiant_index');
    }
}
