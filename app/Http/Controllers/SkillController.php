<?php

namespace App\Http\Controllers;

use App\User;
use App\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function index()

    {

        $skills = Auth::user()->skills;



        return view('dashboardUser.index',compact('skills'));
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('dashboardUser.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $request->validate([

            'nom' => 'required',

            'description' => 'required',

        ]);



        Skill::create($request->all());



        return redirect()->route('skill.index')

            ->with('success','skill created successfully.');

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Skill  $skill

     * @return \Illuminate\Http\Response

     */

    public function show(Skill $skill)

    {

        return view('dashboardUser.show',compact('skill'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Skill  $skill

     * @return \Illuminate\Http\Response

     */

    public function edit(Skill $skill)

    {

        return view('dashboardUser.edit',compact('skill'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\skill  $skill

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, skill $skill)

    {

        $request->validate([

            'nom' => 'required',

            'description' => 'required',

        ]);



        $skill->update($request->all());



        return redirect()->route('skill.index')

            ->with('success','skill updated successfully');

    }




    public function destroy(skill $skill)

    {

        $skill->delete();



        return redirect()->route('skill.index')

            ->with('success','skill deleted successfully');

    }

}
