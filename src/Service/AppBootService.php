<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppBootService
{
    private $entityManager;
    private $userRepository;
    private $passwordHasher;

    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function createFirtUser(): void
    {
        $email = 'kaissanesaidahmed@gmail.com';
        $user = $this->userRepository->findOneBy(['email' => $email]);
        
        if (!$user) {
            $user = new User();

            $user
                ->setFirstname('Ayane')
                ->setLastname('HADJI')
                ->setEmail($email)
                ->setPassword(
                    $this->passwordHasher->hashPassword(
                        $user, 'admin'
                    )
                )
            ;

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }
    }
}