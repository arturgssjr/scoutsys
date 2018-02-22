<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\CategoryableCreateRequest;
use scoutsys\Http\Requests\CategoryableUpdateRequest;
use scoutsys\Interfaces\CategoryableRepository;
use scoutsys\Validators\CategoryableValidator;

/**
 * Class CategoryablesController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class CategoryablesController extends Controller
{
    /**
     * @var CategoryableRepository
     */
    protected $repository;

    /**
     * @var CategoryableValidator
     */
    protected $validator;

    /**
     * CategoryablesController constructor.
     *
     * @param CategoryableRepository $repository
     * @param CategoryableValidator $validator
     */
    public function __construct(CategoryableRepository $repository, CategoryableValidator $validator)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $categoryables = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryables,
            ]);
        }

        return view('categoryables.index', compact('categoryables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryableCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CategoryableCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $categoryable = $this->repository->create($request->all());

            $response = [
                'message' => 'Categoryable created.',
                'data'    => $categoryable->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryable = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryable,
            ]);
        }

        return view('categoryables.show', compact('categoryable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryable = $this->repository->find($id);

        return view('categoryables.edit', compact('categoryable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryableUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CategoryableUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categoryable = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Categoryable updated.',
                'data'    => $categoryable->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Categoryable deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Categoryable deleted.');
    }
}
