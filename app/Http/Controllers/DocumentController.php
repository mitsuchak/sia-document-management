<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Documents::get();
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'document_name' => 'required',
        //     'document' => 'required|mimes:pdf,doc,docx',
        // ]);
        
        $file = $request->file('document');

        $document = new Documents();
        $document->document_name = $request->input('document_name');
        $document->name = $file->getClientOriginalName();
        $document->description = $request->input('description');
        $document->type = 'pdf';
        $document->extension = $file->getClientOriginalExtension();
        $document->mimetype = $file->getMimeType();
        $document->save();

        $directory = 'documents/' . $document->id;
        $path = $file->storeAs($directory, $file->getClientOriginalName(), 'public');

        $document->path = $path;
        $document->save();

        return redirect()->route('document.index')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = Documents::find($id);
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'document_name' => 'required',
            'document' => 'mimes:pdf,doc,docx',
        ]);

        $file = $request->file('document');
        
        $document = Documents::findOrNew($id);

        $document->document_name = $request->input('document_name');
        $document->description = $request->input('description');

        if($file){
            if ($document->path) {
                Storage::disk('public')->delete($document->path);
            }
            $document->name = $file->getClientOriginalName();
            $document->type = 'pdf';
            $document->extension = $file->getClientOriginalExtension();
            $document->mimetype = $file->getMimeType();
            $directory = 'documents/' . $document->id;
            $path = $file->storeAs($directory, $file->getClientOriginalName(), 'public');
    
            $document->path = $path;
        }
        
        $document->save();

        return redirect()->route('document.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Documents::find($id);
        Storage::disk('public')->delete($document->path);
        $document->delete();

        return redirect()->route('document.index')->with('success', 'Document deleted successfully.');
    }

    public function download($id)
    {
        $document = Documents::findOrFail($id);

        $filePath = storage_path('app/public/' . $document->path);

        if (!Storage::disk('public')->exists($document->path)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }
}
