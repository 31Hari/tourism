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
    Route::get('/plans/create', [CombinedController::class, 'adminPlansCreate'])->name('plans.create');
    Route::post('/plans', [CombinedController::class, 'adminPlansStore'])->name('plans.store');
    Route::get('/blogs', [CombinedController::class, 'adminBlogsIndex'])->name('blogs.index');
    Route::get('/blogs', [CombinedController::class, 'adminBlogsIndex'])->name('blogs.index');
    Route::get('/blogs/create', [CombinedController::class, 'adminBlogCreate'])->name('blogs.create');
    Route::post('/blogs', [CombinedController::class, 'adminBlogStore'])->name('blogs.store');
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
    Route::delete('/category-plan/{id}', [CombinedController::class, 'destroyCategoryPlan'])->name('category_plan.destroy');
    Route::get('/admin/locations/create', [CombinedController::class, 'adminLocationsCreate'])->name('admin.locations.create');
Route::post('/admin/locations', [CombinedController::class, 'adminLocationsStore'])->name('admin.locations.store');
Route::get('/locations/{id}/edit', [CombinedController::class, 'adminLocationsEdit'])->name('locations.edit');
Route::put('/locations/{id}', [CombinedController::class, 'adminLocationsUpdate'])->name('locations.update');
Route::delete('/locations/{id}', [CombinedController::class, 'adminLocationsDestroy'])->name('locations.destroy');
Route::get('/admin/hotels/create', [CombinedController::class, 'adminHotelsCreate'])->name('admin.hotels.create');
Route::post('/admin/hotels', [CombinedController::class, 'adminHotelsStore'])->name('admin.hotels.store');
Route::get('/admin/hotels', [CombinedController::class, 'adminHotelsIndex'])->name('admin.hotels.index');
Route::get('/admin/hotels/{hotel}', [CombinedController::class, 'adminHotelsShow'])->name('admin.hotels.show');
Route::get('/admin/hotels/{hotel}/edit', [CombinedController::class, 'adminHotelsEdit'])->name('admin.hotels.edit');
Route::put('/admin/hotels/{hotel}', [CombinedController::class, 'adminHotelsUpdate'])->name('admin.hotels.update');
Route::delete('/admin/hotels/{hotel}', [CombinedController::class, 'adminHotelsDestroy'])->name('admin.hotels.destroy');


Route::get('/tours', [CombinedController::class, 'listTravelPackages'])->name('admin.tour.index');
    Route::get('/tours/create', [CombinedController::class, 'showCreateTravelPackageForm'])->name('admin.tour.create');
    Route::post('/tours', [CombinedController::class, 'createTravelPackage'])->name('admin.tour.store');
    Route::get('/tours/{id}', [CombinedController::class, 'showTravelPackageDetails'])->name('admin.tour.show');
    Route::get('/tours/{id}/edit', [CombinedController::class, 'showEditTravelPackageForm'])->name('admin.tour.edit');
    Route::put('/tours/{id}', [CombinedController::class, 'updateTravelPackage'])->name('admin.tour.update');
    Route::delete('/tours/{id}', [CombinedController::class, 'deleteTravelPackage'])->name('admin.tour.destroy');
    Route::get('/tours', [CombinedController::class, 'adminToursIndex'])->name('tours.index');

    Route::delete('/admin/users/{id}', [CombinedController::class, 'adminUsersDestroy'])->name('admin.users.destroy');
    Route::get('/admin/users', [CombinedController::class, 'adminUsersIndex'])->name('admin.users.index');


    Route::get('/audit-logs', [CombinedController::class, 'adminAuditLogsIndex'])->name('audit_logs.index');
    Route::get('/user-auth-logs', [CombinedController::class, 'adminUserAuthLogsIndex'])->name('user_auth_logs.index');
    Route::get('/user-activity-logs', [CombinedController::class, 'adminUserActivityLogsIndex'])->name('user_activity_logs.index');
    Route::get('/admin-activity-logs', [CombinedController::class, 'adminActivityLogsIndex'])->name('admin_activity_logs.index');

    Route::get('/admin/logs', [CombinedController::class, 'adminLogsIndex'])->name('admin.logs.index');


Route::post('/admin/gallery', [CombinedController::class, 'galleryStore'])->name('admin.gallery.store');
Route::get('/admin/gallery', [CombinedController::class, 'galleryIndex'])->name('admin.gallery.index');
Route::get('/admin/gallery/create', [CombinedController::class, 'createGallery'])->name('admin.gallery.create');
Route::get('/admin/gallery/{id}/edit', [CombinedController::class, 'galleryEdit'])->name('admin.gallery.edit');
Route::delete('/admin/gallery/{id}', [CombinedController::class, 'galleryDestroy'])->name('admin.gallery.destroy');
Route::get('/gallery', [CombinedController::class, 'galleryIndex'])->name('user.gallery.index');


    