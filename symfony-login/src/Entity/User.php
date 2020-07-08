<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=10)
     */
    private $username; 

    /**
     * @ORM\Column(type="text", length=16)
     */
    private $password; 

    /**
     * @ORM\Column(type="integer")
     */
    private $emp_id; 

    public function getId(): ?int
    {
        return $this->id;
    }
}
