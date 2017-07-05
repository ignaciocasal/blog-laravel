<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index(){
        $images = Image::orderBy('id')->paginate(6);
        $images->each(function ($images){
            $images->article;
        });
        return view('admin.images.index')->with('images', $images);
    }
}
