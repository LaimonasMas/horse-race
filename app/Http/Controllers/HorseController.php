<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horses = Horse::orderBy('name')->get();
        return view('horse.index', ['horses' => $horses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'horse_name' => ['required', 'regex:/^[\'a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s-]*$/', 'min:3', 'max:100'],
                'horse_runs' => ['required', 'numeric', 'min:1', 'max:9999'],
                'horse_wins' => ['required', 'numeric', 'lte:horse_runs', 'min:1', 'max:9999'],
                'horse_about' => ['required', 'regex:/^[\',.!?a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s\d-]*$/', 'min:3', 'max:500']
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $horse = new Horse;
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horse.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'horse_name' => ['required', 'regex:/^[\'a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s-]*$/', 'min:3', 'max:100'],
                'horse_runs' => ['required', 'numeric', 'min:1', 'max:9999'],
                'horse_wins' => ['required', 'numeric', 'lte:horse_runs', 'min:1', 'max:9999'],
                'horse_about' => ['required', 'regex:/^[\',.!?a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ\s\d-]*$/', 'min:3', 'max:500']
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if ($horse->horseBetters->count()) {
            return redirect()->route('horse.index')->with('info_message', 'Cannot delete this horse, because some betters has placed bets on it!');
        }
        $horse->delete();
        return redirect()->route('horse.index')->with('success_message', 'Deleted successfully!');
    }
}
