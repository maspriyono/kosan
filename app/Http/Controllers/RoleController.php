<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    private $baseView = 'role';
   /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
      $this->middleware('guest-checked');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Role::paginate(10);

        return view('commons.list', [
            'models'       => $data,
            'page_title'  => 'Daftar Peran',
            'addButtonText'  => 'Tambah Peran Baru',
            'base' => $this->baseView,
            'searchTarget' => 'RoleController@search',
            'showTarget' => 'RoleController@show',
            'destroyTarget' => 'RoleController@destroy',
            'searchPlaceholder' => 'Cari nama peran',
            'deleteMessage' => 'Apakah Anda yakin ingin menghapus data peran ini?',
            'headerTexts' => ['Nama'],
            'tableCols' => ['name']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      return view('administrator/role/form', ['mode' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      // Create new role
      $role = Role::create(['name' => $request->input('role')]);

      // Return to index view
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      return view('commons.detail', [
            'model' => Role::find($id),
            'page_title' => 'Detil Peran',
            'headerDisplay' => 'name',
            'base' => $this->baseView,
            'destroyTarget' => 'RoleController@destroy',
            'displayCols' => [
                'name' => 'Nama Peran',
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      return view('administrator/role/form', [
        'model' => Role::find($id),
        'mode' => 'update'
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $model = Role::find($id);
      $model->name = $request->input('role');
      $model->save();

      return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      Role::findOrFail($id)->delete();
      return $this->index();
    }
}
