<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload() {
        if (request()->hasFile('image')) {
            $file = request()['image'];
            $productID = request()['productID'];
            $fileName = $file->getClientOriginalName();

            $fileObj = File::create([
                'path' => 'storage/images/product_images/' . $fileName,
                'name' => $fileName,
                'type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'product_id' => $productID,
            ]);

            $file->move(public_path('storage/images/product_images'), $fileName);

            return response()->json(['message' => 'File uploaded successfully', 'file' => $fileObj->path]);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }
}
