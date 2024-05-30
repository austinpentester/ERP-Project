<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/sample-page', function () {
//     return view('sample-page');
// });


// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/forgotPassword', function () {
//     return view('forgotPassword');
// });

// Route::get('/companyprofile', function () {
//     return view('companyprofile');
// });


// party

// Customer

Route::post('/customer_details', [PartyController::class, 'store'])->name('customer.details.store');
Route::get('/customer_details', [PartyController::class, 'showCustomerDetailsForm'])->name('customer.details.form');



// Supplier
Route::post('/supplier_details', [PartyController::class, 'store1'])->name('supplier.details.store');
Route::get('/supplier_details', [PartyController::class, 'showSupplierDetailsForm'])->name('supplier.details.form');



// distributor
Route::post('/distributor_details', [PartyController::class, 'store2'])->name('distributor.details.store');
Route::get('/distributor_details', [PartyController::class, 'showdistributorDetailsForm'])->name('distributor.details.form');


Route::get('/',[MainController::class,'index']);
Route::get('login',[MainController::class,'login']);
Route::post('login_ck',[MainController::class,'login_ck'])->name('login_ck');
Route::match(['get','post'],'logout',[MainController::class,'logout'])->name('logout');
Route::get('/sample-page',[MainController::class,'sample-page']);
Route::get('forgotPassword',[MainController::class,'forgotPassword']);
Route::get('companyprofile',[MainController::class,'companyprofile']);
Route::post('company_details',[MainController::class,'company_details'])->name('company_details');
Route::post('company_details_upd/{id}',[MainController::class,'company_details_upd'])->name('company_details_upd');
Route::post('bank_dts_ins',[MainController::class,'bank_dts_ins'])->name('bank_dts_ins');
Route::post('delete_value',[MainController::class,'delete_value'])->name('delete_value');
Route::get('branch_Table',[MainController::class,'branch_Table'])->name('branch_Table');
Route::get('branch',[MainController::class,'branch'])->name('branch');
Route::match(['get','post'],'company_details_edit/{id}',[MainController::class,'company_details_edit'])->name('company_details_edit');
Route::match(['get','post'],'company_details_delete/{id}',[MainController::class,'company_details_delete'])->name('company_details_delete');
Route::match(['get','post'],'company_details_edit_upd/{id}',[MainController::class,'company_details_edit_upd'])->name('company_details_edit_upd');
Route::match(['get','post'],'company_details_edit_dlt',[MainController::class,'company_details_edit_dlt'])->name('company_details_edit_dlt');
Route::get('change_password',[MainController::class,'change_password'])->name('change_password');
Route::post('changePass_upd',[MainController::class,'changePass_upd'])->name('changePass_upd');
Route::get('forget_pass_link',[MainController::class,'forget_pass_link'])->name('forget_pass_link');
Route::post('forget_pass_link_send',[EmailController::class,'sendEmail'])->name('forget_pass_link_send');
Route::post('resetPassForm/{token}',[EmailController::class,'resetPassForm'])->name('resetPassForm');



// Route::get('/branch', function () {
//     return view('branch');
// });

// parties
Route::get('/C_Table', [PartyController::class, 'c_Table'])->name('c_Table');
Route::get('/c_edit/{id}', [PartyController::class, 'c_edit'])->name('c_edit');
Route::post('/customer_upd/{id}', [PartyController::class, 'customer_upd'])->name('customer_upd');
Route::match(['get','post`'],'/c_dlt/{id}', [PartyController::class, 'c_dlt']);
Route::match(['get','post`'],'/c_view/{id}', [PartyController::class, 'c_view']);

Route::get('/S_Table', [PartyController::class, 's_Table'])->name('s_Table');
Route::get('/s_edit/{id}', [PartyController::class, 's_edit'])->name('s_edit');
Route::post('/supplier_upd/{id}', [PartyController::class, 'supplier_upd'])->name('supplier_upd');
Route::match(['get','post`'],'/s_dlt/{id}', [PartyController::class, 's_dlt']);
Route::match(['get','post`'],'/s_view/{id}', [PartyController::class, 's_view']);

Route::get('/D_Table', [PartyController::class, 'd_Table'])->name('d_Table');
Route::get('/d_edit/{id}', [PartyController::class, 'd_edit'])->name('d_edit');
Route::post('/distributor_upd/{id}', [PartyController::class, 'distributor_upd'])->name('distributor_upd');
Route::match(['get','post`'],'/d_dlt/{id}', [PartyController::class, 'd_dlt']);
Route::match(['get','post`'],'/d_view/{id}', [PartyController::class, 'd_view'])->name('d_view');


// Supplier
// supllier products
Route::get('sup_products',[SupplierController::class,'sup_products']);
Route::get('sup_product_cr',[SupplierController::class,'sup_product_cr'])->name('sup_product_cr');
Route::post('sup_product_ins',[SupplierController::class,'sup_product_ins'])->name('sup_product_ins');



Route::get('/Customer ', function () {
    return view('Customer');
});

Route::get('/C_Table ', function () {
    return view('C_Table');
});

Route::get('/S_Table ', function () {
    return view('S_Table');
});

Route::get('/D_Table ', function () {
    return view('D_Table');
});
Route::get('/changePassword ', function () {
    return view('changePassword');
});


Route::get('/Supplier', function () {
    return view('Supplier');
});

Route::get('/Distributor', function () {
    return view('Distributor');
});

Route::get('/Product', function () {
    return view('Product');
});

Route::get('/P_Table', function () {
    return view('P_Table');
});


