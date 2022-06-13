<?php

namespace App\Service;

use App\Entity\Role;
use App\Repository\RoleRepository;

class RoleService {
    public function __construct(private RoleRepository $roleRepository) {}

    public function getRole(): Role {
        $roles = $this->roleRepository->findAll();
        return $roles[array($roles)];
    }
}