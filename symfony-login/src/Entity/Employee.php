<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=25)
     */
    private $first_name;

    /**
     * @ORM\Column(type="text", length=25)
     */
    private $last_name; 

    /**
     * @ORM\Column(type="text")
     */
    private $address;

        // getters and setters(encapsulation)
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(){
        return $this->first_name;
    }
    public function setFirstname($firstName){
        $this->first_name = $firstName;
    }

    public function getLastname(){
        return $this->last_name;
    }
    public function setLastname($lastName){
        $this->last_name = $lastName;
    }

    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address){
        $this->address = $address;
    }
}
