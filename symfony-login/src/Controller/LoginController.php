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
        $user = $this->getDoctrine()->getRepository
        (User::class)->findOneBy(array('username'=>$data['username'],'password'=>md5($data['password'])));
        if($user){
            // $a=json_decode($user->getData(), true);
            return $user->getEmpId();
        }else{
            return null;
        }
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

        $employee2 = new Employee();
        $employee2->setFirstname('James');
        $employee2->setLastname('Potter');
        $employee2->setAddress('No:54,Godric hallows,petersburg');

        $employee1 = new Employee();
        $employee1->setFirstname('Sherlock');
        $employee1->setLastname('Holms');
        $employee1->setAddress('No:221B, Backers street, London');

        $entityManager->persist($employee);
        $entityManager->flush();

        $entityManager->persist($employee1);
        $entityManager->flush();

        $entityManager->persist($employee2);
        $entityManager->flush();
        return new Response('saves an employees with the id of '.$employee->getId()." " .$employee1->getId()." " .$employee2->getId());
    }

    /**
     * @Route("/saveuser")
     */
    public function postUser()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername('ShanWagner');
        $user->setPassword(md5('Pass123'));//password encrption with MD5 hashing
        $user->setEmpId(1);
        $entityManager->persist($user);
        $entityManager->flush();

        $user2 = new User();
        $user2->setUsername('JamesPotter');
        $user2->setPassword(md5('JamesPassword'));
        $user2->setEmpId(2);
        $entityManager->persist($user2);
        $entityManager->flush();

        $user3 = new User();
        $user3->setUsername('SherLock');
        $user3->setPassword(md5('sherLocked'));
        $user3->setEmpId(3);
        $entityManager->persist($user3);
        $entityManager->flush();

        return new Response('Databse successfully updates');
    }
}
