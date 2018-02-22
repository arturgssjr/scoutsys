<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\StatusCreateRequest;
use scoutsys\Http\Requests\StatusUpdateRequest;
use scoutsys\Interfaces\StatusRepository;
use scoutsys\Validators\StatusValidator;

/**
 * Class StatusesController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class StatusesController extends Controller
{
    protected $repository;

    protected $validator;

    public function __construct(StatusRepository $repository, StatusValidator $validator)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $status = $this->repository->all();

        return view('status.index', compact('status'));
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(StatusCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $status = $this->repository->create($request->all());

            return redirect()->route('status.index');
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
        $status = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $status,
            ]);
        }

        return view('status.show', compact('status'));
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
        $status = $this->repository->find($id);

        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StatusUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StatusUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $status = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Status updated.',
                'data'    => $status->toArray(),
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
                'message' => 'Status deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Status deleted.');
    }
}
