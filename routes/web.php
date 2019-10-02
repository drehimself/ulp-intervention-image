<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $img = Image::make('puppy.jpg')->resize(300, 200);

    // $img->resize(300, null, function ($constraint) {
    //     $constraint->aspectRatio();
    // });

    $img->text('foo', 50, 50, function ($font) {
        $font->file('fonts/impact.ttf');
        $font->size(24);
        $font->align('center');
        $font->valign('top');
    });

    $img->circle(70, 150, 100, function ($draw) {
        $draw->border(5, '000000');
    });

    return $img->response('jpg');

    // return view('welcome');
});

Route::post('/upload', function () {
    Image::make(request()->file('uploaded_file'))->resize(300, 200)->save('saved.jpg');
});
