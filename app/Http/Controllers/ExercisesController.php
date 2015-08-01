<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Redirect;

use App\Exercise;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExercisesController extends Controller
{
    protected $rules = [
        'name' => ['required','min:3'],
        'slug' => ['required','unique:exercises,slug','regex:/^\S+$/']
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $input = Input::all();
        //TODO Change when the system of users will be working
        $input['user_id'] = 1;

        Exercise::create($input);
        return Redirect::route('exercises.index')->with('message', 'Exercise created');
    }

    /**
     * Display the specified resource.
     *
     * @param  Exercise $exercise
     * @return Response
     */
    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Exercise $exercise
     * @return Response
     */
    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Exercise $exercise
     * @return Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        $this->validate($request, $this->rules);
        $input = array_except(Input::all(),'_method');
        $exercise->update($input);
        return Redirect::route('exercises.show', $exercise->slug)->with('message', 'Exercise updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Exercise $exercise
     * @return Response
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return Redirect::route('exercises.index')->with('message','Exercise deleted');
    }
}
