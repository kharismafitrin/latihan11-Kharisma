<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchUser(Request $request)
    {
        $name = $request->query('name');
        $email = $request->query('email');
        return response()->json([
            'name' => $name,
            'email' => $email,
            'detail_alamat' => [
                [
                    "nomor" => 1,
                    "Kota" => "Tangsel",
                    "Provinsi" => "Banten",
                    "Negara" => "Indonesia"
                ],
                [
                    "nomor" => 2,
                    "Kota" => "Bandung Barat",
                    "Provinsi" => "Jawa Barat",
                    "Negara" => "Indonesia"
                ]
            ]
        ]);
    }

    public function findUser($id)
    {
        return "User {$id} has logged";
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
