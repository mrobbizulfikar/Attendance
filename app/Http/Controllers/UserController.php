<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\User;
use App\Rayon;
use App\Rombel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Users = new User;        

        if($request->has('rayon_id')) {
            $Users = $Users->where('rayon_id', $request->rayon_id);
        }
        
        if($request->has('rombel_id')) {
            $Users = $Users->where('rombel_id', $request->rombel_id);
        }

        if($request->has('batch')) {
            $Users = $Users->where('batch', $request->batch);
        }

        $Users = $Users->get();

        if($request->ajax()) {
            return $Users;
        }

        return view('staff.student.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Rayons = Rayon::all();
        $Rombels = Rombel::all();
        return view('staff.student.create', compact('Rayons','Rombels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'dob' => 'required|date',
            'rayon_id' => 'required|exists:rayons,id',
            'rombel_id' => 'required|exists:rombels,id',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'dob' => Carbon::parse($request->dob),
            'rayon_id' => $request->rayon_id,
            'rombel_id' => $request->rombel_id,
            'password' => bcrypt($request->dob),
            'batch' => $request->batch,
            'nis' => $request->nis,
        ]);

        return redirect()->route('staff.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
