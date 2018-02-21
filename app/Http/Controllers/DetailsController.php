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

/**
 * Class DetailsController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class DetailsController extends Controller
{
    /**
     * @var DetailRepository
     */
    protected $repository;

    /**
     * @var DetailValidator
     */
    protected $validator;

    /**
     * DetailsController constructor.
     *
     * @param DetailRepository $repository
     * @param DetailValidator $validator
     */
    public function __construct(DetailRepository $repository, DetailValidator $validator)
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

        dd($details);

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
     * @param  DetailCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DetailCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $detail = $this->repository->create($request->all());

            $response = [
                'message' => 'Detail created.',
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
     * @param  DetailUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DetailUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $detail = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Detail updated.',
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
                'message' => 'Detail deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Detail deleted.');
    }
}
