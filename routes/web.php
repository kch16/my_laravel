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
/*
Route::get('/', function () {
    return view('welcome');
});

//예제1
Route::get('/{foo?}', function($foo = 'bar') {
    return $foo;
})->where('foo','[0-9a-zA-Z]{3}');

//예제2
Route::get('/',[
  'as'=>'home',
  function(){
    return '제 이름은 "home" 입니다.';
  }
]);

Route::get('/home',function(){
  return redirect(route('home'));
});

//예제3
Route::get('/', function() {
  return view('welcome')->with([
    'name'=>'Foo',
    'greeting'=>'안녕하세요?'
  ]);
});

Route::get('/', function() {
  return view('welcome',[
    'name'=>'Foo',
    'greeting'=>'안녕하세요'
  ]);
});


Route::get('/', function(){
  $items = ['apple','banana','tomato'];

  return view('welcome', ['items'=>$items]);
});

Route::get('/', 'WelcomeController@index');


Route::get('/', 'WelcomeController@index');

Route::get('auth/login', function ()
  {
      $credentials = [
        'email' => 'kch6506@gamil.com',
        'password' => 'password'
      ];

      if(!auth()->attempt($credentials))
      {
        return '로그인 정보가 정확하지 않습니다.';
      }

      return redirect('protected');
  }
);

Route::get('protected',function ()
  {
      dump(session()->all());

      if(!auth()->check())
      {
        return '누구세요?';
      }

      return '어서 오세요'.auth()->user()->name;
  }
);

Route::get('auth/logout', function()
  {
      auth()->logout();

      return '빠이~';
  }
);
*/

Route::resource('articles','ArticlesController');


/*
DB::listen(function($query)
{
  var_dump($query->sql);
}
);
*/
