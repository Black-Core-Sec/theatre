<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Validator;
use App\Models\Performance;
use Illuminate\Http\Request;
use App\Rules\NotBetweenPerformanceDates;
use App\Http\Resources\PerformanceResource;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Performance::latest()->get();
        return response()->json([PerformanceResource::collection($data)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return response()->json('Only api used.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','string','max:255'],
            'start_date' => [
                'required',
                'date',
                'date_format:d-m-Y',
                new NotBetweenPerformanceDates
            ],
            'end_date' => [
                'required',
                'date',
                'date_format:d-m-Y',
                'after_or_equal:start_date',
                new NotBetweenPerformanceDates
            ]
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        try {
            $performance = Performance::create([
                'name' => $request->name,
                'start_date' => Carbon::parse($request->start_date),
                'end_date' => Carbon::parse($request->end_date)
            ]);
        } catch (\Exception $exception) {
            return response()->json('Error while saving.', 500);
        }

        return response()->json(['Performance created successfully.', new PerformanceResource($performance)]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $program = Performance::find($id);
        if (is_null($program)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new PerformanceResource($program)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Performance $performance)
    {
        return response()->json('Not available.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Performance $performance)
    {
        return response()->json('Not available.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Performance  $performance
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Performance $performance)
    {
        $performance->delete();

        return response()->json('Performance deleted successfully');
    }
}
