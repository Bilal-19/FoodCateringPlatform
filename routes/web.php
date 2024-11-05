<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



// --------------------------------- Admin ---------------------------------
// 1. ------------ Dashboard ------------
Route::get("/admin", [AdminController::class, 'index'])->name('Dashboard');



// 2. ------------ Manage Menu ------------
Route::get("/admin/menu/management", [AdminController::class, 'manageMenu'])->name('MenuManagement');

// 2a. ------------ Delete Menu from Database ------------
Route::get("/admin/delete/menu/{id}", [AdminController::class, 'deleteMenu'])->name('delete-menu');

// 2b. ------------ Open editable menu ------------
Route::get("/admin/edit/menu/{id}", [AdminController::class, 'editMenu'])->name('edit-menu');

// 2c. ------------ Update specific menu to database ------------
Route::post("/admin/update/menu/{id}", [AdminController::class, 'updateMenuRecord'])->name('updateMenuRecord');



// 3. ------------ Add Menu ------------
Route::get("/add/menu", [AdminController::class, 'addMenu'])->name('add-menu');

// 3a. ------------ Add New Menu to Database ------------
Route::post("/admin/store/menu", [AdminController::class, 'storeMenuToDatabase'])->name('storeMenu');

// 4. ------------ Order Management ------------
Route::get("/admin/orders", [AdminController::class, 'manageOrders'])->name('manage_order');

// 4a. ------------ Move Order from UI to Trash ------------
Route::get("/admin/orders/delete/{id}", [AdminController::class, 'deleteOrder'])->name('delete.order');

// 4b. ------------ Change Order Status on a single click ------------
Route::get("/update/order/{id}", [AdminController::class, 'updateOrder'])->name('update.order');




// 5. ------------ Inventory Management ------------
Route::get('/admin/view/inventory', [AdminController::class, 'viewInventory'])->name('view.inventory');

// 5a. ------------ Display Add Inventory Form ------------
Route::get('/admin/add/inventory', [AdminController::class, 'addInventory'])->name('add.inventory');

// 5b. ------------ Move Specific Inventory from UI to Trash ------------
Route::get('/admin/delete/inventory/{id}', [AdminController::class, 'deleteInventory'])->name('delete.inventory');

// 5c. ------------ Display Editable Inventory Page ------------
Route::get('/admin/edit/inventory/{id}', [AdminController::class, 'updateInventory'])->name('update.inventory');

// 5d. ------------ Create new inventory and store it into database ------------
Route::post('/admin/create/inventory', [AdminController::class, 'createInventory'])->name('create.inventory');

Route::post('/admin/update/inventory/{id}', [AdminController::class, 'updateSpecificInventory'])->name('update.specific.inventory');

// 5e. ------------ Update specific order to database ------------

// 6. ------------ Customer Inquiry ------------
Route::get("/customer/inquiry", [AdminController::class, 'getCustomerInquiries'])->name('cutomer_inquiry');
Route::get('/admin/delete/inquiry/{id}', [AdminController::class, 'deleteCustomerInquiry'])->name(name: 'delete.inquiry');

// 7. ------------ Registered Users ------------
Route::get('/admin/registered/users', [AdminController::class, 'viewRegisteredUsers'])->name(name: 'view.users');
Route::get('/admin/reset/password/{id}', [AdminController::class, 'resetUserPassword'])->name(name: 'reset.password');
Route::get('/admin/delete/account/{id}', [AdminController::class, 'deleteUserAccount'])->name(name: 'delete.account');


// 8. ------------ FAQ ------------
Route::get('/admin/view/faq', [AdminController::class, 'viewFAQ'])->name(name: 'view.FAQ');
Route::get('/admin/faq/form', [AdminController::class, 'viewFAQform'])->name(name: 'view.FAQ.Form');
Route::post('/admin/create/faq', [AdminController::class, 'createFAQ'])->name(name: 'create.FAQ');
Route::get('/admin/delete/FAQ/{id}', [AdminController::class, 'deleteFAQ'])->name(name: 'delete.FAQ');
Route::get('/admin/edit/FAQ/{id}', [AdminController::class, 'editFAQ'])->name(name: 'edit.FAQ');
Route::post('/admin/update/FAQ/{id}', [AdminController::class, 'updateFAQ'])->name(name: 'update.FAQ');

// 9. ------------ View Trash ------------
Route::get("/view/trash", [AdminController::class, 'viewTrashRecord'])->name('view.trash');

// 9a. ------------ Restore Menu Item from Trash ------------
Route::get('/admin/menu/restore/{id}', [AdminController::class, 'restoreMenu'])->name('restore.menu');

// 9b. ------------ Permanent delete menu item from trash ------------
Route::get('/admin/menu/delete/{id}', [AdminController::class, 'deleteMenuItem'])->name('delete.menu');

// 9c. ------------ Permanent delete order from trash ------------
Route::get('/admin/order/delete/{id}', [AdminController::class, 'forceDeleteOrder'])->name('force.delete.order');

// 9c. ------------ restor order from trash ------------
Route::get('/admin/order/restore/{id}', [AdminController::class, 'restoreOrderFromTrash'])->name('restore.order.trash');

// 10. ------------ Logout ------------
Route::get("/logout", [UserController::class, 'LogOut'])->name('LogOut');

//--------------------------------- User ---------------------------------

// 1. ------------ Home page ------------
Route::get("/", [UserController::class, 'index'])->name('Home');

// 2. ------------ Browse menu ------------
Route::get("/browse/menu", [AdminController::class, 'displayMenuToUser'])->name('Menu');

// 2a. ------------ Show menu to user based on the category select by user ------------
Route::get("/browse/menu/data", [AdminController::class, 'viewMenuData'])->name('menuData');

// 3. ------------ Order Food ------------
Route::get("/order/food", [UserController::class, 'viewOrderFood'])->name('OrderFood');

// 3a. ------------ Store order details into database ------------
Route::post("/order/place", [UserController::class, 'placeOrder'])->name('placeOrder');


// 4. ------------ Customer Support ------------
Route::get("/customer/support", [UserController::class, 'viewCustomerSupport'])->name('CustomerSupport');
Route::post("/store/inquiry", [UserController::class, 'storeCustomerInquiry'])->name('customerInquiry');

// 5. ------------ FAQ ------------
Route::get("/FAQ", [UserController::class, 'displayFAQ'])->name('showFAQ');

// 5. ------------ Order History ------------
Route::get("/order/history", [UserController::class, 'viewOrderHistory'])->name('orderHistory');

// ------------ Sign Up ------------
Route::post("/create/account", [UserController::class, 'createAccount'])->name('newUserAccount');






// ------------ Login Page ------------
Route::view('/login', 'Login')->name('login');

// ------------ Verify user credentials ------------
Route::post("/verify/account", [UserController::class, 'verifyCredentials'])->name('verifyCredentials');

// ------------ Sign Up Page ------------
Route::view('/sign/up', 'Signup')->name('SignUp');



