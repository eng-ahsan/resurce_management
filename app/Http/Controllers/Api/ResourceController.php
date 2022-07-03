<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Resources::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('pdf');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $request->pdf->move(public_path('upload'), $fileName);
        
        $resource = new Resources();
        $finalData = collect($request->only($resource->getFillable()))
                    ->merge(['file_name'=> $fileName])
                    ->toArray(); 
        $resource->create($finalData);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdf = Resources::find($id);

        return response()->json($pdf);
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
        $resource = new Resources();
            $finalData = collect($request->only($resource->getFillable()))
                            ->toArray();
                Resources::find($id)->update($finalData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tet  $tet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resources::find($id);
            $resource->delete();
    }
    public function download(Request $request)
    {

        $file = public_path() . '/upload/'.$request->file;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
    }
}
