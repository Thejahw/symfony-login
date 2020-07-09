<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\User;
use Symfony\Flex\Response;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends AbstractFOSRestController
{
    // /**
    //  * @Route("/login", name="login")
    //  */
    // public function login()
    // {
    //     return [
    //         'message' => 'Welcome to your new controller!',
    //         'path' => 'src/Controller/LoginController.php',
    //     ];
    // }

    /**
     * @Rest\Post("/login")
     */
    public function login(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // $programmer = new Programmer($data['nickname'], $data['avatarNumber']);
        // $programmer->setTagLine($data['tagLine']);

        return $data['username'];
    }



    /**
     * @Rest\Get("/employee/{id}")
     */
    public function getEmployee($id)
    {
        $employee = $this->getDoctrine()->getRepository
        (Employee::class)->find($id);
         
        return $employee;
    }

    /**
     * @Route("/save")
     */
    public function postEmployee()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $employee = new Employee();
        $employee->setFirstname('Shan');
        $employee->setLastname('Wagner');
        $employee->setAddress('No:54,river avenue,petersburg');

        $entityManager->persist($employee);
        $entityManager->flush();

        return new Response('saves an employee with the id of '.$employee->getId());

    }

    /**
     * @Route("/saveuser")
     */
    public function postUser()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername('DavidPeter');
        $user->setPassword('DavidPassword');
        $user->setEmpId(1);

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('saves a user with the id of '.$user->getId());

    }
}
