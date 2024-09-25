<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\DashboardController;
//---------------------- Auth Deshboard ------------------//

Route::prefix('portal')->name('portal.')->middleware(['is_client'])->group(function () {
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');
});


?>