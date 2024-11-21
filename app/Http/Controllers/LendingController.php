<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index()
    {
        // Az összes felhasználó lekérése
        // Lekér minden adatot a users táblából és visszaadja JSON formátumban.
        return Lending::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Új felhasználót hoz létre az users táblában a kliens által megadott adatok alapján.
        $record = new Lending();

        //Az űrlapról vagy API-kérésből érkező összes adatot kinyeri.
        //Csak azok a mezők kerülnek kitöltésre, amelyeket a $fillable tulajdonság engedélyezett a User modellben
        $record->fill($request->all()); 

        //Az adatokat elmenti az adatbázisban
        $record->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id,$copy_id,$start)
    {
         //A fenti show metódus egy Laravel controllerben 
         //egy adott Lending (kölcsönzés) rekordot keres a user_id, copy_id és start mezők alapján, majd visszaadja az első (vagy a megfelelő) találatot.
          $lending = Lending::where('user_id', $user_id)
          ->where('copy_id', $copy_id)
          ->where('start', $start)
          ->get();
          return $lending[0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$user_id,$copy_id,$start)  
    {
        //egy meglévő rekord frissítése a kapott Request adatai alapján

        $record = $this->show($user_id, $copy_id, $start);
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id,$copy_id,$start) 
    {
        //törölje a megfelelő rekordot az adatbázisból a megadott $user_id, $copy_id, és $start paraméterek alapján.
        $this->show($user_id, $copy_id, $start)->delete();
    }
}
