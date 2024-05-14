<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\adminLoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Middleware\logChechk;
use App\Models\User_data;
use Illuminate\Routing\RouteGroup;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//view routes
route::get('/home', [ViewsController::class, 'showHero']);

route::get('/AcoountSuccess', [ViewsController::class, 'showCongratultion']);
route::get('/faq', [ViewsController::class, 'showFAQpage']);


Route::get('/Subject/{subjectId}', [ViewsController::class, 'showStartExamPage'])->middleware('CheckExamStarted');

Route::get('/feedback', [ViewsController::class, 'showfeedback'])->name('feedback.create');
Route::post('/feedback', [ViewsController::class, 'StoreFeedback'])->name('feedback.store');
route::get('/learn', [ViewsController::class, 'showLearningPage']);
// Route::get('/html', [ViewsController::class, 'showStartExamPage']);


//register route
Route::get('/register', [ViewsController::class, 'showRegisterForm'])->middleware('logoutCheck');
Route::post('/register', [LoginController::class, 'postRegisterData']);

//User login route
Route::post('/login', [LoginController::class, 'userAuth'])->name('login');
Route::get('/login', [ViewsController::class, 'showLoginForm'])->name('login')->middleware('logoutCheck');
Route::get('/logout', [LoginController::class, 'logoutUser'])->name('logout');


//user routes
// Routes that require authentication
Route::group(['middleware' => 'UserLoginCheck'], function () {

    Route::get('/welcome', [ViewsController::class, 'welcome'])->name('welcome');

    Route::group(['prefix' => '/profile'], function () {
        route::get('/{id}', [userController::class, 'showProfilePage'])->name('profile-page');

        // route::get('/update/{id}', [userController::class, 'showUpdatePage'])->name('management.update');
        route::post('/update/{id}', [userController::class, 'postUpdatePage']);

        route::get('/change-password/{id}', [userController::class, 'showChangePassword']);
        route::post('/change-password/{id}', [userController::class, 'postChangePassword']);
    });

    Route::get('/exam/{subjectId}', [QuestionController::class, 'showExamPage']);
    Route::post('/exam', [QuestionController::class, 'submitExam']);
});



//admin routes
// ,'middleware' => 'AdminLoginCheck'
route::group(['middleware' => 'AdminLoginCheck', 'prefix' => '/Admin'], function () {
    route::get('/dashboard', [DashbordController::class, 'showDashbord']);

    route::get('/management/user', [DashbordController::class, 'ShowUsers']);
    route::get('/management/user/delete/{id}', [DashbordController::class, 'deleteUser'])->name('management.delete');

    route::get('/management/user/update/{id}', [DashbordController::class, 'showUpdatePage'])->name('management.update');
    route::post('/management/user/update/{id}', [DashbordController::class, 'postUpdatePage']);

    Route::get('/upload/subject', [QuestionController::class, 'ShowSubjectsUpload'])->name('subject.store');
    Route::post('/upload/subject', [QuestionController::class, 'PostSubjects'])->name('subject.store');


    // Route::get('/Admin/UpdateAdminID', [adminLoginController::class, 'ShowUpdateAdminIDPage']);
    Route::post('/UpdateAdminID', [adminLoginController::class, 'UpdateAdminID']);

    // Route::get('/Admin/UpdatePassword', [adminLoginController::class, 'ShowUpdatePasswordPage']);
    Route::post('/UpdatePassword', [adminLoginController::class, 'UpdatePassword']);

    Route::get('/UpdateAdmin', [adminLoginController::class, 'ShowUpdateAdminPage']);
    // Route::post('/UpdateAdmin', [adminLoginController::class, 'PostUpdateAdmin']);

    Route::get('/newAdmin', [adminLoginController::class, 'ShowCreateAdminPage']);
    Route::post('/newAdmin', [adminLoginController::class, 'registerNewAdmin']);

    route::get('/upload/exam', [QuestionController::class, 'ShowQustionUploadPage']);
    route::post('/upload/exam', [QuestionController::class, 'PostQustionUploadPageData'])->name('upload.question');
    
    route::get('/questions/view', [QuestionController::class, 'ShowALLQustions']);


    route::get('/edit/selectSubject', [QuestionController::class, 'showSelectSubjectPage']);
    route::post('/edit/exam', [QuestionController::class, 'postSelectSubjectPageANDshowQuestionEditPage']);
    route::post('/edit/questions', [QuestionController::class, 'postQuestionEditData']);

    // route::get('/edit/exam', [QuestionController::class, 'showQuestionEditPage']);
});


// admin login 
Route::get('/admin', [adminLoginController::class, 'ShowAdminLoginForm'])->middleware('logoutCheck');
Route::post('/admin/login', [adminLoginController::class, 'adminAuth'])->name("admin-login");
Route::get('/admin/logout', [adminLoginController::class, 'adminLogout'])->name("admin-logout");

// Route::get('/user', function () {
//     $user_data = User_data::all();
//     echo "<pre>";
//     print_r($user_data->toArray());
// });
