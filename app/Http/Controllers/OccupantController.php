<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User,
    App\Models\UserRooms,
    App\Models\House;

class OccupantController extends Controller
{
    private $baseView = 'occupant';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereHas('roles', function($q) {
            $q->where('name', 'occupant');
        })->paginate(10);
        echo sizeof($data);exit;
        return view('commons.list', [
            'models'       => $data,
            'page_title'  => 'Daftar Penghuni',
            'addButtonText'  => 'Tambah Penghuni Baru',
            'base' => $this->baseView,
            'searchTarget' => 'OccupantController@search',
            'showTarget' => 'OccupantController@show',
            'destroyTarget' => 'OccupantController@destroy',
            'searchPlaceholder' => 'Cari nama penghuni',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data penghuni ini?',
            'headerTexts' => ['Nama', 'Alamat'],
            'tableCols' => ['name', 'address']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $houses = House::all();
        $usersArray = [];
        $housesArray = [];
        $floorsArray = [1 => 1, 2 => 2, 3 => 3];
        $roomsArray = [6 => 1, 7 => 2, 8 => 3];

        foreach ($users as $key => $value) {
            $usersArray[$value->id] = $value->name;
        }

        foreach ($houses as $key => $value) {
            $housesArray[$value->id] = $value->name;
        }

        return view($this->baseView . '/form', [
            'page_title' => 'Form Assignment Penghuni',
            'model' => new User(),
            'users' => $usersArray,
            'houses' => $housesArray,
            'floors' => $floorsArray,
            'rooms' => $roomsArray,
            'action' => 'OccupantController@store',
            'method' => 'POST',
        ]);
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
          'occupant' => 'required',
          'room' => 'required',
        ]);

        $model = UserRooms::create([
            'user_id' => $request->input('occupant'),
            'room_id' => $request->input('room'),
        ]);

        // Finish, redirect
        return redirect($this->baseView . '/' . $model->id)
        ->with('message', 'Berhasil membuat data pengguna baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('commons.detail', [
            'model' => User::find($id),
            'page_title' => 'Detil Data Pengguna',
            'headerDisplay' => 'name',
            'base' => $this->baseView,
            'destroyTarget' => 'UserController@destroy',
            'displayCols' => [
                'name' => 'Nama Pengguna',
                'email' => 'Alamat Email',
                'address' => 'Alamat Rumah'
            ]
        ]);
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

    public function search() {

    }
}
