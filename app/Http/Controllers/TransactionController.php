<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;

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
        $data = [];

        for ($i = 1; $i < 13; $i++) {
            $data[$i] = Transaction::whereMonth('tx_date', '=', $i)->get();
        }
        
        return view('transaction.list', [
            'models'       => null,
            'page_title'  => 'Daftar Transaksi',
            'addButtonText'  => 'Tambah Pengguna Baru',
            'base' => $this->baseView,
            'data' => $data,
            'searchTarget' => 'TransactionController@search',
            'showTarget' => 'TransactionController@show',
            'destroyTarget' => 'TransactionController@destroy',
            'searchPlaceholder' => 'Cari nama pengguna',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data pengguna ini?',
            'headerTexts' => ['Nama', 'Alamat'],
            'tableCols' => ['name', 'address'],
            'months' => $this->getMonthsArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersDb = User::all();

        $users = [];

        foreach ($usersDb as $key => $value) {
            $users[$value->id] = $value->name;
        }

        return view('transaction.form', [
            'model' => new Transaction(),
            'page_title'  => 'Transaksi Baru',
            'action'  => 'TransactionController@store',
            'addButtonText'  => 'Tambah Pengguna Baru',
            'method'  => 'POST',
            'base' => $this->baseView,
            'searchTarget' => 'TransactionController@search',
            'showTarget' => 'UserController@show',
            'destroyTarget' => 'TransactionController@destroy',
            'searchPlaceholder' => 'Cari nama pengguna',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data pengguna ini?',
            'headerTexts' => ['Nama', 'Alamat'],
            'tableCols' => ['name', 'address'],
            'users' => $users,
            'months' => $this->getMonthsArray()
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
            'name' => 'required',
            'nominal' => 'required',
            'sender' => 'required',
            'receiver' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $data = Transaction::create([
            'name' => $request->input('name'),
            'tx_date' => date('Y-m-d'),
            'nominal' => $request->input('nominal'),
            'sender_id' => $request->input('sender'),
            'receiver_id' => $request->input('receiver'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'status' => 'paid',
            'description' => $request->input('description'),
        ]);

        // Finish, redirect
        return redirect("transaction/$data->id")
          ->with('message', 'Berhasil membuat transaksi baru');
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
              'model' => Transaction::find($id),
              'page_title' => 'Detil Data Transaksi',
              'headerDisplay' => 'name',
              'base' => $this->baseView,
              'destroyTarget' => 'TransactionController@destroy',
              'displayCols' => [
                  'name' => 'Nama Pengguna',
                  'sender' => 'Telah Terima Dari',
                  'receiver' => 'Diterima Oleh',
                  'nominal' => 'Nominal',
                  'description' => 'Deskripsi'
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

    private function getMonthsArray() {
        return [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember",
        ];
    }
}
