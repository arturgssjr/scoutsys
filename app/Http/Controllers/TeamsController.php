<?php

namespace scoutsys\Http\Controllers;

use scoutsys\Services\TeamService;
use scoutsys\Validators\TeamValidator;
use scoutsys\Interfaces\TeamRepository;
use scoutsys\Interfaces\StatusRepository;
use scoutsys\Interfaces\CategoryRepository;
use scoutsys\Http\Requests\TeamCreateRequest;
use scoutsys\Http\Requests\TeamUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class TeamsController extends Controller
{
    protected $teamRepository;
    protected $categoryRepository;
    protected $statusRepository;
    protected $teamValidator;
    protected $teamService;

    public function __construct(TeamRepository $teamRepository, TeamValidator $teamValidator, TeamService $teamService, CategoryRepository $categoryRepository, StatusRepository $statusRepository)
    {
        $this->middleware('auth');
        $this->teamRepository = $teamRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;
        $this->teamValidator  = $teamValidator;
        $this->teamService  = $teamService;
    }

    public function index()
    {
        $teams = $this->teamRepository->all();

        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->pluck('description', 'id');
        $status = $this->statusRepository->pluck('description', 'id');
        return view('teams.create', compact('categories', 'status'));
    }

    public function store(TeamCreateRequest $request)
    {
        $data = $request->all();
        try {
            $this->teamService->store($data);
        } catch (ValidatorException $e) {
            throw $e->getMessage();
        }

        return redirect()->route('team.index');
    }

    public function show($id)
    {
        $team = $this->teamRepository->find($id);

        return view('teams.show', compact('team'));
    }

    public function edit($id)
    {
        $team = $this->teamRepository->find($id);
        $categories = $this->categoryRepository->pluck('description', 'id');
        $status = $this->statusRepository->pluck('description', 'id');        

        return view('teams.edit', compact('team', 'categories', 'status'));
    }

    public function update(TeamUpdateRequest $request, $id)
    {
        $data = $request->all();

        try {
            $this->teamService->update($data, $id);
        } catch (ValidatorException $e) {
            throw $e->getMessage();
        }

        return redirect()->route('team.index');
    }

    public function destroy($id)
    {
        $deleted = $this->teamRepository->delete($id);

        return redirect()->back()->with('message', 'Team deleted.');
    }
}
