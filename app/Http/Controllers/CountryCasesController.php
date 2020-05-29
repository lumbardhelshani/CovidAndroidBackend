<?php

namespace App\Http\Controllers;

use Response;
use App\CountryCases;
use Illuminate\Http\Request;
use DB;

class CountryCasesController extends Controller
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

        $CountryCase = CountryCases::where("date" , '=' , $r['date'])->where("countryName", "=" ,$r['countryName'])->first();
        if($CountryCase){
            $CountryCase->cases = $r['cases'];
        }else{
            $CountryCase = new CountryCases();

            $CountryCase->countryName = $r['countryName'];
    
            $CountryCase->cases = $r['cases'];
    
            $CountryCase->date = $r['date'];
        }
       

        if($CountryCase->save()){
            return Response::json([
                'Code' => "201",
                'Message' => "Successfully Registered The Covid Case for " . $r['countryName']
            ], 201);
        }else{
            return Response::json([
                'Code' => "400",
                'Message' => "Something went wrong! Please try again later"
            ], 400);
        }
    }

    public function getCasePerCountry(Request $r){
        $TotalCasesPerCountry = CountryCases::select("countryName" , "cases")
        ->groupBy('countryName')->where('countryName' , '=' , $r['countryName'])->sum('cases');

        return response()->json(['Country' => $r['countryName'],'total' => $TotalCasesPerCountry]);
    }

    public function getAllCountryCases(){

        $TotalCasesByCountry = CountryCases::select("countryName" , "cases")
        ->groupBy('countryName')->sum('cases');

        return response()->json($TotalCasesByCountry);
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
     * @param  \App\CountryCases  $countryCases
     * @return \Illuminate\Http\Response
     */
    public function show(CountryCases $countryCases)
    {
        return CountryCases::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CountryCases  $countryCases
     * @return \Illuminate\Http\Response
     */
    public function edit(CountryCases $countryCases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CountryCases  $countryCases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountryCases $countryCases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CountryCases  $countryCases
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryCases $countryCases)
    {
        //
    }
}
