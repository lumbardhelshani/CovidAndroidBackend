<?php

namespace App\Http\Controllers;

use App\WorldCases;
use Response;
use Illuminate\Http\Request;

class WorldCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {

        $WorldCase = WorldCases::where("date" , '=' , $r['date'])->first();
        if($WorldCase){
            //dd($WorldCase);
            $WorldCase->cases = $r['cases'];
        }else{
            $WorldCase = new WorldCases();


            $WorldCase->cases = $r['cases'];
    
            $WorldCase->date = $r['date'];
        }
        
        if($WorldCase->save()){
            return Response::json([
                'Code' => "201",
                'Message' => "Successfully Registered The Covid World Cases"
            ], 201);
        }else{
            return Response::json([
                'Code' => "400",
                'Message' => "Something went wrong! Please try again later"
            ], 400);
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorldCases  $worldCases
     * @return \Illuminate\Http\Response
     */

    public function getAllWorldCases(){
        $TotalWorldCases = WorldCases::all()->sum("cases");

        return response()->json($TotalWorldCases);
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
     * @param  \App\WorldCases  $worldCases
     * @return \Illuminate\Http\Response
     */
    public function show(WorldCases $worldCases)
    {
        return WorldCases::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorldCases  $worldCases
     * @return \Illuminate\Http\Response
     */
    public function edit(WorldCases $worldCases)
    {
        //
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorldCases  $worldCases
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorldCases $worldCases)
    {
        //
    }
}
