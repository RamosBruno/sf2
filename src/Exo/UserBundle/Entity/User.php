<?php

namespace Exo\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Exo\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToOne(targetEntity="Exo\UserBundle\Entity\InfoPro", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $infoPro;

    public function __construct()
    {
        parent::__construct();
        $this->infoPro = new \Exo\UserBundle\Entity\InfoPro();
        trigger_error(sprintf('%s is deprecated. Extend FOS\UserBundle\Model\User directly.', __CLASS__), E_USER_DEPRECATED);
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set infoPro
     *
     * @param \Exo\UserBundle\Entity\InfoPro $infoPro
     * @return User
     */
    public function setInfoPro(\Exo\UserBundle\Entity\InfoPro $infoPro)
    {
        $this->infoPro = $infoPro;

        return $this;
    }

    /**
     * Get infoPro
     *
     * @return \Exo\UserBundle\Entity\InfoPro 
     */
    public function getInfoPro()
    {
        return $this->infoPro;
    }
}
