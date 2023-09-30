<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', [UserController::class, 'welcome'])->name('welcome');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::post('/contact/save', [UserController::class, 'contactSave'])->name('contact.save');
Route::get('/about', [UserController::class, 'about'])->name('about');

// frontend properties
Route::get('/properties/all', [PropertyController::class, 'frontAllProperties'])->name('all.properties');
Route::get('/properties/{id}/show', [PropertyController::class, 'showProperty'])->name('properties.show');

// frontend agent show
Route::get('/agents/all', [AgentController::class, 'frontAllAgents'])->name('all.agents');
Route::get('/agent/{id}/show', [AgentController::class, 'agentShow'])->name('agent.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/admin/update', [AdminController::class, 'adminUpdate'])->name('admin.update');
    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/password', [AdminController::class, 'adminChangePassword'])->name('admin.password.change');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

});


//admin other routes
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

// customer routes
Route::middleware('auth')->group(function () {
    Route::get('customers/index', [CustomerController::class, 'customerIndex'])->name('customers.index');
    Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('customers/store', [CustomerController::class,'store'])->name('customers.store');
    Route::get('customers/{id}/edit', [CustomerController::class,'edit'])->name('customers.edit');
    Route::post('customers/{id}/update', [CustomerController::class,'update'])->name('customers.update');
    Route::delete('customers/{id}/delete', [CustomerController::class,'destroy'])->name('customers.destroy');
});
// user routes
Route::middleware('auth')->group(function () {
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class,'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::post('users/{id}/update', [UserController::class,'update'])->name('users.update');
    Route::delete('users/{id}/delete', [UserController::class,'destroy'])->name('users.destroy');
});

// property routes
Route::middleware('auth')->group(function () {
    Route::get('properties/index', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('properties/store', [PropertyController::class,'store'])->name('properties.store');
    Route::get('properties/{id}/edit', [PropertyController::class,'edit'])->name('properties.edit');
    Route::post('properties/{id}/update', [PropertyController::class,'update'])->name('properties.update');
    Route::delete('properties/{id}/delete', [PropertyController::class,'destroy'])->name('properties.destroy');
});


// Agent routes
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class, 'agentLogout'])->name('agent.logout');
    Route::post('/agent/update', [AgentController::class, 'agentUpdate'])->name('agent.update');
    Route::post('/agent/password/update', [AgentController::class, 'agentPasswordUpdate'])->name('agent.password.update');
    Route::get('/agent/profile', [AgentController::class, 'agentProfile'])->name('agent.profile');
    Route::get('/agent/password', [AgentController::class, 'agentChangePassword'])->name('agent.password.change');
});
