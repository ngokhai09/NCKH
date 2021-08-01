<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRelicsRequest;
use App\Http\Requests\UpdateRelicsRequest;
use App\Models\Organization;
use App\Models\Relics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiRelicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $relics = Relics::all();
        return response()->json($relics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRelicsRequest $request)
    {
        //
        $relics = new Relics;
        $relics->fill($request->all());
        $relics->relicsFare = $request->relicsFare;
        $relics->organizationID = $request->organizationID;
        $organization = Organization::find((integer)$request->organizationID);
        $organization->numberOfRelics = $organization->numberOfRelics + 1;
        $organization->save();
        $relics->save();
        return response()->json($organization);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $relics = Relics::find($id);
//        if($request->relicsName != ""){
//            $relics->relicsName = $request->relicsName;
//        }
//        if($request->organizationID != ""){
//            $relics->organizationID = $request->organizationID;
//        }
//        if($request->relicsDescribe != ""){
//            $relics->relicsDescribe = $request->relicsDescribe;
//        }
//
//        if($request->relicsAddress != ""){
//            $relics->relicsAddress = $request->relicsAddress;
//        }
//        if($request->relicsFare != ""){
//            $relics->relicsFare = $request->relicsFare;
//        }
//        $relics->save();
        return response()->json($request->all());
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
        $relics = Relics::find($id);
        $organization = Organization::find($relics->organizationID);
        $organization->numberOfRelics = $organization->numberOfRelics - 1;
        $organization->save();
        $relics->delete();

        return response()->json('deleted');
    }
}
