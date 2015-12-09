<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Base;
use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Redirect;
use Session;
use Input;

class UserController extends Controller
{
  private $baseView = 'user';

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
        $data = User::paginate(10);

        return view('commons.list', [
            'models'       => $data,
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
     * @return Response
     */
    public function create()
    {
      return view('administrator/user/form', [
        'mode'        => 'create',
        'page_title'  => 'Form Penambahan Pengguna'
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'nip' => 'required|max:8|unique:users,registration_number',
          'nama' => 'required',
          'email' => 'required|unique:users,email',
      ]);

      $password = "default";

      $user = User::create([
        'registration_number' => $request->input('nip'),
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => bcrypt($password),
        'entry_year' => $request->input('entry_year'),
      ]);

      Session::flash('message', "Berhasil membuat data administrator baru");
      return redirect('user/'. $user->id);
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
     * @return Response
     */
    public function edit($id)
    {
        $is_admin = Base::getUserRole() !== ROLE_STUDENTS;
        $user = User::find($id);
        if (!$is_admin) {
            return view('administrator/student/form', [
                'model'        => $user,
                'role'        => Base::getUserRole(),
                'page_title'  => 'Form Pengubahan Profil Mahasiswa',
                'is_admin'  => $is_admin,
                'mode'		=> 'update'
            ]);
        } else {
            return view('administrator/user/form', [
                'user'        => $user,
                'role'        => Base::getUserRole(),
                'mode'        => 'update',
                'model'       => $user,
                'is_admin'  => $is_admin,
                'page_title'  => 'Ubah Data Pengguna'
            ]);
        }      
    }
    
    public function editAction(Request $request, $id) {
        $student = Student::find($id);
        $student->update([
            'nama'          => $request->input('nama'),
            'jalur_pilihan' => $request->input('jalur_pilihan'),
            'alamat_bdg'    => $request->input('alamat_bdg'),
            'kodepos_bdg'   => $request->input('kodepos_bdg'),
            'telp'          => $request->input('telepon'),
            'ext'           => $request->input('ext'),
            'email'         => $request->input('email'),
            'alamat_tetap'  => $request->input('alamat_tetap'),
            'kodepos_tetap' => $request->input('kodepos_tetap'),
        ]);
        
        return redirect('user/'. $id . '/edit');
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
      // Select the user
      $user = User::find($id);

      // Set proper/updated values
      if ($request->input('nama') != null) {
        $user->name = $request->input('nama');
      }

      if ($request->input('email') != null) {
        $user->email = $request->input('email');
      }

      if ($request->input('entry_year') != null) {
        $user->entry_year = $request->input('entry_year');
      }

      // Set photo if exists
      if ($request->hasFile('photo_')) {
        // Upload the file
        $user->prof_pic = Base::uploadProfPic(
          $user->registration_number,
          $_FILES['photo_']['name'],
          $request->file('photo_')
        );
      }

      // Save user updated data
      $user->save();

      return Redirect::back()->with('message','Berhasil mengubah data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      RoleUser::where('user_id', '=', $id)->delete();
      User::findOrFail($id)->delete();

      return $this->index();
    }

    public function removeRole($userId, $roleId)
    {
      RoleUser::where('user_id', '=', $userId)
        ->where('role_id', '=', $roleId)
        ->delete();

      return $this->edit($userId);
    }

    /**
     * Search users by name or email
     */
    public function search(Request $request) {
      return view('administrator/user/list', [
        'users' => User::orWhere("name", "like", "%".$request->input('query')."%")
          ->orWhere("email", "like", "%".$request->input('query')."%")
          ->paginate(10),
        'page_title' => 'Daftar Pengguna SIMTU'
      ]);
    }
}
