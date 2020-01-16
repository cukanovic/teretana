<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Trainer;
use App\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::with('trainer')
                             ->withCount('bookings')
                             ->orderBy('name', 'asc')
                             ->get();

        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::all();

        return view('admin.trainings.create', [
            'training' => new Training(),
            'trainers' => $trainers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\TrainingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingRequest $request)
    {
        $training = Training::create($request->validated());
        
        return redirect()->route('admin.trainings.show', $training->id)->with('success', 'Trening je uspešno sačuvan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('admin.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $trainers = Trainer::all();

        return view('admin.trainings.edit', compact('training', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\TrainingRequest $request
     * @param  \App\Training $training
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingRequest $request, Training $training)
    {
        $training->update($request->validated());
        
        return redirect()->route('admin.trainings.show', $training->id)->with('success', 'Trening je izmenjen.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training $training
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Training $training)
    {
        if (!$training->canBeDeleted()) {
            return redirect()->route('admin.trainings.show', $training->id)->with('warning', 'Ne možete izbrisati rezervisane treninge.');
        }
        
        $training->delete();
        
        return redirect()->route('admin.trainings.index')->with('success', 'Trening je izbrisan.');
    }
}
