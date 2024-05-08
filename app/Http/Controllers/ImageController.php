<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Str;


class ImageController extends Controller
{
    public function upload() {
        if (request()->hasFile('image')) {
            $file = request()['image'];
            $id = request()['id'];
            $identifier = request()['identifier'];
            $type = '.' . substr($file->getClientMimeType(), strpos($file->getClientMimeType(), '/') + 1);
            $fileName = $identifier . '_' . Str::random(10) . $type;

            $fileObj = Image::create([
                'path' => 'storage/images/product_images/' . $fileName,
                'filename' => $fileName,
                'type' => $type,
                'size' => $file->getSize(),
                'product_id' => $id,
            ]);



            $file->move(public_path('storage/images/product_images'), $fileName);

            return response()->json(['message' => 'File uploaded successfully', 'file' => $fileObj]);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }

    public function bannerUpload() {
        if (request()->hasFile('image')) {
            $file = request()['image'];
            $slug = request()['slug'];
            $type = '.' . substr($file->getClientMimeType(), strpos($file->getClientMimeType(), '/') + 1);
            $fileName = $slug . '_' . Str::random(10) . $type;

            $fileObj = Image::create([
                'path' => 'storage/images/range_banners/' . $fileName,
                'filename' => $fileName,
                'type' => $type,
                'size' => $file->getSize(),
            ]);
            $file->move(public_path('storage/images/range_banners/'), $fileName);

            return response()->json(['message' => 'File uploaded successfully', 'file' => $fileObj]);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }

    public function setPrimary() {
        request()->validate([
            'id' => 'required|integer'
        ]);

        $id = request()['id'];

        $image = Image::find($id);

        $image->is_primary = true;
        $image->save();

        return response()->json(['message' => 'Primary image set successfully']);
    }

    public function unsetPrimary() {
        request()->validate([
            'id' => 'required|integer'
        ]);

        $id = request()['id'];

        $image = Image::find($id);

        $image->is_primary = false;
        $image->save();

        return response()->json(['message' => 'Primary image unset successfully']);
    }
}