Route::get('/Table', function () {
    return view('Table');
});


// master

//Category route
Route::get('/Category', [MasterController::class, 'index']);
Route::post('/Category', [MasterController::class, 'insert'])->name('insert');
Route::get('/T_Category', [MasterController::class, 'indexTable']);
Route::get('/Category/delete/{id}', [MasterController::class, 'delete'])->name('delete');

Route::post('/Category/update/{id}', [MasterController::class, 'updateCategory'])->name('updateCategory');


// units name
Route::get('/T_Units', [MasterController::class, 'indexTUnit']);
Route::get('/Units', [MasterController::class, 'indexUnit']);
Route::post('/Units', [MasterController::class, 'insertUnit'])->name('insertUnit');
Route::get('/Unit/delete/{id}', [MasterController::class, 'deleteUnit'])->name('deleteUnit');
Route::post('/Units/update/{id}', [MasterController::class, 'updateUnit'])->name('updateUnit');



// Major_heads
Route::get('/TMajor_Heads', [MasterController::class, 'indexTMajor']);
Route::get('/Major_Heads', [MasterController::class, 'indexMajor_heads']);
Route::post('/Major_Heads', [MasterController::class, 'insertMajor_Heads'])->name('insertMajor_Heads');
Route::get('/Major_Heads/delete/{id}', [MasterController::class, 'deleteMajor_Heads'])->name('deleteMajor_Heads');




// Color
Route::get('/T_color', [MasterController::class, 'indexTColor']);
Route::get('/Color', [MasterController::class, 'indexColor']);
Route::post('/Color', [MasterController::class, 'insertColor'])->name('insertColor');
Route::get('/Color/delete/{id}', [MasterController::class, 'deleteColor'])->name('deleteColor');
Route::post('/Color/update/{id}', [MasterController::class, 'updateColor'])->name('updateColor');
Route::post('/Color/update/{id}', [MasterController::class, 'updateColor'])->name('updateColor');

Route::post('/editMajorHead/{id}', [MasterController::class, 'updateMajorHead'])->name('updateMajorHead');



// Position
Route::get('/T_Position', [MasterController::class, 'indexTPosition']);
Route::get('/Position', [MasterController::class, 'indexPosition']);
Route::post('/Position', [MasterController::class, 'insertPosition'])->name('insertPosition');
Route::get('/Position/delete/{id}', [MasterController::class, 'deletePosition'])->name('deletePosition');

Route::post('/Position/update/{id}', [MasterController::class, 'updatePosition'])->name('updatePosition');



// Volume
Route::get('/T_Volume', [MasterController::class, 'indexTVolume']);
Route::get('/Volume', [MasterController::class, 'indexVolume']);
Route::post('/Volume', [MasterController::class, 'insertVolume'])->name('insertVolume');
Route::get('/Volume/delete/{id}', [MasterController::class, 'deleteVolume'])->name('deleteVolume');

Route::post('/Volume/update/{id}', [MasterController::class, 'updateVolume'])->name('updateVolume');


// Taxes
Route::get('/T_Taxes', [MasterController::class, 'indexTTaxes']);
Route::get('/Taxes', [MasterController::class, 'indexTaxes']);
Route::post('/Taxes', [MasterController::class, 'insertTaxes'])->name('insertTaxes');
Route::get('/Taxes/delete/{id}', [MasterController::class, 'deleteTaxes'])->name('deleteTaxes');
Route::post('/Taxes/update/{id}', [MasterController::class, 'updateTaxes'])->name('updateTaxes');



// Currencies
Route::get('/T_Currencies', [MasterController::class, 'indexTCurrencies']);
Route::get('/Currencies', [MasterController::class, 'indexCurrencies']);
Route::post('/Currencies', [MasterController::class, 'insertCurrencies'])->name('insertCurrencies');
Route::get('/Currencies/delete/{id}', [MasterController::class, 'deleteCurrencies'])->name('deleteCurrencies');

Route::post('/Currencies/update/{id}', [MasterController::class, 'updateCurrencies'])->name('updateCurrencies');


// Payment Modes
Route::get('/T_Payment', [MasterController::class, 'indexTPaymentModes']);
Route::get('/Payment', [MasterController::class, 'indexPaymentModes']);
Route::post('/Payment', [MasterController::class, 'insertPaymentModes'])->name('insertPayment');
Route::get('/Payment/delete/{id}', [MasterController::class, 'deletePaymentModes'])->name('deletePayment');
Route::get('/PaymentModes/edit/{id}', [MasterController::class, 'editPaymentModes'])->name('editPaymentModes');
Route::post('/PaymentModes/update/{id}', [MasterController::class, 'updatePaymentModes'])->name('updatePaymentModes');





Route::get('/Branch_Table', function () {
    return view('Branch_Table');
});




// products
Route::get('/Product', [ProductController::class, 'index'])->name('products.create');
Route::post('/Product', [ProductController::class, 'store'])->name('products.store');
Route::get('/P_Table', [ProductController::class, 'indexTable'])->name('products.Table');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('/EditProduct/{id}', [ProductController::class, 'indexUpdate'])->name('products.updateView');
Route::get('/ViewProduct/{id}', [ProductController::class, 'indexView'])->name('products.updateView');
Route::post('/Editproducts', [ProductController::class, 'update'])->name('products.update');


// branch

Route::post('branch_ins',[MainController::class,'branch_ins'])->name('branch_ins');

Route::match(['get','post'],'company_details_view/{id}',[MainController::class,'company_details_view'])->name('company_details_view');
