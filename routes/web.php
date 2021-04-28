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

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('/', function () {
            return view('app');
        });

        Route::get('/tracks-test/{account}/{track}', function (\App\Models\Account $account, \App\Models\Track $track) {
            dd($track->account);
        });

        Route::get('info', function () {
            function return_bytes($val)
            {
                $val = trim($val);
                $last = strtolower($val[strlen($val) - 1]);
                switch ($last) {
                    // El modificador 'G' está disponble desde PHP 5.1.0
                    case 'g':
                        $val *= 1024;
                    // no break
                    case 'm':
                        $val *= 1024;
                    // no break
                    case 'k':
                        $val *= 1024;
                }

                return $val;
            }

            $lineBreak = "<br/>";

            echo 'display_errors = ' . ini_get('display_errors') . $lineBreak;
            echo 'register_globals = ' . ini_get('register_globals') . $lineBreak;
            echo 'post_max_size = ' . ini_get('post_max_size') . $lineBreak;
            echo 'post_max_size+1 = ' . (ini_get('post_max_size')) . $lineBreak;
            echo 'post_max_size in bytes = ' . return_bytes(ini_get('post_max_size'));
        });

        Route::get('/register', function () {
            return redirect()->to('login');
        });
    });
