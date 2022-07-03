<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Link_provider;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return Link_provider::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $Url = new Link_provider();
            $finalData = collect($request->only($Url->getFillable()))
                            ->toArray(); 
            $Url->create($finalData);
            return response()->json([
                'status' => 'success',
                'url'   => $Url
            ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = Link_provider::find($id);

        return response()->json($url);
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
        $Url = new Link_provider();
            $finalData = collect($request->only($Url->getFillable()))
                            ->toArray();
                            Link_provider::find($id)->update($finalData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Url = Link_provider::find($id);
            $Url->delete();
    }
}
