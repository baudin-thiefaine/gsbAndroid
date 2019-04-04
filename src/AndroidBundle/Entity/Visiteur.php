<?php

namespace AndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table(name="Visiteur")
 * @ORM\Entity
 */
class Visiteur
{
    /**
     * @var string
     *
     * @ORM\Column(name="vis_matricule", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $visMatricule = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_nom", type="string", length=50, nullable=true)
     */
    private $visNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_prenom", type="string", length=100, nullable=true)
     */
    private $visPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_adresse", type="string", length=100, nullable=true)
     */
    private $visAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_cp", type="string", length=10, nullable=true)
     */
    private $visCp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_ville", type="string", length=60, nullable=true)
     */
    private $visVille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_login", type="string", length=25, nullable=true)
     */
    private $visLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vis_mdp", type="string", length=50, nullable=true)
     */
    private $visMdp;



    /**
     * Get visMatricule.
     *
     * @return string
     */
    public function getVisMatricule()
    {
        return $this->visMatricule;
    }

    /**
     * Set visNom.
     *
     * @param string|null $visNom
     *
     * @return Visiteur
     */
    public function setVisNom($visNom = null)
    {
        $this->visNom = $visNom;

        return $this;
    }

    /**
     * Get visNom.
     *
     * @return string|null
     */
    public function getVisNom()
    {
        return $this->visNom;
    }

    /**
     * Set visPrenom.
     *
     * @param string|null $visPrenom
     *
     * @return Visiteur
     */
    public function setVisPrenom($visPrenom = null)
    {
        $this->visPrenom = $visPrenom;

        return $this;
    }

    /**
     * Get visPrenom.
     *
     * @return string|null
     */
    public function getVisPrenom()
    {
        return $this->visPrenom;
    }

    /**
     * Set visAdresse.
     *
     * @param string|null $visAdresse
     *
     * @return Visiteur
     */
    public function setVisAdresse($visAdresse = null)
    {
        $this->visAdresse = $visAdresse;

        return $this;
    }

    /**
     * Get visAdresse.
     *
     * @return string|null
     */
    public function getVisAdresse()
    {
        return $this->visAdresse;
    }

    /**
     * Set visCp.
     *
     * @param string|null $visCp
     *
     * @return Visiteur
     */
    public function setVisCp($visCp = null)
    {
        $this->visCp = $visCp;

        return $this;
    }

    /**
     * Get visCp.
     *
     * @return string|null
     */
    public function getVisCp()
    {
        return $this->visCp;
    }

    /**
     * Set visVille.
     *
     * @param string|null $visVille
     *
     * @return Visiteur
     */
    public function setVisVille($visVille = null)
    {
        $this->visVille = $visVille;

        return $this;
    }

    /**
     * Get visVille.
     *
     * @return string|null
     */
    public function getVisVille()
    {
        return $this->visVille;
    }

    /**
     * Set visLogin.
     *
     * @param string|null $visLogin
     *
     * @return Visiteur
     */
    public function setVisLogin($visLogin = null)
    {
        $this->visLogin = $visLogin;

        return $this;
    }

    /**
     * Get visLogin.
     *
     * @return string|null
     */
    public function getVisLogin()
    {
        return $this->visLogin;
    }

    /**
     * Set visMdp.
     *
     * @param string|null $visMdp
     *
     * @return Visiteur
     */
    public function setVisMdp($visMdp = null)
    {
        $this->visMdp = $visMdp;

        return $this;
    }

    /**
     * Get visMdp.
     *
     * @return string|null
     */
    public function getVisMdp()
    {
        return $this->visMdp;
    }
}
