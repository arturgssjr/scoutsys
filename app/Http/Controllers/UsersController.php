<?php

namespace scoutsys\Http\Controllers;

use scoutsys\Services\UserService;
use scoutsys\Validators\UserValidator;
use scoutsys\Interfaces\UserRepository;
use scoutsys\Http\Requests\UserCreateRequest;
use scoutsys\Http\Requests\UserUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends Controller
{
    protected $repository;

    protected $validator;

    protected $userService;

    public function __construct(UserRepository $repository, UserValidator $validator, UserService $userService)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->repository->all();

        // dd($users);

        return view('users.index', compact(['users']));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->all();

        // dd($data);

        try {
            $this->userService->store($data);
        } catch (ValidatorException $e) {
            throw $e->getMessage();
        }

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = $this->repository->find($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);

        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();

        // dd($data);

        try {
            $this->userService->update($data, $id);
        } catch (ValidatorException $e) {
            throw $e->getMessage();
        }

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return redirect()->route('user.index');
    }
}
