<?php

namespace scoutsys\Services;

use scoutsys\Interfaces\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(array $data)
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = '123456';
        } else {
            $password = ['password' => '123456'];
            $data = array_merge($data, $password);
        }
        $user = $this->userRepository->create($data);
    }

    public function update(array $data, $id)
    {
        //dd($data['profile']);
        $user = $this->userRepository->update($data, $id);
    }
}
