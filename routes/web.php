<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FeeController;

Route::get('/', [UserController::class,'index'])->name('home');
Route::get('/bmi-calculator', [UserController::class,'bmi_calculator'])->name('calculator');
Route::get('/about-us', [UserController::class,'about'])->name('about_us');
Route::get('/services', [UserController::class,'services'])->name('services');
Route::get('/our-team', [UserController::class,'our_team'])->name('team');
Route::get('/contact', [UserController::class,'contact'])->name('contact');
Route::get('/gallery', [UserController::class,'gallery'])->name('gallery');
Route::get('/rules', [UserController::class,'rules'])->name('rules');
Route::get('/policies', [UserController::class,'policies'])->name('policies');

Route::any('/enquiry', [UserController::class,'enquiry'])->name('user.enquiry');

Route::group(['prefix' => 'admin/console'], function(){


    Route::group(['middleware' => ['auth']], function () {

        Route::get('/logout', [LoginController::class,'logout'])->name('logout');

        Route::any('/', [AdminController::class,'dashboard'])->name('admin.dashboard');

        Route::get('/add-member', [AdminController::class,'add_member'])->name('admin.add_member');
        Route::get('/continue-with-member/{id}', [AdminController::class,'continue_member'])->name('admin.continue_member');
        Route::post('/create-member', [AdminController::class,'create_action'])->name('admin.create_member');
        Route::get('/edit-member/{id}', [AdminController::class,'edit_member'])->name('admin.edit_member');
        Route::post('/update-member/{id}', [AdminController::class,'update_action'])->name('admin.update_member');
        Route::get('/all-member', [AdminController::class,'all_member'])->name('admin.all_member');

        Route::get('/enquiries', [AdminController::class,'enquiry'])->name('admin.enquiry');
        Route::get('/revenue', [AdminController::class,'revenue'])->name('admin.revenue');
        Route::get('/dfc-register', [AdminController::class,'dfc'])->name('admin.dfc');

        Route::post('/clear-notification', [AdminController::class,'clear_notification'])->name('admin.clear.notification');
        Route::post('/updatePassword', [AdminController::class,'updatePassword'])->name('admin.updatePassword');

        Route::get('/profile', [AdminController::class,'profile'])->name('admin.profile');
        Route::post('/update_profile', [AdminController::class,'update_profile'])->name('admin.update_profile');

        Route::get('/receipt/{mid}/{id}', [AdminController::class,'receipt'])->name('admin.receipt');

        Route::get('/get_dashbord_data', [AdminController::class,'get_dashbord_data'])->name('admin.get_dashbord_data');

        Route::post('/ajax_manage_all_member', [AdminController::class, 'ajax_manage_all_member'])->name('data.get');

        Route::get('/fees_structure', [AdminController::class, 'fees_structure'])->name('admin.fees.structure');

        Route::get('/manage_offers', [AdminController::class, 'add_offer'])->name('admin.offer');

        Route::post('/ajax_manage_offers', [AdminController::class, 'ajax_manage_offers'])->name('offers.data.get');

        Route::post('/change_offer_status', [AdminController::class, 'change_offer_status'])->name('offers.change.status');

        Route::post('/add_fees_structure', [AdminController::class, 'add_fees_structure'])->name('admin.add.fees.structure');

        Route::post('/store_offer', [AdminController::class, 'store_offer'])->name('admin.store.offer');

        Route::post('/delete_fees_structure', [AdminController::class, 'delete_fees_structure'])->name('admin.delete.fees.structure');

        Route::post('/get_fees_structure', [AdminController::class, 'get_fees_structure'])->name('admin.get.fees.structure');

        Route::post('/update_fees_structure', [AdminController::class, 'update_fees_structure'])->name('admin.update.fees.structure');

         Route::post('/allot_fees_structure', [AdminController::class, 'allot_fees_structure'])->name('admin.allot.fees.structure');

        Route::post('/ajax_manage_feehead', [AdminController::class, 'ajax_manage_feehead'])->name('feehead.data.get');

        Route::get('/member_attendance', [AdminController::class, 'member_attendance'])->name('admin.member_attendance');

        // =========================================Fees===========================================

        Route::get('outstanding/{account_no}', [FeeController::class,'outstanding'])->name('admin.outstanding');

        Route::post('/pay-outstanding', [FeeController::class,'pay_outstanding'])->name('admin.pay.outstanding');

        Route::get('/member-receipts/{mid}/{id}', [FeeController::class,'member_receipts'])->name('admin.member.receipts');
        


    });


Route::group(['middleware' => ['guest']], function () {

    Route::any('/loginCheck', [LoginController::class,'checkLogin'])->name('check_login');

    Route::any('/login', [LoginController::class,'Login'])->name('login');
    Route::any('/register', [LoginController::class,'Register'])->name('register');
    Route::any('/save_register', [LoginController::class,'save_register'])->name('save.register');
});

});