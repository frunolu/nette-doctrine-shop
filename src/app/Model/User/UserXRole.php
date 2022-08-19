<?php

namespace App\Model\Entity;


use App\Model\Entity\Role;
use App\Model\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Model\Repository\CategoryXProductRepository;

/**
 * Class UserXRole
 *
 * @ORM\Entity(repositoryClass="App\Model\Repository\CategoryXProductRepository")
 * @ORM\Table(name="user_x_role")
 * @package App\Model\Entity
 */
class UserXRole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(referencedColumnName="id", name="user_id")
     */
    private $user;

    /**
     * @var Role
     *
     * @ORM\ManyToOne(targetEntity=Role::class)
     * @ORM\JoinColumn(referencedColumnName="id", name="role_id")
     */
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return \App\Model\Entity\User
     */
    public function getUser(): \App\Model\Entity\User
    {
        return $this->user;
    }

    /**
     * @param \App\Model\Entity\User $user
     */
    public function setUser(\App\Model\Entity\User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return \App\Model\Entity\Role
     */
    public function getRole(): \App\Model\Entity\Role
    {
        return $this->role;
    }

    /**
     * @param \App\Model\Entity\Role $role
     */
    public function setRole(\App\Model\Entity\Role $role): void
    {
        $this->role = $role;
    }

}
