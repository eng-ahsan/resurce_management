<?php

namespace App\Http\Controllers;

use App\Models\HtmlSnippet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HtmlSnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HtmlSnippet::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $HtmlSnippet = new HtmlSnippet();
            $finalData = collect($request->only($HtmlSnippet->getFillable()))
                            ->toArray(); 
            $HtmlSnippet->create($finalData);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function show(HtmlSnippet $tet)
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
        $HtmlSnippet = new HtmlSnippet();
            $finalData = collect($request->only($HtmlSnippet->getFillable()))
                            ->toArray();
                            HtmlSnippet::find($id)->update($finalData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $HtmlSnippet = HtmlSnippet::find($id);
            $HtmlSnippet->delete();
    }
}

