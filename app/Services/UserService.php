<?php

namespace scoutsys\Services;

use scoutsys\Interfaces\UserRepository;
use scoutsys\Interfaces\StatusRepository;
use scoutsys\Interfaces\CategoryRepository;

class UserService
{
    private $userRepository;
    private $categoryRepository;
    private $statusRepository;

    public function __construct(UserRepository $userRepository, CategoryRepository $categoryRepository, StatusRepository $statusRepository)
    {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;
    }

    public function store(array $data)
    {
        $category = $this->categoryRepository->find($data['category_id']);  
        $status = $this->statusRepository->find($data['status_id']);               
        if (array_key_exists('password', $data)) {
            $data['password'] = '123456';
        } else {
            $password = ['password' => '123456'];
            $data = array_merge($data, $password);
        }
        $user = $this->userRepository->create($data);
        $user->categories()->sync($category);
        $user->statuses()->sync($status);                
    }

    public function update(array $data, $id)
    {
        // dd($data);
        $category = $this->categoryRepository->find($data['category_id']); 
        $status = $this->statusRepository->find($data['status_id']); 
        // dd($status);
        $user = $this->userRepository->update($data, $id);
        $user->categories()->sync($category);        
        $user->statuses()->sync($status);        
    }
}
