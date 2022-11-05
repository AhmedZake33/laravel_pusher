<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Mail\MailSystem;
use App\Mail\Mailable2;
use App\Jobs\SendMailJob;
use App\Events\MailSystemEvent;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/save',[App\Http\Controllers\HomeController::class, 'comment'])->name('comment.save');

Route::get('/youtube',[App\Http\Controllers\HomeController::class, 'youtube']);

Route::get('subscribe/{user}',[App\Http\Controllers\HomeController::class, 'subscribe']);

Route::post('increaseSubscribe',[App\Http\Controllers\HomeController::class, 'increaseSubscribe']);

route::get('sendMail',function(){
    // $email = new MailSystem('data','email','test title');
    // $result = $email->submit();

    // if($result == true){
    //     return 'sent';
    // }else{
    //     return 'not sent';
    // }
        
   $job = new SendMailJob();
   $job = $job->delay(\Carbon\Carbon::now()->addSeconds(5));
   dispatch($job);


        // Mail::to('ahmed.zake333@gmail.com')->send(new MailSystem('this is data','mail'));

    


});