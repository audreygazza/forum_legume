<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Discussion;
use App\Entity\Message;
use App\Entity\Theme;
use App\Entity\Commentaire;
use App\Repository\MessageRepository;
use App\Repository\ThemeRepository;
use App\Repository\DiscussionRepository;
use App\Repository\CommentaireRepository;
use Symfony\Component\Form\Extension\Core\Type\UserType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(ThemeRepository $repository,
                          Request $request,
                          EntityManagerInterface $manager,
                          UserPasswordEncoderInterface $encoder,
                          AuthenticationUtils $authenticationUtils)
    {
        $themes= $repository->findAll();

        //nécessaire pour la popul masquée register
        $user = new User();
        $form = $this->createFormBuilder($user)
          ->add('email', EmailType::class)
          ->add('password', PasswordType::class)
          ->add('pseudo', TextType::class)
          ->getForm();

        $form->handleRequest($request);

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($form->isSubmitted() && $form->isValid()) {
          $user->setRoles(['ROLE_USER']);

          $encoded = $encoder->encodePassword($user, $form['password']->getData());
          $user->setPassword($encoded);

          $manager->persist($user);
          $manager->flush();
          return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
          'themes'=> $themes,
          'register_form'=> $form->createView(),
          'last_username' => $lastUsername,
          'error' => $error
        ]);
    }

    /**
     * @return [type] [description]
     * @Route("/theme_visu/{slug}", name="theme_visu")
     */
    public function themeShow(Theme $theme, DiscussionRepository $repository)
    {
      $themeId = $theme-> getId();
      $discussions = $repository-> findByThemeId($themeId);
      return $this->render('home/discussions.html.twig', [
        'discussions'=>$discussions,
        'theme_slug'=>$theme->getSlug()
      ]);
    }

    /**
     * @return [type] [description]
     * @Route("/message_visu/{id}", name="message_visu")
     */
    public function messagesShow($id, MessageRepository $repository, Discussion $discussion)
    {
      $messages = $repository->findByDiscussionId($id);
      return $this->render('home/messages.html.twig', [
        'messages'=>$messages,
        'discussion_id'=>$id,
        'title'=>$discussion->getTitle(),
        'slug'=> $discussion->getTheme()->getSlug()
      ]);
    }

    /**
     * @return [type] [description]
     * @Route("/commentaire_visu/{id}", name="commentaire_visu")
     */
    public function commentaireShow($id, CommentaireRepository $repository, Message $message)
    {
      $commentaires = $repository->findByMessageId($id);
      return $this->render('home/commentaires.html.twig', [
        'commentaires'=>$commentaires,
        'message_id'=>$id,
        'content'=>$message->getContent()
      ]);
    }

    /**
    * @Route("/discussion/create/{slug}", name="discussion_create")
    */
    public function createDiscussion(
      $slug,
      Request $request,
      EntityManagerInterface $manager,
      ThemeRepository $repository
    ) {
      $theme = $repository->findOneBy([
        'slug'=> $slug
      ]);
      $discussion = new Discussion();
      $form = $this->createFormBuilder($discussion)
        ->add('title', TextType::class)
        ->getForm();
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $discussion->setTheme($theme);
        $manager->persist($discussion);
        $manager->flush();

        return $this->redirectToRoute('theme_visu', [
          'slug'=>$slug
        ]);
      }

      return $this->render('home/discussion_create.html.twig', [
        'form_create'=>$form->createView()
      ]);
    }

    /**
    * @Route("/message/create/{idDiscussion}", name="message_create")
    */
    public function createMessage(
      $idDiscussion,
      Request $request,
      EntityManagerInterface $manager,
      DiscussionRepository $repository
    ) {
      $discussion = $repository->find($idDiscussion);

      $message = new Message();
      $form = $this->createFormBuilder($message)
        ->add('content', TextareaType::class)
        ->getForm();
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $message->setTitle($discussion->getTitle())
          ->setUser($this->getUser())
          ->setDiscussion($discussion);
        $manager->persist($message);
        $manager->flush();

        return $this->redirectToRoute('message_visu', [
          'id'=>$idDiscussion
        ]);
      }

      return $this->render('home/message_create.html.twig', [
        'form_create'=>$form->createView()
      ]);
    }


    /**
    * @Route("/commentaire/create/{idMessage}", name="commentaire_create")
    */
    public function createCommentaire(
      $idMessage,
      Request $request,
      EntityManagerInterface $manager,
      MessageRepository $repository
    ) {
      dump($idMessage);
      $message = $repository->find($idMessage);
      dump($message);
      $commentaire = new Commentaire();
      $form = $this->createFormBuilder($commentaire)
        ->add('content', TextareaType::class)
        ->getForm();
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $commentaire->setUser($this->getUser())
          ->setMessage($message);
        $manager->persist($commentaire);
        $manager->flush();

        return $this->redirectToRoute('message_visu', [
          'id' => $commentaire->getMessage()->getDiscussion()->getId(),
          'slug'=> $commentaire->getMassage()->getDiscussion()->getSlug()
        ]);
      }

      return $this->render('home/commentaire_create.html.twig', [
        'form_create'=>$form->createView()
      ]);
    }

    /**
    * @Route("/register", name="register")
    */
    public function register(
      Request $request,
      EntityManagerInterface $manager,
      UserPasswordEncoderInterface $encoder
      ) {
      $user = new User();
      $form = $this->createFormBuilder($user)
        ->add('email', EmailType::class)
        ->add('password', PasswordType::class)
        ->add('pseudo', TextType::class)
        ->getForm();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $user->setRoles(['ROLE_USER']);

        $encoded = $encoder->encodePassword($user, $form['password']->getData());
        $user->setPassword($encoded);

        $manager->persist($user);
        $manager->flush();
        return $this->redirectToRoute('home');
      }

      return $this->render('home/register.html.twig', [
        'register_form'=> $form->createView()
      ]);
    }
}
