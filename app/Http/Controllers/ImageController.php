<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $data = Image::all();
        return view('repository',['data' => $data]);
    }

    public function store(Request $request)
    {
        $path = \Storage::disk('s3')->put('images', $request->image);
        $path = \Storage::disk('s3')->url($path);

        Image::create(['url' => $path]);

        return back()->with('success','Imagen guardada correctamente');
    }

    public function delete($id)
    {
        // parseamos la url para solo obtener el key del archivo a eliminar. Por ejemplo, de la siguiente URL
        // https://laravel-s3-repository.s3.us-east-2.amazonaws.com/images/lKIHVgkA3rQC2jVFnj8vFFaUAKHRKFQA1tXFij5G.jpg
        // solo se necesita para eliminar el archivo => images/lKIHVgkA3rQC2jVFnj8vFFaUAKHRKFQA1tXFij5G.jpg
        $path = parse_url(Image::find($id)->url)['path'];

        // Eliminamos el archivo del bucket
        \Storage::disk('s3')->delete($path);

        // elimina el registro de base de datos
        Image::destroy($id);


        return back()->with('success','Imagen eliminada correctamente');

    }
}
