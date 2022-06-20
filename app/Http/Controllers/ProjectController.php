<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('index', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $filename = $request->file('thing')->store('', 'google');
      $dir = '/';
      $recursive = false;
      $file = collect(Storage::disk('google')->listContents($dir, $recursive))
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->sortBy('timestamp')
            ->last();

        Storage::disk('google')->get($file['path']);

        $project = Project::create([
            'file_path' => $file['path'],
            'name' => 'título de prueba',
            'description' => 'descripción de prueba',
            'user_id' => 1
        ]);
        // Storage::disk('google')->put('foto.jpg', $filename);
        return 'File was saved to Google Drive';
    }


    public function download($id){
        $fileDatabase = Project::find($id);
        $filename = $fileDatabase->file_path;

        // $filename = 'nSMuV6R4XbLkyIwcwWslj9nO61ERuBCvDbEaFAmO.pdf';

        $rawData = Storage::disk('google')->get($filename); // raw content
        $file = Storage::disk('google')->getAdapter()->getMetadata($filename); // array with file info
    
        return response($rawData, 200)
            ->header('ContentType', $file['mimetype'])
            ->header('Content-Disposition', "attachment; filename=$filename");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
