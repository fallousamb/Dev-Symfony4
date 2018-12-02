<?php
/**
 * Created by PhpStorm.
 * User: fallou
 * Date: 15/11/18
 * Time: 22:12
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils) {
        //get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        //last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $this->addFlash('success', "Vous êtes connectés en tant qu'administrateur");
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

}