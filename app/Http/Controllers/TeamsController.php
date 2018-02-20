<?php

namespace scoutsys\Http\Controllers;

use scoutsys\Validators\TeamValidator;
use scoutsys\Interfaces\TeamRepository;
use scoutsys\Http\Requests\TeamCreateRequest;
use scoutsys\Http\Requests\TeamUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class TeamsController extends Controller
{
    protected $teamRepository;
    protected $teamValidator;

    public function __construct(TeamRepository $teamRepository, TeamValidator $teamValidator)
    {
        $this->teamRepository = $teamRepository;
        $this->teamValidator  = $teamValidator;
    }

    public function index()
    {
        $teams = $this->teamRepository->all();

        return view('teams.index', compact('teams'));
    }

    public function store(TeamCreateRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        try {
            $this->teamRepository->create($data);
        } catch (ValidatorException $e) {
            throw $e->getMessage();
        }

        return redirect()->route('team.index');
    }

    public function create()
    {
        $categories = \scoutsys\Models\Category::all()->pluck('description', 'id');
        
        return view('teams.create', compact('categories'));
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
        $data = $request->all();

        // dd($data);

        try {
            $this->teamRepository->update($data, $id);
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
