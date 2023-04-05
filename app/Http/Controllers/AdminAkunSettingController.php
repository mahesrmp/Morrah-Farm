<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Models\AdminAkunSetting;

class AdminAkunSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::whereHas('roles', function ($query) {
        //     $query->where('name', 'admin');
        // })->get();
            $data = User::all();
        return view('manager.account_setting', [
            'title' => 'Edit Account'
        ], compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminAkunSetting  $adminAkunSetting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = User::find($role);
        // return view('manager.account_setting', [
        //     'title' => 'Edit Account'
        // ], compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAkunSetting  $adminAkunSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminAkunSetting  $adminAkunSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('users.edit', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminAkunSetting  $adminAkunSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
