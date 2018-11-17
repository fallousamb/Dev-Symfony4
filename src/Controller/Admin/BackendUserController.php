<?php
namespace App\Controller\Admin;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class BackendUserController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * BackendUserController constructor.
     * @param UserRepository $repository
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserRepository $repository, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $this->repository = $repository;
        $this->manager = $manager;
        $this->encoder = $encoder;
    }

    /**
     * @Route("admin/user/create", name="admin.user.new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAdmin(Request $request) {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->encoder->encodePassword($user, $request->get('_password')));
            $this->manager->persist($user);
            $this->manager->flush();
            $this->addFlash('success', 'Administrateur crée avec success');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);

    }

}