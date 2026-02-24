<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class RegisStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.studentregis');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'full_name' => 'required|string|max:100',
        'nis'       => 'required|numeric|digits_between:5,20|unique:students,nis',
        'email'     => 'required|email|unique:students,email',
        'password'  => 'required|min:6',
        'phone_number'     => 'required|numeric',
        'class'     => 'required|string|max:50',
        'major'   => 'required|string|max:50',
    ], [
        'full_name.required' => 'Nama lengkap wajib diisi',
        'nis.required'       => 'NIS wajib diisi',
        'email.required'     => 'Email wajib diisi',
        'password.required'  => 'Password wajib diisi',
        'phone_number.required'     => 'Nomor telepon wajib diisi',
        'class.required'     => 'Kelas wajib diisi',
        'major.required'   => 'Jurusan wajib diisi',
    ]);

    //enkripsi password
    $data['password'] = bcrypt($data['password']);

    Student::create($data);

    return redirect('/student/login');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
