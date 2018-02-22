<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\DetailableCreateRequest;
use scoutsys\Http\Requests\DetailableUpdateRequest;
use scoutsys\Interfaces\DetailableRepository;
use scoutsys\Validators\DetailableValidator;

/**
 * Class DetailablesController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class DetailablesController extends Controller
{
    /**
     * @var DetailableRepository
     */
    protected $repository;

    /**
     * @var DetailableValidator
     */
    protected $validator;

    /**
     * DetailablesController constructor.
     *
     * @param DetailableRepository $repository
     * @param DetailableValidator $validator
     */
    public function __construct(DetailableRepository $repository, DetailableValidator $validator)
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
        $detailables = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $detailables,
            ]);
        }

        return view('detailables.index', compact('detailables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DetailableCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DetailableCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $detailable = $this->repository->create($request->all());

            $response = [
                'message' => 'Detailable created.',
                'data'    => $detailable->toArray(),
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
        $detailable = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $detailable,
            ]);
        }

        return view('detailables.show', compact('detailable'));
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
        $detailable = $this->repository->find($id);

        return view('detailables.edit', compact('detailable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DetailableUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DetailableUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $detailable = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Detailable updated.',
                'data'    => $detailable->toArray(),
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
                'message' => 'Detailable deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Detailable deleted.');
    }
}
