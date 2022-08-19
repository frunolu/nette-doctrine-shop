<?php
declare(strict_types = 1);

namespace App\Model;
use App\Model\Repository\UserRepository;
use Nette\Security\IIdentity;
use Tracy\Debugger;

class Authenticator implements \Nette\Security\Authenticator
{


    private UserRepository $userRepository;
    private \Nette\Security\Passwords $passwords;

    public function __construct(
        UserRepository $userRepository,
        \Nette\Security\Passwords $passwords
    ) {
        $this->userRepository = $userRepository;
        $this->passwords = $passwords;
    }

    public function authenticate(string $username, string $password): IIdentity
    {
        // 1. podívej se do databáze, existuje záznam pro $username? Pokud ne, vyhoď výjimku.
        $user = $this->userRepository->findUserByUsername($username);
        Debugger::barDump($user);

        if ($user === null) {
            throw new \Nette\Security\AuthenticationException('User not found.');
        }

        // 2. zahashuj $password. Odpovídá zahashovanému záznamu v databázi? Pokud ne, vyhoď výjimku.
        if ($this->passwords->verify($password, $user->password) === false) {
            throw new \Nette\Security\AuthenticationException('Wrong password.');
        }

        // 3. pokud vše dopadlo dobře, vytvoř a vrať SimpleIdentity
        return new \Nette\Security\SimpleIdentity($user->id, $user->role, ['username' => $user->username]);
    }
}
