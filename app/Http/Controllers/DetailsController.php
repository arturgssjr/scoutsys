<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\DetailsCreateRequest;
use scoutsys\Http\Requests\DetailsUpdateRequest;
use scoutsys\Interfaces\DetailsRepository;
use scoutsys\Validators\DetailsValidator;

/**
 * Class DetailsController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class DetailsController extends Controller
{
    /**
     * @var DetailsRepository
     */
    protected $repository;

    /**
     * @var DetailsValidator
     */
    protected $validator;

    /**
     * DetailsController constructor.
     *
     * @param DetailsRepository $repository
     * @param DetailsValidator $validator
     */
    public function __construct(DetailsRepository $repository, DetailsValidator $validator)
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
        $details = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $details,
            ]);
        }

        return view('details.index', compact('details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DetailsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DetailsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $detail = $this->repository->create($request->all());

            $response = [
                'message' => 'Details created.',
                'data'    => $detail->toArray(),
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
        $detail = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $detail,
            ]);
        }

        return view('details.show', compact('detail'));
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
        $detail = $this->repository->find($id);

        return view('details.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DetailsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DetailsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $detail = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Details updated.',
                'data'    => $detail->toArray(),
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
                'message' => 'Details deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Details deleted.');
    }
}
