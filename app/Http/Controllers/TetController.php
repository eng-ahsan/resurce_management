<?php

namespace App\Http\Controllers;

use App\Models\Tet;
use Illuminate\Http\Request;

class TetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tet::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $this->validate($request,[
        //     'name' => "required | unique:setting_areas,name",
        //     'division_id' => "required",
        // ]);
        // try {
            $settingAreaModel = new Tet();
            $finalData = collect($request->only($settingAreaModel->getFillable()))
                            ->toArray(); 
            $tableData = $settingAreaModel->create($finalData);
        //     Toastr::success('',__('cmn.successfully_added'));
        //     return redirect()->back();
        // }catch (\Exception $e) {
        //     Toastr::error('',__('cmn.did_not_added'));
        //     return redirect()->back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function show(tet $tet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settingBrandModel = new Tet();
            $finalData = collect($request->only($settingBrandModel->getFillable()))
                            ->toArray();
           Tet::find($id)->update($finalData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Tet::find($id);
            $area->delete();
    }
}
