<?php
/**
 * Created by PhpStorm.
 * User: benchaa
 * Date: 11/07/2017
 * Time: 00:06
 */

namespace BonoboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BonoboFriends
 *
 * @ORM\Table(name="bonobo_friends")
 * @ORM\Entity(repositoryClass="BonoboBundle\Repository\BonoboFriendsRepository")
 */
class BonoboFriends
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
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=30)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=30)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=30)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nourriture", type="string", length=30)
     */
    private $nourriture;


    /**
     * @var int
     *
     * @ORM\Column(name="user_fk", type="integer")
     * @ORM\ManyToMany(targetEntity="BonoboBundle\Entity\BonoboUser", cascade={"persist"})
     */
    private $user_fk;

    /**
     * @return int
     */
    public function getUserFk()
    {
        return $this->user_fk;
    }

    /**
     * @param int $user_fk
     */
    public function setUserFk($user_fk)
    {
        $this->user_fk = $user_fk;
        return $this;
    }

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
     * @return BonoboFriends
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
     * Set age
     *
     * @param string $age
     *
     * @return BonoboFriends
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return BonoboFriends
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return BonoboFriends
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return BonoboFriends
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }
}
