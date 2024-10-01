<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CombinedController;

Route::get('/admin', function () {
    return view('admin.dashboard.index');
});



Route::get('/register', [CombinedController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register', [CombinedController::class, 'register']);
Route::get('/login', [CombinedController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [CombinedController::class, 'login']);
Route::post('/logout', [CombinedController::class, 'logout'])->name('user.logout');
Route::get('/admin/dashboard', [CombinedController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [CombinedController::class, 'userDashboard'])->name('user.dashboard');


// Additional routes for other functionalities
Route::get('/bookings', [CombinedController::class, 'bookingsIndex'])->name('user.bookings.index');
Route::get('/bookings/create', [CombinedController::class, 'bookingsCreate'])->name('user.bookings.create');
Route::get('/bookings/{id}', [CombinedController::class, 'bookingsShow'])->name('user.bookings.show');

Route::get('/reviews', [CombinedController::class, 'reviewsIndex'])->name('user.reviews.index');
Route::get('/reviews/create', [CombinedController::class, 'reviewsCreate'])->name('user.reviews.create');
Route::get('/reviews/{id}/edit', [CombinedController::class, 'reviewsEdit'])->name('user.reviews.edit');

Route::get('/profile', [CombinedController::class, 'profileIndex'])->name('user.profile.index');
Route::get('/profile/edit', [CombinedController::class, 'profileEdit'])->name('user.profile.edit');

Route::get('/hotels', [CombinedController::class, 'hotelsIndex'])->name('user.hotels.index');
Route::get('/hotels/{id}', [CombinedController::class, 'hotelsShow'])->name('user.hotels.show');

Route::get('/tours', [CombinedController::class, 'toursIndex'])->name('user.tours.index');
Route::get('/tours/{id}', [CombinedController::class, 'toursShow'])->name('user.tours.show');

Route::get('/travel-planner', [CombinedController::class, 'travelPlannerIndex'])->name('user.travel_planner.index');
Route::get('/travel-planner/create', [CombinedController::class, 'travelPlannerCreate'])->name('user.travel_planner.create');
Route::get('/travel-planner/{id}/edit', [CombinedController::class, 'travelPlannerEdit'])->name('user.travel_planner.edit');

Route::get('/gallery', [CombinedController::class, 'galleryIndex'])->name('user.gallery.index');
Route::get('/wishlist', [CombinedController::class, 'wishlistIndex'])->name('user.wishlist.index');

Route::get('/support', [CombinedController::class, 'supportIndex'])->name('user.support.index');
Route::get('/support/create', [CombinedController::class, 'supportCreate'])->name('user.support.create');

Route::get('/notifications', [CombinedController::class, 'notificationsIndex'])->name('user.notifications.index');

Route::get('/payments', [CombinedController::class, 'paymentsIndex'])->name('user.payments.index');
Route::get('/payments/methods', [CombinedController::class, 'paymentsMethods'])->name('user.payments.methods');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [CombinedController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/plans', [CombinedController::class, 'adminPlansIndex'])->name('plans.index');
    Route::get('/categories', [CombinedController::class, 'adminCategoriesIndex'])->name('categories.index');
    Route::get('/locations', [CombinedController::class, 'adminLocationsIndex'])->name('locations.index');
    Route::get('/hotels', [CombinedController::class, 'adminHotelsIndex'])->name('hotels.index');
    Route::get('/tours', [CombinedController::class, 'adminToursIndex'])->name('tours.index');
    Route::get('/blogs', [CombinedController::class, 'adminBlogsIndex'])->name('blogs.index');
    Route::get('/users', [CombinedController::class, 'adminUsersIndex'])->name('users.index');
    Route::get('/payments', [CombinedController::class, 'adminPaymentsIndex'])->name('payments.index');
    Route::get('/settings/general', [CombinedController::class, 'adminSettingsGeneral'])->name('settings.general');
    Route::get('/reports', [CombinedController::class, 'adminReportsIndex'])->name('reports.index');
    Route::get('/audit-logs', [CombinedController::class, 'adminAuditLogsIndex'])->name('audit_logs.index');
    Route::get('/gallery', [CombinedController::class, 'adminGalleryIndex'])->name('gallery.index');
    Route::get('/plans/create', [CombinedController::class, 'adminPlansCreate'])->name('plans.create');
    Route::post('/plans', [CombinedController::class, 'adminPlansStore'])->name('plans.store');
});


Route::get('/admin/plans/{plan}/edit', [CombinedController::class, 'adminPlansEdit'])->name('admin.plans.edit');
Route::delete('/admin/plans/{plan}', [CombinedController::class, 'adminPlansDestroy'])->name('admin.plans.destroy');
Route::put('/admin/plans/{plan}', [CombinedController::class, 'adminPlansUpdate'])->name('admin.plans.update');
Route::get('/admin/categories', [CombinedController::class, 'adminCategoriesIndex'])->name('admin.categories.index');
Route::post('/admin/categories', [CombinedController::class, 'adminCategoriesStore'])->name('admin.categories.store');
    // Categories routes
    Route::get('/categories', [CombinedController::class, 'adminCategoriesIndex'])->name('categories.index');
    Route::get('/categories/create', [CombinedController::class, 'adminCategoriesCreate'])->name('categories.create');
    Route::post('/categories', [CombinedController::class, 'adminCategoriesStore'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CombinedController::class, 'adminCategoriesEdit'])->name('categories.edit');
    Route::put('/categories/{category}', [CombinedController::class, 'adminCategoriesUpdate'])->name('categories.update');
    Route::delete('/categories/{category}', [CombinedController::class, 'adminCategoriesDestroy'])->name('categories.destroy');
    Route::get('/category-plan/create', [CombinedController::class, 'create'])->name('category_plan.create');
    Route::post('/category-plan', [CombinedController::class, 'store'])->name('category_plan.store');