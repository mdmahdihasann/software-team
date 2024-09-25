<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\DashboardController;
//---------------------- Auth Deshboard ------------------//

Route::prefix('app')->name('app.')->middleware(['auth', 'is_verify','permission'])->group(function () {
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');


    //--------------roles permission -------------//
    Route::resource('roles',RolesController::class)->except('show');

    Route::post('roles/get-data',[RolesController::class,'getData'])->name('roles.get-data');

});


?>