<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileDownloadController extends Controller
{
    public function filedownload(Request $request)
    {

        $file = public_path(). "/storage/" .  $request->input('file');

        $headers = [
              'Content-Type' => 'application/pdf',
           ];

        return response()->download($file,  $request->input('file'), $headers);

        // return  $request;

        // $url = Storage::disk('public')->exists('filedownload/'. $request->file);

        // return $url;

        // if (Storage::disk('public')->exists('filedownload/'. $request->file)) {
        //     return Storage::download('public/filedownload/'.$request->file);
        // }else{
        //     return redirect()->back();
        // }
    }
}
