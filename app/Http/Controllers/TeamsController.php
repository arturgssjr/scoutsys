<?php

namespace scoutsys\Http\Controllers;

use scoutsys\Validators\TeamValidator;
use scoutsys\Interfaces\TeamRepository;
use scoutsys\Interfaces\UserRepository;
use scoutsys\Http\Requests\TeamCreateRequest;
use scoutsys\Http\Requests\TeamUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class TeamsController extends Controller
{
    protected $teamRepository;
    protected $userRepository;
    protected $teamValidator;

    public function __construct(TeamRepository $teamRepository, TeamValidator $teamValidator, UserRepository $userRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->teamValidator  = $teamValidator;
        $this->userRepository  = $userRepository;
    }

    public function index()
    {
        $teams = $this->teamRepository->all();

        return view('teams.index', compact('teams'));
    }

    public function store(TeamCreateRequest $request)
    {
        dd($request->all());
    }

    public function create()
    {
        $users = $this->userRepository->all();
        
        return view('teams.create', compact('users'));
    }

    public function show($id)
    {
        $team = $this->teamRepository->find($id);

        return view('teams.show', compact('team'));
    }

    public function edit($id)
    {
        $team = $this->teamRepository->find($id);

        return view('teams.edit', compact('team'));
    }

    public function update(TeamUpdateRequest $request, $id)
    {
        try {
        } catch (ValidatorException $e) {
        }
    }

    public function destroy($id)
    {
        $deleted = $this->teamRepository->delete($id);

        return redirect()->back()->with('message', 'Team deleted.');
    }
}
