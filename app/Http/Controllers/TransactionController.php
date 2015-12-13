<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    private $baseView = 'transaction';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = User::paginate(10);

        return view('transaction.list', [
            'models'       => null,
            'page_title'  => 'Daftar Pengguna',
            'addButtonText'  => 'Tambah Pengguna Baru',
            'base' => $this->baseView,
            'searchTarget' => 'UserController@search',
            'showTarget' => 'UserController@show',
            'destroyTarget' => 'UserController@destroy',
            'searchPlaceholder' => 'Cari nama pengguna',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data pengguna ini?',
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
