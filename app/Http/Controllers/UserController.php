<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Új felhasználót hoz létre az users táblában a kliens által megadott adatok alapján.
           $record = new User();

           //Az űrlapról vagy API-kérésből érkező összes adatot kinyeri.
           //Csak azok a mezők kerülnek kitöltésre, amelyeket a $fillable tulajdonság engedélyezett a User modellben
           $record->fill($request->all()); 
   
           //Az adatokat elmenti az adatbázisban
           $record->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = User::find($id);
        $record->fill($request->all());
        $record->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
    }
}
