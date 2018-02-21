<?php

namespace scoutsys\Services;

use scoutsys\Interfaces\TeamRepository;
use scoutsys\Interfaces\StatusRepository;
use scoutsys\Interfaces\CategoryRepository;

class TeamService
{
    private $teamRepository;
    private $categoryRepository;
    private $statusRepository;

    public function __construct(TeamRepository $teamRepository, CategoryRepository $categoryRepository, StatusRepository $statusRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;
    }

    public function store(array $data)
    {
        // dd($data);
        $category = $this->categoryRepository->find($data['category_id']);
        $status = $this->statusRepository->find($data['status_id']); 
        // dd($category);
        $team = $this->teamRepository->create($data);
        $team->categories()->sync($category);
        $team->statuses()->sync($status); 
    }

    public function update(array $data, $id)
    {
        $category = $this->categoryRepository->find($data['category_id']);
        $status = $this->statusRepository->find($data['status_id']); 
        $team = $this->teamRepository->update($data, $id);
        $team->categories()->sync($category); 
        $team->statuses()->sync($status);        
    }
}
