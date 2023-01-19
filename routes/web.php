<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/*
1. Crea una ruta que tenga un parámetro que sea opcional y comprueba que funciona.
2. Crea una ruta que tenga un parámetro que sea opcional y tenga un valor por defecto
 en caso de que no se especifique.
*/

Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
 
Route::get('/user/{name?}', function ($name = 'John') {
    return $name;
});


// 3. Crea una ruta que atienda por POST y compruébala con Postman. 

Route::post('/test/{data?}', function ($data = 'prueba') {
    return $data;
});

// 4. Crea una ruta que atienda por GET y por POST (en un único método) y compruébalas.

Route::match(array('GET', 'POST'), '/doble', function()
{
    return 'Hello World';
});

// 5. Crea una ruta que compruebe que un parámetro está formado sólo por números.

Route::get('prueba/{id}', function ($id) {
    return $id;
})
->where('id', '[0-9]+');

/* 6.	Crea una ruta con dos parámetros que compruebe
 que el primero está formado sólo por letras y el segundo sólo por números.
*/

Route::get('test4/{num}/{letter}', function ($num,$letter) {
    return [$num,$letter];
})
->where('num', '[0-9]+')
->where('letter', '[a-z]+');