<?php

namespace AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * RapportVisite
 *
 * @ORM\Table(name="Rapport_Visite", indexes={@ORM\Index(name="FK_RV_Praticien", columns={"pra_num"}), @ORM\Index(name="fk-rv-visi", columns={"vis_matricule"})})
 * @ORM\Entity
 */
class RapportVisite implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="rap_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rapNum;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="consulte", type="boolean", nullable=true)
     */
    private $consulte = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rap_bilan", type="string", length=510, nullable=true)
     */
    private $rapBilan = '';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="rap_dateVisite", type="date", nullable=true)
     */
    private $rapDatevisite;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="rap_dateRapport", type="date", nullable=true)
     */
    private $rapDaterapport;

    /**
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pra_num", referencedColumnName="pra_num")
     * })
     */
    private $praNum;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vis_matricule", referencedColumnName="vis_matricule")
     * })
     */
    private $visMatricule;



    /**
     * Get rapNum.
     *
     * @return int
     */
    public function getRapNum()
    {
        return $this->rapNum;
    }

    /**
     * Set consulte.
     *
     * @param bool|null $consulte
     *
     * @return RapportVisite
     */
    public function setConsulte($consulte = null)
    {
        $this->consulte = $consulte;

        return $this;
    }

    /**
     * Get consulte.
     *
     * @return bool|null
     */
    public function getConsulte()
    {
        return $this->consulte;
    }

    /**
     * Set rapBilan.
     *
     * @param string|null $rapBilan
     *
     * @return RapportVisite
     */
    public function setRapBilan($rapBilan = null)
    {
        $this->rapBilan = $rapBilan;

        return $this;
    }

    /**
     * Get rapBilan.
     *
     * @return string|null
     */
    public function getRapBilan()
    {
        return $this->rapBilan;
    }

    /**
     * Set rapDatevisite.
     *
     * @param \DateTime|null $rapDatevisite
     *
     * @return RapportVisite
     */
    public function setRapDatevisite($rapDatevisite = null)
    {
        $this->rapDatevisite = $rapDatevisite;

        return $this;
    }

    /**
     * Get rapDatevisite.
     *
     * @return \DateTime|null
     */
    public function getRapDatevisite()
    {
        return $this->rapDatevisite;
    }

    /**
     * Set rapDaterapport.
     *
     * @param \DateTime|null $rapDaterapport
     *
     * @return RapportVisite
     */
    public function setRapDaterapport($rapDaterapport = null)
    {
        $this->rapDaterapport = $rapDaterapport;

        return $this;
    }

    /**
     * Get rapDaterapport.
     *
     * @return \DateTime|null
     */
    public function getRapDaterapport()
    {
        return $this->rapDaterapport;
    }

    /**
     * Set praNum.
     *
     * @param \AndroidBundle\Entity\Praticien|null $praNum
     *
     * @return RapportVisite
     */
    public function setPraNum(\AndroidBundle\Entity\Praticien $praNum = null)
    {
        $this->praNum = $praNum;

        return $this;
    }

    /**
     * Get praNum.
     *
     * @return \AndroidBundle\Entity\Praticien|null
     */
    public function getPraNum()
    {
        return $this->praNum;
    }

    /**
     * Set visMatricule.
     *
     * @param \AndroidBundle\Entity\Visiteur|null $visMatricule
     *
     * @return RapportVisite
     */
    public function setVisMatricule(\AndroidBundle\Entity\Visiteur $visMatricule = null)
    {
        $this->visMatricule = $visMatricule;

        return $this;
    }

    /**
     * Get visMatricule.
     *
     * @return \AndroidBundle\Entity\Visiteur|null
     */
    public function getVisMatricule()
    {
        return $this->visMatricule;
    }
    public function jsonSerialize() {
        return array(
            "rapNum"=>$this->rapNum,
            "consulte"=>$this->consulte,
            "bilan" => $this->rapBilan,
            "dateRapport" => $this->rapDaterapport->format('d-m-Y'),
            "dateVisite" => $this->rapDatevisite->format('d-m-Y'),
            "praticien" => $this->praNum->jsonSerialize(),
            
            
            );
    }
}
