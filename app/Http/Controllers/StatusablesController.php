<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\StatusableCreateRequest;
use scoutsys\Http\Requests\StatusableUpdateRequest;
use scoutsys\Interfaces\StatusableRepository;
use scoutsys\Validators\StatusableValidator;

/**
 * Class StatusablesController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class StatusablesController extends Controller
{
    /**
     * @var StatusableRepository
     */
    protected $repository;

    /**
     * @var StatusableValidator
     */
    protected $validator;

    /**
     * StatusablesController constructor.
     *
     * @param StatusableRepository $repository
     * @param StatusableValidator $validator
     */
    public function __construct(StatusableRepository $repository, StatusableValidator $validator)
    {
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
        $statusables = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $statusables,
            ]);
        }

        return view('statusables.index', compact('statusables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StatusableCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StatusableCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $statusable = $this->repository->create($request->all());

            $response = [
                'message' => 'Statusable created.',
                'data'    => $statusable->toArray(),
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
        $statusable = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $statusable,
            ]);
        }

        return view('statusables.show', compact('statusable'));
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
        $statusable = $this->repository->find($id);

        return view('statusables.edit', compact('statusable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StatusableUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StatusableUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $statusable = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Statusable updated.',
                'data'    => $statusable->toArray(),
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
                'message' => 'Statusable deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Statusable deleted.');
    }
}
