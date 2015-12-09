<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\House,
    App\Models\Floor,
    App\Models\Room;

class HouseController extends Controller
{
    private $baseView = 'house';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = House::paginate(10);

        return view('commons.list', [
            'models'       => $data,
            'page_title'  => 'Daftar Rumah Kos',
            'addButtonText'  => 'Tambah Pengguna Baru',
            'base' => $this->baseView,
            'searchTarget' => 'HouseController@search',
            'showTarget' => 'HouseController@show',
            'destroyTarget' => 'HouseController@destroy',
            'searchPlaceholder' => 'Cari nama rumah',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data rumah ini?',
            'headerTexts' => ['Nama Rumah', 'Alamat'],
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
        return view($this->baseView . '.form', [
            'page_title'  => 'Form Pembuatan Rumah Kos',
            'mode' => 'new'
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
        $house = House::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'floors_total' => $request->input('floors_total'),
        ]);

        for ($i = 0; $i < $request->input('floors_total'); $i++) {
            $floor = Floor::create([
                'rooms_total' => sizeof($request->input('room[' + $i + ']')),
                'house_id' => $house->id
            ]);

            foreach ($request->input('room') as $key => $value) {
                Room::create([
                    'number' => $value,
                    'floor_id' => $floor->id
                ]);
            }
        }

        return redirect()->action('HouseController@show', [$house->id])->with('message', 'Berhasil membuat data rumah');
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
            'model' => House::find($id),
            'page_title' => 'Detil Data Rumah',
            'headerDisplay' => 'name',
            'base' => $this->baseView,
            'destroyTarget' => 'HouseController@destroy',
            'displayCols' => [
                'name' => 'Nama Rumah',
                'address' => 'Alamat'
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
        return view($this->baseView . '.form', [
            'page_title'  => 'Form Pembuatan Rumah Kos',
            'mode' => 'new',
            'model' => House::find($id),
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
        return redirect()->action('HouseController@index')->with('success', 'Berhasil menghapus data rumah');
    }
}
