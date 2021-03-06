<?php

namespace AppBundle\Entity;

use ArrayAccess;
use Doctrine\ORM\Mapping as ORM;

//"@=service('security.token_storage').getToken().getUser().getUserForum()"


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Yosimitso\WorkingForumBundle\Entity\UserInterface as YomiInter;


use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *@Vich\Uploadable
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *     /**

 */
class User extends BaseUser implements YomiInter,  ArrayAccess
{
    /**
     * @var ForumUser
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ForumUser", inversedBy="userManager" ,cascade={"persist", "remove"})
     *
     */
    protected $userForum;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $nbVisite;

    /**
     * @ORM\Column(type="array")
     *
     * @var array
     */
    private $listeVisiteur;


    /**
     * @var int
     *
     * @ORM\Column(name="dateInscrip", type="string", length=255,nullable=true)
     * */
    protected $dateInscrip;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255,nullable = true)
     *
     */

    protected $role;

    /**
     * @var int
     *
     * @ORM\Column(name="Status", type="string", length=255,nullable=true)
     * */
    protected $status;



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
     * User constructor.
     */


    public function __construct()
    {

        parent::__construct();
        $this->dateInscrip = date("Y-m-d H:i:s");
        $this->role = "ROLE_USER";
        $this->imageName =  null;
        $this->listeVisiteur =  new ArrayCollection();
        $this->userForum = new ForumUser($this);
        $this->status = "inconnu";
        $this->enabled = true;
        $this->nbVisite = 1;

        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    function __construct1(string $role)
    {



        $this->role = $role;
        $this->roles = [$role, "ROLE_USER"];
        $this->addRole("ROLE_USER");
    }



    public function getRoles()
    {
        //['ROLE_ADMIN','ROLE_MODERATOR']
        echo $this->getRole();
        //        die;
        return [$this->getRole()];


        // return ['ROLE_ADMIN'];
    }

    public function getSalt()
    {
    }


    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;

        $this->addRole($role);
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "id :" . $this->getId() . " Name" . $this->getUsername();
    }

    /**
     * Set dateInscrip.
     *
     * @param \DateTime $dateInscrip
     *
     * @return User
     */
    public function setDateInscrip($dateInscrip)
    {
        $this->dateInscrip = $dateInscrip;

        return $this;
    }

    /**
     * Get dateInscrip.
     *
     * @return \DateTime
     */
    public function getDateInscrip()
    {
        return $this->dateInscrip;
    }

    /**
     * Get role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }



    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }









    /**
     * ########################################################################""
     * ##################################################################""""""""""
     */


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     *
     * @var string
     */
    protected  $imageName;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var integer
     */
    protected  $imageSize;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     * @throws \Exception
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }



    /*************************************
     * ###########################################################################################
     */





    /**
     * Set updatedAt.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set userForum.
     *
     * @param \AppBundle\Entity\ForumUser|null $userForum
     *
     * @return User
     */
    public function setUserForum(\AppBundle\Entity\ForumUser $userForum = null)
    {

        $this->userForum = $userForum;
        $userForum->setUserManager($this);
        return $this;
    }

    /**
     * Get userForum.
     *
     * @return \AppBundle\Entity\ForumUser|null
     */
    public function getUserForum()
    {
        return $this->userForum;
    }


    /**
     * Get banned.
     *
     * @return bool|null
     */
    public function isBanned()
    {
        return $this->userForum->getBanned();
        //  return !$this->isEnabled();
    }

    public function getAvatarUrl()
    {
        // TODO: Implement getAvatarUrl() method.
        return $this->userForum->getAvatarUrl();
    }

    public function getNbPost()
    {
        // TODO: Implement getNbPost() method.
        return $this->userForum->getNbPost();
    }

    public function setAvatarUrl($avatar_url)
    {
        // TODO: Implement setAvatarUrl() method.
        return $this->userForum->setAvatarUrl($avatar_url);
    }

    public function setNbPost($nbPost)
    {
        // TODO: Implement setNbPost() method.
        return $this->userForum->setNbPost($nbPost);
    }

    public function addNbPost($nb)
    {
        // TODO: Implement addNbPost() method.
        return $this->userForum->addNbPost($nb);
    }

    public function getEmailAddress()
    {
        // TODO: Implement getEmailAddress() method.
        return $this->getEmail();
    }

    public function getLastReplyDate()
    {
        return $this->userForum->getLastReplyDate();
    }

    /**
     * @param bool $banned
     *
     *
     */
    public function setBanned($banned)
    {
        $this->userForum->setBanned($banned);
    }

    /**
     * @param \DateTime $lastReplyDate
     *
     *
     */
    public function setLastReplyDate($lastReplyDate)
    {
        $this->userForum->setLastReplyDate($lastReplyDate);
    }





    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus(String $sting)
    {
        $this->status = $sting;
    }







    /**
     * @return int
     */
    public function getNbVisite(): int
    {
        return $this->nbVisite;
    }

    public function newVisite(User $idvis): int
    {


        if ($this->getId() != $idvis->getId() && $this->listeVisiteur != false) {
            if (!$this->listeVisiteur->contains($idvis->getId())) {
                $this->nbVisite += 1;
                $this->listeVisiteur->add($idvis->getId());
            }
        }
        return $this->nbVisite;
    }
    /**
     * @param int $nbVisite
     */
    function setNbVisite(int $nbVisite): void
    {
        $this->nbVisite = $nbVisite;
    }


    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}
