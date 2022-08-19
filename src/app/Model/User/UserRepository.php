<?php

namespace App\Model\Repository;


use App\Model\Entity\User;
use Nette\Security\AuthenticationException;
use Nette\Security\Identity;
use Nette\Security\Passwords;
use Nette\Utils\ArrayHash;
use Nette\Utils\DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Tracy\Debugger;


class UserRepository
{
// TODO getUserByName, getByEmail, findByUserId, getByUserId


    private  $userRepository;

//    private function findBy(array $array)
//    {
//    }

    /**
     * Najde a vrátí uživatele podle jeho ID.
     * @param int|NULL $id ID uživatele
     * @return User|NULL vrátí entitu uživatele nebo NULL pokud uživatel nebyl nalezen
     */
    public function getUserById($id)
    {
        return isset($id) ? $this->em->find(User::class, $id) : NULL;
    }

    /**
     * Metoda pro načtení jednoho uživatele
     * @param int $id
     * @return \App\Model\Entity\User
     * @throws \Exception
     */
    public function getUser(int $id):User {
        return $this->userRepository->find($id);
    }

    public function findUserByUsername(string $username):User
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u');
        $qb->from('App\Model\Entity\User', 'u');
        $qb->andWhere('u.username = :username');
        $qb->setParameter('username', $username);
        Debugger::barDump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }
    /**
     * Metoda pro načtení jednoho uživatele podle e-mailu
     * @param string $email
     * @return \App\Model\Entity\User
     * @throws \Exception
     */
    public function getUserByEmail(string $email):User {
        return $this->userRepository->findBy(['email'=>$email]);
    }

    public function getUserByName($name)
    {

    }

}
