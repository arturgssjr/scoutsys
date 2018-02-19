<?php

namespace scoutsys\Http\Controllers;

use Illuminate\Http\Request;

use scoutsys\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use scoutsys\Http\Requests\CoachCreateRequest;
use scoutsys\Http\Requests\CoachUpdateRequest;
use scoutsys\Interfaces\CoachRepository;
use scoutsys\Validators\CoachValidator;

/**
 * Class CoachesController.
 *
 * @package namespace scoutsys\Http\Controllers;
 */
class CoachesController extends Controller
{
    /**
     * @var CoachRepository
     */
    protected $repository;

    /**
     * @var CoachValidator
     */
    protected $validator;

    /**
     * CoachesController constructor.
     *
     * @param CoachRepository $repository
     * @param CoachValidator $validator
     */
    public function __construct(CoachRepository $repository, CoachValidator $validator)
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
        $coaches = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coaches,
            ]);
        }

        return view('coaches.index', compact('coaches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CoachCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CoachCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $coach = $this->repository->create($request->all());

            $response = [
                'message' => 'Coach created.',
                'data'    => $coach->toArray(),
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
        $coach = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coach,
            ]);
        }

        return view('coaches.show', compact('coach'));
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
        $coach = $this->repository->find($id);

        return view('coaches.edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CoachUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CoachUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $coach = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Coach updated.',
                'data'    => $coach->toArray(),
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
                'message' => 'Coach deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Coach deleted.');
    }
}
