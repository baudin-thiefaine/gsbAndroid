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
use Symfony\Component\HttpFoundation\Request;
use AndroidBundle\Entity\RapportVisite;

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
        $lePraticien = $rp->findOneByPraNum($idPrat);
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
        try{
            $visiteur = $this->getLeVisi($idVisiteur);
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:RapportVisite');

            $lesRapports = $rp->findBy(array('visMatricule' => $visiteur));
            //dump($lesRapports);

            $this->get('serializer')->serialize($lesRapports, 'json');
            return new JsonResponse($lesRapports);
        }
        catch (Exception $ex){
            return new JsonResponse($ex);
        }
        
        
    }
    
    
    /**
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function ajouterRapportAction(Request $request){
        try{
            // on récupère les infos passés en POST
            $idVisi = $request->request->get('idVisi');
            $idPraticien = $request->request->get('idPraticien');
            $dateVisite = $request->request->get('dateVisite');
            $bilan = $request->request->get('bilan');
            $dateRapport = new DateTime('now');
            $dateRapport->format('d-m-Y');
            
            
                      
            //Puis on crée les objets et on les insère dans la BDD
            
            $leVisiteur = $this->getLeVisi($idVisi);
            $lePraticien = $this->getLePraticien($idPraticien);
            
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:RapportVisite');
            $leRapport = new RapportVisite();
            $leRapport->setConsulte(false);
            $leRapport->setPraNum($lePraticien);
            $leRapport->setRapBilan($bilan);
            $leRapport->setRapDaterapport($dateRapport);
            $leRapport->setRapDatevisite($dateVisite);
            $leRapport->setVisMatricule($leVisiteur);
            
            
            
            $em->persist($leRapport);
            $em->flush();
            $em->clear();
            
            return new JsonResponse(true);
            
        } 
        catch (Exception $ex) {
            return new JsonResponse($ex);
        }
        
    }
    
    /**
     * 
     * @param int $mois
     * @param int $annee
     * @return Json<RapportVisite> Retourne un tableau Json contenant les rapports
     * correspondants au mois et à l'annee passé en parametre
     * 
     */
    public function getLesRapportsParDateAction($mois, $annee){
        try{
            
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:RapportVisite');
            
            $lesRapports = array();
            $tousLesRapports = $rp->findAll();
            
            foreach ($tousLesRapports as $unRapport){
                
                $date = $unRapport->getRapDaterapport();
                if(($date->format('Y') == $annee) && ($date->format('m') == $mois)){
                    array_push($lesRapports, $unRapport);
                }
            }
            

            $this->get('serializer')->serialize($lesRapports, 'json');
            return new JsonResponse($lesRapports);
            
        }
        catch (Exception $ex){
            return new JsonResponse($ex);
        }
    }
    


    public function testAction(){
        return new JsonResponse();
    }
    
}
