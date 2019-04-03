<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ThemeRepository;
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
     * @Route("/theme_visu/{id}", name="theme_visu")
     */
    public function themeShow()
    {
      return $this->render('home/theme.html.twig');
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
