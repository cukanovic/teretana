<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainerRequest;
use App\Trainer;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::withCount('trainings')->get();

        return view('admin.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainers.create', [
            'trainer' => new Trainer(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\TrainerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TrainerRequest $request)
    {
        $trainer = Trainer::create($request->validated());

        return redirect()->route('admin.trainers.show', ['id' => $trainer])->with('success', 'Trener je uspešno kreiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Trainer $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        $trainer->load('trainings.bookings');

        return view('admin.trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Trainer $trainer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Trainer $trainer)
    {
        return view('admin.trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\TrainerRequest $request
     * @param \App\Trainer $trainer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TrainerRequest $request, Trainer $trainer)
    {
        $trainer->name = $request->get('name');
        $trainer->email = $request->get('email');
        if ($password = $request->get('password')) {
            $trainer->password = $password;
        }

        $trainer->save();

        return redirect()->route('admin.trainers.show', $trainer->id)->with('success', 'Izmene su sačuvane.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Trainer $trainer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Trainer $trainer)
    {
        if ($trainer->bookings()->count() > 0) {
            return redirect()->route('admin.trainers.show', $trainer->id)->with('error', 'Ne možeš izbrisati trenere koji imaju rezervacije.');
        }

        $trainer->delete();

        return redirect()->route('admin.trainers.index')->with('success', 'Trener uspešno izbrisan.');
    }
}
