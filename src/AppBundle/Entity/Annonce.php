<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=150)
     * @Assert\Length(
     *      min = 2,
     *      max = 150,
     *      minMessage = "Votre titre doit etre plus long que {{ limit }} caractères",
     *      maxMessage = "Votre titre est trop long, il fait plus de {{ limit }} caractères"
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100)
     * @Assert\Email(
     *     message = "Le mail '{{ value }}' n'est pas une adresse valide.",
     *     checkMX = true
     * )
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Votre mail doit etre plus long que {{ limit }} caractères",
     *      maxMessage = "Votre mail est trop long, il fait plus de {{ limit }} caractères"
     * )
     */
    private $mail;

//------------------------------------------------------------------------------

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Annonce
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Annonce
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Annonce
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
}
