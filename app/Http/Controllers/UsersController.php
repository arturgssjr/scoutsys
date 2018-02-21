<?php

namespace scoutsys\Http\Controllers;

use scoutsys\Services\UserService;
use scoutsys\Validators\UserValidator;
use scoutsys\Interfaces\UserRepository;
use scoutsys\Interfaces\StatusRepository;
use scoutsys\Interfaces\CategoryRepository;
use scoutsys\Http\Requests\UserCreateRequest;
use scoutsys\Http\Requests\UserUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends Controller
{
    protected $repository;
    protected $categoryRepository;
    protected $statusRepository;
    protected $validator;
    protected $userService;

    public function __construct(UserRepository $repository, UserValidator $validator, UserService $userService, CategoryRepository $categoryRepository, StatusRepository $statusRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;
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
        $categories = $this->categoryRepository->pluck('description', 'id');
        $status = $this->statusRepository->pluck('description', 'id');
        
        return view('users.create', compact('categories', 'status'));
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
        $categories = $this->categoryRepository->pluck('description', 'id');
        $status = $this->statusRepository->pluck('description', 'id');                

        return view('users.edit', compact('user', 'categories', 'status'));
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
