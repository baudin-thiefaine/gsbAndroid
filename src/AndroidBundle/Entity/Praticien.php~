<?php

namespace AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Praticien
 *
 * @ORM\Table(name="Praticien", indexes={@ORM\Index(name="FK_Praticien_Visiteur", columns={"pra_visiteur"}), @ORM\Index(name="FK_Praticien_Type_Praticien", columns={"pra_typeCode"})})
 * @ORM\Entity
 */
class Praticien
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


}
