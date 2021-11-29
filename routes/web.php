<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\miniController;
use App\http\controllers\studentController;
use App\http\controllers\teacherController;
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
// main
Route::get('/',[miniController::class,'index']);
Route::get('/about',[miniController::class,'about']);
Route::get('/contact',[miniController::class,'contact']);
Route::get('/alogin',[miniController::class,'login']);
Route::post('/alogaction',[miniController::class,'logaction']);
Route::get('/adminhome',[miniController::class,'home']);
Route::get('/logout',[miniController::class,'logout']);
Route::get('/asyllabus',[miniController::class,'syllabus']);
Route::get('/ateacher',[miniController::class,'teacher']);
Route::get('/att',[miniController::class,'tt']);
Route::get('/aresult',[miniController::class,'result']);
Route::get('/appres/{id}',[miniController::class,'appres']);
Route::get('/afeedback',[miniController::class,'feedback']);
Route::get('/appteach/{id}',[miniController::class,'appteach']);
Route::get('/appsyllub/{id}',[miniController::class,'appsyllub']);
Route::get('/apptt/{id}',[miniController::class,'approvett']);



//student
Route::get('/register',[studentController::class,'register']);
Route::post('/regaction',[studentController::class,'regaction']);
Route::get('/login',[studentController::class,'login']);
Route::get('/studenthome',[studentController::class,'home']);
Route::post('/logaction',[studentController::class,'logaction']);
Route::get('/viewsyllabus',[studentController::class,'syllabus']);
Route::get('/viewnotes',[studentController::class,'notes']);
Route::get('/viewtt',[studentController::class,'tt']);
Route::get('/sreslt',[studentController::class,'result']);
Route::get('/sfeedback',[studentController::class,'feedback']);
Route::post('/faction',[studentController::class,'fbaction']);



//teacher
Route::get('/tregister',[teacherController::class,'tregister']);
Route::post('/tregaction',[teacherController::class,'tregaction']);
Route::get('/teacherhome',[teacherController::class,'home']);
Route::get('/tlogin',[teacherController::class,'login']);
Route::post('/tlogaction',[teacherController::class,'logaction']);
Route::get('/syllabus',[teacherController::class,'syllabus']);
Route::post('/syllaction',[teacherController::class,'syllaction']);
Route::get('/tnotes',[teacherController::class,'notes']);
Route::post('/notesaction',[teacherController::class,'notesaction']);
Route::get('/uploadtt',[teacherController::class,'tt']);
Route::post('/ttaction',[teacherController::class,'ttaction']);
Route::get('/result',[teacherController::class,'result']);
Route::post('/resaction',[teacherController::class,'resultaction']);
Route::get('/feedback',[teacherController::class,'feedback']);
Route::get('/vresult',[teacherController::class,'vresult']);
Route::get('/vnotes',[teacherController::class,'vnotes']);
Route::get('/vtt',[teacherController::class,'vtt']);
Route::get('/vsyllabus',[teacherController::class,'vsyllabus']);


