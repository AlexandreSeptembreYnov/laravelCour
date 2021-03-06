<?php

namespace App\Http\Controllers;

use App\User;
use App\Skill;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function index()

    {
$skills = Skill::latest()->paginate(5);
        //$skills = Auth::user()->skills()->paginate(5);



        return view('dashboardAdmin.index',compact('skills'))
            ->with('i', (request()->input('page', 1) - 1)*5);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('dashboardAdmin.create');

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

            'name' => 'required',

            'description' => 'required',

        ]);



        //Skill::create($request->all());
        Skill::create(['name' => $request->name, 'description' => $request->description]);


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

        return view('dashboardAdmin.show',compact('skill'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Skill  $skill

     * @return \Illuminate\Http\Response

     */

    public function edit(Skill $skill)

    {

        return view('dashboardAdmin.edit',compact('skill'));

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

            'name' => 'required',

            'description' => 'required',

        ]);



        //Skill::create($request->all());
        Skill::create(['name' => $request->name, 'description' => $request->description]);




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
