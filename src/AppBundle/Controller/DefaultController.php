<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Doctrine\ORM\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Exception\BaseException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;
use Yosimitso\WorkingForumBundle\Entity\Post;
use Yosimitso\WorkingForumBundle\Entity\PostReport;
use Yosimitso\WorkingForumBundle\Entity\PostVote;
use Yosimitso\WorkingForumBundle\Entity\Subscription;
use Yosimitso\WorkingForumBundle\Entity\Thread;

class DefaultController extends Controller
{

    /**
     * @var object $authorizationChecker Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     * //     */
    protected $authorizationChecker;

    /**
     * @return object Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getAuthorization()
    {
        if (null === $this->authorizationChecker) {
            $this->authorizationChecker = $this->get('security.authorization_checker');
        }

        return $this->authorizationChecker;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var User $user */
        $user = $this->getUser();
        return $this->redirectToRoute('easyadmin');
        
        
    }

 

/*
    private function my_encodePassword(User $user, UserPasswordEncoderInterface $encoder)
    {
//        $factory = $this->get('security.encoder_factory');
//        $encoder = $factory->getEncoder($user);
        $mdp = $user->getPassword();
        $password = $encoder->encodePassword($user, $mdp);
        $user->setPassword($password);
        return $user;
    }

 
*/


    /**
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @Route("/profile/show_prof/{id}", name="show_prof", requirements={"id"="\d+"})
     */

    public function show_profAction(int $id){
        $repUser = $this->getDoctrine()->getManager()->getRepository('AppBundle:User');
        if (!$user = $repUser->find($id)){
            $this->addFlash("ERROR","ERREUR : L'utilisateur n'existe pas.");
            return $this->redirectToRoute('homepage');
        }
       $user->newVisite($this->getUser());


        return $this->render('User/show_profile_user.html.twig', array('user'=>$user));
    }
    
 
}
