<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AndroidBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JsonSerializable;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use DateTime;

/**
 * Description of AndroidController
 *
 * @author developpeur
 */
class AndroidController extends Controller
{
    public function indexAction()
    {
        return new Response("toto");
    }
    
    
    /**
     * connexionAction
     * 
     * 
     * @param string $login Le login entré par le visiteur
     * @param string $password le mot de passe entré par le visiteur
     *
     * @return String Retourne le matricule du visiteur si il a entré les bons
     * logs, et un boolean FALSE si le login/password est inconnu ou faux.
     *
     */
    public function connexionAction($login, $password){
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('AndroidBundle:Visiteur');
        $leVisiteur = $rp->findOneBy(array('visLogin'=>$login , 'visMdp'=>$password));
        
        //$leVisiteur->encode_Json();
        
        $this->get('serializer')->serialize($leVisiteur, 'json');
        return new JsonResponse($leVisiteur);
        
    }   
    
    
    /**
     * getLeVisi
     * 
     * @param string $idVisiteur Le matricule du visiteur
     *
     * @return Visiteur Retourne un objet de type Visiteur correspondant 
     *                  au matricule passé en parametre
     *
     */
    public function getLeVisi($idVisiteur){
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('AndroidBundle:Visiteur');
        $leVisiteur = $rp->findOneByVisMatricule($idVisiteur);
        return $leVisiteur;
    }
    
    /**
     * getLeVisi
     * 
     * @param string $idVisiteur Le matricule du visiteur
     *
     * @return Visiteur Retourne un objet de type Visiteur correspondant 
     *                  au matricule passé en parametre
     *
     */
    public function getLePraticien($idPrat){
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('AndroidBundle:Praticien');
        $lePraticien = $rp->findOneByVisMatricule($idPrat);
        return $lePraticien;
    }
    
    /**
     * recupListeRapportAction
     * 
     * 
     * @param string $idVisiteur Le matricule du visiteur
     *
     * @return Json<RapportVisite> Retourne un tableau Json contenant les rapports
     * du visiteur dont le matricule est passé en parametre
     *
     */
    public function recupListeRapportAction($idVisiteur){
        $visiteur = $this->getLeVisi($idVisiteur);
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('AndroidBundle:RapportVisite');
        
        $lesRapports = $rp->findBy(array('visMatricule' => $visiteur));
        //dump($lesRapports);
        
        $this->get('serializer')->serialize($lesRapports, 'json');
        return new JsonResponse($lesRapports);
        
    }
    
    public function ajouterRapportAction(){
        try{
            $idVisi = $_POST['idVisi'];
            $idPraticien = $_POST['idPraticien'];
            $dateVisite = $_POST['dateVisite'];
            $dateRapport = new DateTime('now');
            $bilan = $_POST['bilan'];
            
            $leVisiteur = $this->getLeVisi($idVisi);
            $lePraticien = $this->getLePraticien($idPraticien);
            
            
            
            
            
            
        } 
        catch (Exception $ex) {
            return new JsonResponse('maBite');
        }
    }
    
    public function dAction(){
        
    }


    public function testAction(){
        return new JsonResponse();
    }
    
}
