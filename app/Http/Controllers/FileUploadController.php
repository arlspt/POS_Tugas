<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        // Validate the incoming file upload and nama_gambar field
        $request->validate([
            'berkas' => 'required|file|image|max:5000', // Validate file upload
            'nama_gambar' => 'required', // Validate nama_gambar field
        ]);

        // Generate a unique file name
        $extfile = $request->berkas->getClientOriginalExtension();
        $namafile = $request->input('nama_gambar') . '.' . $extfile;

        // Store the file in the 'public' disk with the generated file name
        $request->berkas->storeAs('public/image-uploaded', $namafile);

        // Prepare the URL to display the uploaded image
        $imageUrl = asset('storage/image-uploaded/' . $namafile);

        // Redirect to a view to display the uploaded image
        return view('uploaded-image', [
            'imageUrl' => $imageUrl,
            'filename' => $namafile,
            'pathPublic' => asset('storage/image-uploaded/' . $namafile)
        ]);
    }
}
