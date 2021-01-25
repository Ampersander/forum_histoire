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
     * @Route("/forum", name="forum")
     */
    public function indexAction(Request $request)
    {
        /** @var User $user */
        $user = $this->getUser();

        if (is_null($user)) {
            return $this->indexWithoutLogin();
        } elseif ($user->getRoles() == ['ROLE_USER']) {
            return $this->redirectToRoute('forum');
        } elseif ($user->getRoles() == ['ROLE_ADMIN'])  {
            return $this->redirectToRoute('forum');
        } elseif ($this->getAuthorization()->isGranted('ROLE_SUPER_ADMIN') )return $this->redirectToRoute('easyadmin');
        else {
            return $this->indexWithoutLogin();
        }
        
    }

    private function indexWithoutLogin() {
        return $this->render('@App/Security/select_home.html.twig');
    }

/**
     * @Route("/registera",name="new_User")
     *
     */
    public function newUserStudant( Request $request, UserPasswordEncoderInterface $encoder){
        $Etu = new User("ROLE_USER");



        // Génération du formulaire
        $form = $this->createForm(UserType::class, $Etu);
        $form->add('submit', SubmitType::class, ['label' => "Créer le compte"]);

        // Validation et enregistrement de l'offre
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Etu = $form->getData();

            $this->my_encodePassword($Etu, $encoder);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Etu);
            $entityManager->flush();
            return $this->redirectToRoute('forum');
        }

        return $this->render('User/RegisterUser.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    private function my_encodePassword(User $user, UserPasswordEncoderInterface $encoder)
    {
//        $factory = $this->get('security.encoder_factory');
//        $encoder = $factory->getEncoder($user);
        $mdp = $user->getPassword();
        $password = $encoder->encodePassword($user, $mdp);
        $user->setPassword($password);
        return $user;
    }

 



    /**
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @Route("/profile/show_prof/{id}", name="show_prof", requirements={"id"="\d+"})
     */

    public function show_profAction(int $id){
        $repUser = $this->getDoctrine()->getManager()->getRepository('AppBundle:User');
        if (!$user = $repUser->find($id)){
            $this->addFlash("ERROR","ERREUR : L'utilisateur n'existe pas.");
            return $this->redirectToRoute('forum');
        }
       $user->newVisite($this->getUser());


        return $this->render('User/show_profile_user.html.twig', array('user'=>$user));
    }
    
  /**
     * @Route("/profile/allUser",name="All_User")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allUserAction()
    {

//        $repUser = $this->getDoctrine()->getManager()->getRepository('AppBundle:User');
        $userManager = $this->get('fos_user.user_manager');
        $repUser = $userManager->findUsers();

        $user=array();
  

        foreach ($repUser as $r){
            dump($r);
            try{
                if($r->getStatus() == "inconnu")
                    array_push($user,$r);
            }catch ( BaseException $e){

            }

        }

        return $this->render('User/allUser.html.twig', array('listeUser' => $user));

    }

    /**
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @Route("/profile/deleteUser/{id}", name="delete_user", requirements={"id"="\d+"})
     */
    public function deleteAction($id, Request $request)
    {
        $res = false;

        if (!$this->getAuthorization()->isGranted('ROLE_ADMIN')) {
            if ($this->getUser()->getId() != $id) throw $this->createNotFoundException('Vous n\'avez pas l\'autorisation d\'accéder à ce contenu.');
            $res = true;
        }

        $repUser = $this->getDoctrine()->getManager()->getRepository('AppBundle:User');


        if (!$user = $repUser->find($id))
            throw $this->createNotFoundException('Utilisateur[id=' . $id . '] inexistante');

        $name = $user->getUsername();
        $entityManager = $this->getDoctrine()->getManager();

        $userManager = $this->get('fos_user.user_manager');
        if (!$trach = $repUser->findOneByUsername('root'))
            throw $this->createNotFoundException('il faudra cree un simple utilisateur du nom root poure le trash');

        $repositoryPoste = $entityManager->getRepository(Post::class);
        $repositoryVote = $entityManager->getRepository(PostVote::class);
        $repositoryThread = $entityManager->getRepository(Thread::class);
        $repositoryworkingforum_subscription = $entityManager->getRepository(Subscription::class);
        $repositoryworkingforum_post_report = $entityManager->getRepository(PostReport::class);


        $listePoste = $repositoryPoste->findByUser($user);
        $listeVote = $repositoryVote->findByUser($user);
        $listeThread = $repositoryThread->findByAuthor($user->getId());
        $listeSubscription = $repositoryworkingforum_subscription->findByUser($user);
        $listePostReport = $repositoryworkingforum_post_report->findByUser($user);

        //workingforum_subscription
        //workingforum_post_report
        if (!empty($listeSubscription)) {

            foreach ($listeSubscription as $list) {
                $list->setUser($trach);

                $entityManager->persist($list);

            }
        }
        if (!empty($listePostReport)) {

            foreach ($listePostReport as $list) {
                $list->setUser($trach);

                $entityManager->persist($list);

            }
        }


        if (!empty($listeThread)) {

            foreach ($listeThread as $list) {
                $list->setAuthor($trach);
                $list->setLocked(1);
                $entityManager->persist($list);

            }
        }

        if (!empty($listePoste)) {

            foreach ($listePoste as $list) {
                $list->setUser($trach);
                $list->setUserId($trach);
                $entityManager->persist($list);

            }
        }


        if (!empty($listeVote)) {
            foreach ($listeVote as $list) {

                $list->setUser($trach);
                $entityManager->persist($list);
            }
        }


        $entityManager->flush();
        $userManager->deleteUser($user);


        if ($res or $this->getUser()->getId() == $id)
            // Si c'est un utilisateur lambda
            //return $this->render('profile/suppUser.html.twig', array('name' => $name));
            // VIDER LES VARIABLES DE SESSION
            return $this->redirectToRoute('homepage');
        else {
            // Si c'est un administrateur
            $this->addFlash('success', $name . ' est bien supprimé.');
            return $this->redirectToRoute('All_User');
        }
    }
}
