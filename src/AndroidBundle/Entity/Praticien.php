<?php

namespace AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Praticien
 *
 * @ORM\Table(name="Praticien", indexes={@ORM\Index(name="FK_Praticien_Visiteur", columns={"pra_visiteur"}), @ORM\Index(name="FK_Praticien_Type_Praticien", columns={"pra_typeCode"})})
 * @ORM\Entity
 */
class Praticien implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="pra_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $praNum = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_nom", type="string", length=50, nullable=true)
     */
    private $praNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_prenom", type="string", length=60, nullable=true)
     */
    private $praPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_adresse", type="string", length=100, nullable=true)
     */
    private $praAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_cp", type="string", length=10, nullable=true)
     */
    private $praCp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pra_ville", type="string", length=50, nullable=true)
     */
    private $praVille;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pra_coefNotoriete", type="float", precision=10, scale=0, nullable=true)
     */
    private $praCoefnotoriete;

    /**
     * @var \TypePraticien
     *
     * @ORM\ManyToOne(targetEntity="TypePraticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pra_typeCode", referencedColumnName="type_code")
     * })
     */
    private $praTypecode;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pra_visiteur", referencedColumnName="vis_matricule")
     * })
     */
    private $praVisiteur;



    /**
     * Get praNum.
     *
     * @return int
     */
    public function getPraNum()
    {
        return $this->praNum;
    }

    /**
     * Set praNom.
     *
     * @param string|null $praNom
     *
     * @return Praticien
     */
    public function setPraNom($praNom = null)
    {
        $this->praNom = $praNom;

        return $this;
    }

    /**
     * Get praNom.
     *
     * @return string|null
     */
    public function getPraNom()
    {
        return $this->praNom;
    }

    /**
     * Set praPrenom.
     *
     * @param string|null $praPrenom
     *
     * @return Praticien
     */
    public function setPraPrenom($praPrenom = null)
    {
        $this->praPrenom = $praPrenom;

        return $this;
    }

    /**
     * Get praPrenom.
     *
     * @return string|null
     */
    public function getPraPrenom()
    {
        return $this->praPrenom;
    }

    /**
     * Set praAdresse.
     *
     * @param string|null $praAdresse
     *
     * @return Praticien
     */
    public function setPraAdresse($praAdresse = null)
    {
        $this->praAdresse = $praAdresse;

        return $this;
    }

    /**
     * Get praAdresse.
     *
     * @return string|null
     */
    public function getPraAdresse()
    {
        return $this->praAdresse;
    }

    /**
     * Set praCp.
     *
     * @param string|null $praCp
     *
     * @return Praticien
     */
    public function setPraCp($praCp = null)
    {
        $this->praCp = $praCp;

        return $this;
    }

    /**
     * Get praCp.
     *
     * @return string|null
     */
    public function getPraCp()
    {
        return $this->praCp;
    }

    /**
     * Set praVille.
     *
     * @param string|null $praVille
     *
     * @return Praticien
     */
    public function setPraVille($praVille = null)
    {
        $this->praVille = $praVille;

        return $this;
    }

    /**
     * Get praVille.
     *
     * @return string|null
     */
    public function getPraVille()
    {
        return $this->praVille;
    }

    /**
     * Set praCoefnotoriete.
     *
     * @param float|null $praCoefnotoriete
     *
     * @return Praticien
     */
    public function setPraCoefnotoriete($praCoefnotoriete = null)
    {
        $this->praCoefnotoriete = $praCoefnotoriete;

        return $this;
    }

    /**
     * Get praCoefnotoriete.
     *
     * @return float|null
     */
    public function getPraCoefnotoriete()
    {
        return $this->praCoefnotoriete;
    }

    /**
     * Set praTypecode.
     *
     * @param \AndroidBundle\Entity\TypePraticien|null $praTypecode
     *
     * @return Praticien
     */
    public function setPraTypecode(\AndroidBundle\Entity\TypePraticien $praTypecode = null)
    {
        $this->praTypecode = $praTypecode;

        return $this;
    }

    /**
     * Get praTypecode.
     *
     * @return \AndroidBundle\Entity\TypePraticien|null
     */
    public function getPraTypecode()
    {
        return $this->praTypecode;
    }

    /**
     * Set praVisiteur.
     *
     * @param \AndroidBundle\Entity\Visiteur|null $praVisiteur
     *
     * @return Praticien
     */
    public function setPraVisiteur(\AndroidBundle\Entity\Visiteur $praVisiteur = null)
    {
        $this->praVisiteur = $praVisiteur;

        return $this;
    }

    /**
     * Get praVisiteur.
     *
     * @return \AndroidBundle\Entity\Visiteur|null
     */
    public function getPraVisiteur()
    {
        return $this->praVisiteur;
    }

    public function jsonSerialize() {
        return array(
            "praNum"=>$this->praNum,
            "praNom"=>$this->praNom,
            "praPrenom"=>$this->praPrenom,
            "praAdresse"=>$this->praAdresse,
            "praCp"=>$this->praCp,
            "praVille"=>$this->praVille,
            "praCoefNotoriete"=>$this->praCoefnotoriete,
            "praTypeCode"=>$this->praTypecode->getTypeCode(),
            "praVisiteur"=>$this->praVisiteur
            );
    }

}
