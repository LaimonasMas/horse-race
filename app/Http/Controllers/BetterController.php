<?php

namespace App\Http\Controllers;

use App\Models\Better;
use Illuminate\Http\Request;
use App\Models\Horse;


class BetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $horses = Horse::orderBy('name')->get();
        $betters = Better::orderBy('name')->get();
        if ($request->horse_id) {
            $betters = Better::where('horse_id', $request->horse_id)->get();
            $filterBy = $request->horse_id;
        }
        else {
            $betters = Better::orderBy('bet', 'desc')->get();
        }

        return view('better.index', [
            'betters' => $betters,
            'horses' => $horses,
            'filterBy' => $filterBy ?? 0,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = Horse::orderBy('name')->get();
        return view('better.create', ['horses' => $horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $better = new Better;
        $better->name = $request->better_name;
        $better->surname = $request->better_surname;
        $better->bet = $request->better_bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('better.index')->with('success_message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {
        $horses = Horse::orderBy('name')->get();
        return view('better.edit', ['better' => $better, 'horses' => $horses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $better->name = $request->better_name;
        $better->surname = $request->better_surname;
        $better->bet = $request->better_bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('better.index')->with('success_message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
        $better->delete();
        return redirect()->route('better.index')->with('success_message', 'Deleted successfully!');
    }
}
