<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Theme;
use App\Repository\MessageRepository;
use App\Repository\ThemeRepository;
use App\Repository\DiscussionRepository;
use Symfony\Component\Form\Extension\Core\Type\UserType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(ThemeRepository $repository)
    {
        $themes= $repository->findAll();
        return $this->render('home/index.html.twig', [
          'themes'=> $themes
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
      return $this->render('home/theme.html.twig', [
        'discussions'=>$discussions
      ]);
    }

    /**
     * @return [type] [description]
     * @Route("/message_visu/{id}", name="message_visu")
     */
    public function messagesShow($id, MessageRepository $repository)
    {
      $messages = $repository->findByDiscussionId($id);
      return $this->render('home/messages.html.twig', [
        'messages'=>$messages
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
