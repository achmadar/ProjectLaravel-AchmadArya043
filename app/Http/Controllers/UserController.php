<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'min:8' => ':attribute terlalu pendek',
            'unique' => ':attribute sudah ada di database'
        ];

        $validasi = Validator::make($request->all(), $rules, $message);

        if ($validasi->fails()) {

            return redirect()->route('users.create')->withErrors(
                $validasi->errors()
            )->withInput($request->all());

        } else {

            $insert = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $insert->sendEmailVerificationNotification();

            if ($insert) {
                return redirect()->route('users.index')->with('success', 'Berhasil menambah kategori.');
            } else {
                return redirect()->route('users.index')->with('error', 'Gagal menambah data kategori.');
            }
                            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['users'] = User::find($id);
        return view("users.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users'] = User::find($id);
        return view("users.edit", $data);
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
        $insert = User::where("id",$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($insert) {
            return redirect()->route('users.index')->with('success', 'Berhasil menambah kategori.');
        } else {
            return redirect()->route('users.index')->with('error', 'Gagal menambah data kategori.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where("id",$id)->delete();
        return redirect()->route("users.index");
    }

    public function profile($id)
    {
        $data['profile'] = User::find($id);
        return view("users.profile", $data);
    }

    public function update_profile(Request $request, $id)
    {
        $insert = User::where("id",$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($insert) {
            return redirect()->route('users.profile')->with('success', 'Berhasil menambah kategori.');
        } else {
            return redirect()->route('users.profile')->with('error', 'Gagal menambah data kategori.');
        }

    }


}
