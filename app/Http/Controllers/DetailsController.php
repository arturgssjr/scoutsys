<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\DetailCreateRequest;
use scoutsys\Http\Requests\DetailUpdateRequest;
use scoutsys\Interfaces\DetailRepository;
use scoutsys\Validators\DetailValidator;

class DetailsController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(DetailRepository $repository, DetailValidator $validator)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $details = $this->repository->all();

        dd($details);

        return view('details.index', compact('details'));
    }

    public function create()
    {
        return view('details.create');
    }

    public function store(DetailCreateRequest $request)
    {
        try {
            $detail = $this->repository->create($request->all());

            return redirect()->route('details.index');
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                throw $e->getMessageBag();
            }

            return view('details.index');
        }
    }

    public function show($id)
    {
        $detail = $this->repository->find($id);

        return view('details.show', compact('detail'));
    }

    public function edit($id)
    {
        $detail = $this->repository->find($id);

        return view('details.edit', compact('detail'));
    }

    public function update(DetailUpdateRequest $request, $id)
    {
        try {
            $detail = $this->repository->update($request->all(), $id);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                throw $e->getMessageBag();
            }

            return redirect()->route('detail.index');
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return redirect()->route('detail.index');
    }
}
