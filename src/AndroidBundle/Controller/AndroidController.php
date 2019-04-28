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
        $leVisiteur = $rp->findOneBy(array('visMatricule'=>$idVisiteur));
        return $leVisiteur;
    }
    
    public function getLeVisiAction($idVisiteur){
        $em = $this->getDoctrine()->getManager();
        $rp = $em->getRepository('AndroidBundle:Visiteur');
        $leVisiteur = $rp->findOneBy(array('visMatricule'=>$idVisiteur));
        $this->get('serializer')->serialize($leVisiteur, 'json');
        return new JsonResponse($leVisiteur) ;
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
     * @return Json<Praticien> Retourne un tableau Json contenant les praticiens
     * etant attribués au visiteur dont l'id est passée en paramêtre
     *
     */
    public function recupListePraticienAction($idVisiteur){
        try{
            $visiteur = $this->getLeVisi($idVisiteur);
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:Praticien');
            
            $lesPraticiens = $rp->findBy(array('praVisiteur' => $visiteur));
            
            
            $this->get('serializer')->serialize($lesPraticiens, 'json');
            return new JsonResponse($lesPraticiens);
        }
        catch (Exception $ex){
            return new JsonResponse($ex);
        }
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
    //Creation d'une fonction pour récupérer les Rapports en fonction d'un mois et d'une année sélectionner et de l'id du visiteur
    public function recupListRapportDateAction($idVisiteur,$date){
         
        try{
            $visiteur = $this->getLeVisi($idVisiteur);
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:RapportVisite');
            $lesRapportsDate = array();
            $lesRapports = $rp->findBy(array('visMatricule' => $visiteur));
            foreach($leRapport as $lesRapports){
                $ladate = $leRapport->getRapDateVisite;
                $dateStr=$ladate->format("Y-m");
                if($dateStr.equals($date)){
                    array_push($lesRapportsDate,$leRapport);
                }
            }

            $this->get('serializer')->serialize($LesRapportDate, 'json');
            return new JsonResponse($LesRapportDate);
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
            // on récupère les infos passés en POST et on désérialize
            
            $rapport = $request->request->get('rapport');
            
            $leRapport = json_decode($rapport);
              
            $dateRapport = new DateTime('now');
            $dateRapport->format('d-m-Y');
            
            //return new JsonResponse($leRapport);
            
            
            
            $idVisi = $leRapport->numVis;
            $idPra = $leRapport->numPra;
            $bilan = $leRapport->rapBilan;
            $dateVisite = $leRapport->dateVisite;
            
            
            $int_annee = $dateVisite->year;
            $int_mois = $dateVisite->month;
            $int_jour = $dateVisite->dayOfMonth;
            
            $jour = strval($int_jour);
            $mois = strval($int_mois);
            $annee = strval($int_annee);
            
            $dateCreator = $jour."-".$mois."-".$annee;
            
            
            $laDateVisite = DateTime::createFromFormat("d-m-Y", $dateCreator);
            
              
            $leVisiteur = $this->getLeVisi($idVisi);
            $lePraticien = $this->getLePraticien($idPra);
            
            
            $rapportInsere = new RapportVisite();
            
            $rapportInsere->setConsulte(false);
            $rapportInsere->setPraNum($lePraticien);
            $rapportInsere->setRapBilan($bilan);
            $rapportInsere->setRapDaterapport($dateRapport);
            $rapportInsere->setRapDatevisite($laDateVisite);
            $rapportInsere->setVisMatricule($leVisiteur);
            
            
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($rapportInsere);
            
            $em->flush();
            return new JsonResponse(true);
            
        } 
        catch (Exception $ex) {
            return new JsonResponse($ex->getMessage());
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
    public function getLesDateRapportAction($idVisiteur){
        $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:RapportVisite');

            $lesRapports = $rp->findBy(array('visMatricule' => $idVisiteur));
            $lesRapportsDate = array();
            
            foreach($lesRapports as $leRapport){
                $date = $leRapport->getRapDaterapport();
                array_push($lesRapportsDate,$date);
                
            }
            $this->get('serializer')->serialize($lesRapportsDate, 'json');
            return new JsonResponse($lesRapportsDate);
    }
    
    
    /**
     * 
     * @param int $idRapport : le numero du rapport à retourner
     * @param String $visMatricule : le numero du visiteur a qui appartient le rapport
     * @return Json<RapportVisite> Retourne l'objet correspondant
     * 
     */
    public function getunRapportParIdAction($idRapport, $visMatricule){
        try{
            
            $em = $this->getDoctrine()->getManager();
            $rp = $em->getRepository('AndroidBundle:RapportVisite');
            
            
            $leRapport = $rp->findOneBy(array('rapNum'=>$idRapport, 'visMatricule'=> $visMatricule));
            
            
            
            $leRapport->setConsulte(true);
            
            $em->persist($leRapport);
            $em->flush();
            $em->clear();
            
            $this->get('serializer')->serialize($leRapport, 'json');
            return new JsonResponse($leRapport);
            
        }
        catch (Exception $ex){
            return new JsonResponse($ex);
        }
    }


    public function testAction(){
        return new JsonResponse();
    }
    
}
