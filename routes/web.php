<?php

use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepairementsController;
use App\Http\Controllers\RepairResultController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TechniciansController;
use App\Models\RepairResult;
use App\Models\Technicians;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/customers', [CustomersController::class, 'index'])->name('customer.index');
// Route::get('/customers/{id}', [CustomersController::class, 'show'])->name('customer.show');
// Route::put('/customer/{id}', [CustomersController::class, 'update'])->name('customer.update');
// Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');

// Route::get('/technicians', [TechniciansController::class, 'index'])->name('technicians.index');
// Route::get('/technicians/create', [TechniciansController::class, 'create'])->name('technicians.create');
// Route::post('/technicians', [TechniciansController::class, 'store'])->name('technicians.store');
// Route::get('/technicians/{id}', [TechniciansController::class, 'show'])->name('technicians.show');
// Route::put('/technicians/{id}', [TechniciansController::class, 'update'])->name('technicians.update');
// Route::delete('/technicians/{id}', [TechniciansController::class, 'destroy'])->name('technicians.destroy');

// Route::get('/complaints/processed', [ComplaintsController::class, 'processed'])->name('complaint.processed');
// Route::get('/complaints/processed/{id}', [ComplaintsController::class, 'show'])->name('complaint.show');
// Route::get('/complaints/unprocessed', [ComplaintsController::class, 'unprocessed'])->name('complaint.unprocessed');
// Route::get('/complaints/{id}/proceed', [ComplaintsController::class, 'proceed'])->name('complaint.proceed');
// Route::post('/complaints/{id}/processed', [RepairementsController::class, 'store'])->name('repair.store');
// Route::get('/complaints/{id}/sendResult', [ComplaintsController::class, 'createResult'])->name('complaint.result');
// Route::post('/complaints/{id}/sendResult', [RepairResultController::class, 'store'])->name('repairResult.store');

// Route::get('/repairments', [RepairementsController::class, 'index'])->name('repair.index');

// Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
// Route::get('/reports/customers', [ReportsController::class, 'customerExport'])->name('customers.download');
// Route::get('/reports/technicians', [ReportsController::class, 'technicianExport'])->name('technicians.download');
// Route::get('/reports/complaints', [ReportsController::class, 'complaintExport'])->name('complaints.download');
// Route::get('/reports/unprocessedComplaint', [ReportsController::class, 'unprocessedComplaintExport'])->name('unprocessedComplaints.download');
// Route::get('/reports/processedComplaint', [ReportsController::class, 'processedComplaintExport'])->name('processedComplaints.download');
// Route::get('/reports/repairements', [ReportsController::class, 'repairementsExport'])->name('repairements.download');

Route::middleware('role:admin')->prefix('a')->group(function () {

    Route::get('/', [HomeController::class, 'adminIndex'])->name('admin.index');

    Route::get('/customers', [CustomersController::class, 'index'])->name('customer.index');
    Route::get('/customers/{id}', [CustomersController::class, 'show'])->name('customer.show');
    Route::put('/customer/{id}', [CustomersController::class, 'update'])->name('customer.update');
    Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');

    Route::get('/technicians', [TechniciansController::class, 'index'])->name('technicians.index');
    Route::get('/technicians/create', [TechniciansController::class, 'create'])->name('technicians.create');
    Route::post('/technicians', [TechniciansController::class, 'store'])->name('technicians.store');
    Route::get('/technicians/{id}', [TechniciansController::class, 'show'])->name('technicians.show');
    Route::put('/technicians/{id}', [TechniciansController::class, 'update'])->name('technicians.update');
    Route::delete('/technicians/{id}', [TechniciansController::class, 'destroy'])->name('technicians.destroy');

    Route::get('/complaints/processed', [ComplaintsController::class, 'processed'])->name('complaint.processed');
    Route::get('/complaints/processed/{id}', [ComplaintsController::class, 'show'])->name('complaint.show');
    Route::get('/complaints/unprocessed', [ComplaintsController::class, 'unprocessed'])->name('complaint.unprocessed');
    Route::get('/complaints/{id}/proceed', [ComplaintsController::class, 'proceed'])->name('complaint.proceed');
    Route::post('/complaints/{id}/processed', [RepairementsController::class, 'store'])->name('repair.store');
    Route::get('/complaints/{id}/sendResult', [ComplaintsController::class, 'createResult'])->name('complaint.result');
    Route::post('/complaints/{id}/sendResult', [RepairResultController::class, 'store'])->name('repairResult.store');

    Route::get('/repairments', [RepairementsController::class, 'index'])->name('repair.index');

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/customers', [ReportsController::class, 'customerExport'])->name('customers.download');
    Route::get('/reports/technicians', [ReportsController::class, 'technicianExport'])->name('technicians.download');
    Route::get('/reports/complaints', [ReportsController::class, 'complaintExport'])->name('complaints.download');
    Route::get('/reports/unprocessedComplaint', [ReportsController::class, 'unprocessedComplaintExport'])->name('unprocessedComplaints.download');
    Route::get('/reports/processedComplaint', [ReportsController::class, 'processedComplaintExport'])->name('processedComplaints.download');
    Route::get('/reports/repairements', [ReportsController::class, 'repairementsExport'])->name('repairements.download');

});

Route::middleware('role:user')->prefix('u')->group(function () {

    Route::get('/', [HomeController::class, 'userIndex'])->name('user.index');

    Route::post('/userInfo', [CustomersController::class, 'store'])->name('user.customers.store');

    Route::get('/complaints', [ComplaintsController::class, 'index'])->name('user.complaints.index');
    Route::get('/complaints/{id}', [ComplaintsController::class, 'showComplaint'])->name('user.complaints.show');
    Route::post('/complaints', [ComplaintsController::class, 'store'])->name('user.complaints.store');
    Route::put('/complaints/{id}', [ComplaintsController::class, 'update'])->name('user.complaints.update');
    Route::delete('/complaints/{id}', [ComplaintsController::class, 'destroy'])->name('user.complaints.dstroy');

    Route::get('/processedComplaints', [ComplaintsController::class, 'processedIndex'])->name('user.complaints.processed');

    Route::get('/repairements', [RepairResultController::class, 'index'])->name('user.repairements.index');

});
