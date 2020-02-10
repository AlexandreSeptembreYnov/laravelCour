<?php

namespace App\Http\Controllers;

use App\SkillUser;
use App\User;
use App\Skill;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SkillUserController extends Controller
{

    public function index()

    {
        $skills = Auth::user()->skills()->paginate(5);



        return view('User.index',compact('skills'))
            ->with('i', (request()->input('page', 1) - 1)*5);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $skills = Skill::all();
        return view('User.create',compact('skills'));

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

            'skill_id' => 'required',

            'level' => 'required',

        ]);



        SkillUser::create(['skill_id' => $request->skill_id, 'user_id' => Auth::user()->id, 'level' => $request->level]);


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

        return view('User.show',compact('skill'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Skill  $skill

     * @return \Illuminate\Http\Response

     */

    public function edit(Skill $skill)

    {

        return view('User.edit',compact('skill'));

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

            'skill_id' => 'required',

            'level' => 'required',

        ]);



        SkillUser::update(['skill_id' => $request->skill_id, 'user_id' => $request->user_id, 'level' => $request->level]);


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
