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
            $q->where('name', '=', 'attendant');
        })->paginate(10);

        return view('occupant.list', [
            'models'       => $data,
            'page_title'  => 'Daftar Penghuni',
            'addButtonText'  => 'Tambah Penghuni Baru',
            'base' => $this->baseView,
            'searchTarget' => 'OccupantController@search',
            'showTarget' => 'OccupantController@show',
            'destroyTarget' => 'OccupantController@destroy',
            'searchPlaceholder' => 'Cari nama penghuni',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data penghuni ini?',
            'headerTexts' => ['Nama', 'Nomor Kamar'],
            'tableCols' => ['name']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->baseView . '/form', [
            'page_title' => 'Form Assignment Penghuni',
            'model' => new User(),
            'users' => $this->getUsers(),
            'houses' => $this->getHouses(),
            'floors' => $this->getFloors(),
            'rooms' => $this->getRooms(),
            'action' => 'OccupantController@store',
            'method' => 'POST',
            'base' => $this->baseView,
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
        return redirect($this->baseView . '/' . $request->input('occupant'))
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
        $user = User::find($id);

        return view('occupant.form', [
            'model' => $user,
            'page_title' => 'Ubah Data Penghuni',
            'action' => 'OccupantController@update',
            'method' => 'PUT',
            'base' => $this->baseView,
            'users' => $this->getUsers(),
            'houses' => $this->getHouses(),
            'floors' => $this->getFloors(),
            'rooms' => $this->getRooms(),
        ]);
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

    public function getUsers() {
        $users = User::all();
        $usersArray = [];

        foreach ($users as $key => $value) {
            $usersArray[$value->id] = $value->name;
        }

        return $usersArray;
    }

    public function getHouses() {
        $houses = House::all();
        $housesArray = [];
        
        foreach ($houses as $key => $value) {
            $housesArray[$value->id] = $value->name;
        }

        return $housesArray;
    }

    public function getFloors() {
        $floorsArray = [1 => 1, 2 => 2, 3 => 3];

        return $floorsArray;
    }

    public function getRooms() {
        $roomsArray = [6 => 1, 7 => 2, 8 => 3];

        return $roomsArray;
    }
}
