<?php

namespace scoutsys\Http\Controllers;

use scoutsys\Services\UserService;
use scoutsys\Validators\UserValidator;
use scoutsys\Interfaces\UserRepository;
use scoutsys\Interfaces\ProfileRepository;
use scoutsys\Http\Requests\UserCreateRequest;
use scoutsys\Http\Requests\UserUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends Controller
{
    protected $repository;

    protected $validator;

    private $profileRepository;

    protected $userService;

    public function __construct(UserRepository $repository, UserValidator $validator, ProfileRepository $profileRepository, UserService $userService)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->profileRepository = $profileRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->repository->all();
        $profiles = $this->profileRepository->pluck('name', 'id');

        return view('users.index', compact(['users', 'profiles']));
    }

    public function create()
    {
        $profiles = $this->profileRepository->pluck('name', 'id');

        return view('users.create', compact('profiles'));
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->all();

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
        $profiles = $this->profileRepository->pluck('name', 'id');

        return view('users.edit', compact(['user', 'profiles']));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();

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
