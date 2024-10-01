<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Plan;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CombinedController extends Controller
{
    // User Authentication
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['nullable', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'gender' => ['required', 'in:male,female'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'aadhar_number' => ['required', 'string', 'size:12'],
            'driving_license' => ['nullable', 'string', 'regex:/^[A-Z]{2}\d{13}$/'],
            'voter_id' => ['nullable', 'string', 'regex:/^[A-Z]{3}\d{7}$/'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'aadhar_number' => $request->aadhar_number,
            'driving_license' => $request->driving_license,
            'voter_id' => $request->voter_id,
            'role' => 'user',
            'is_active' => true,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.login')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the authenticated user is an admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // If not an admin, redirect to user dashboard
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }


    // Admin Dashboard
    public function adminDashboard()
    {
        return view('admin.dashboard.index');
    }



    public function userDashboard()
    {
        return view('user.dashboard.index');
    }


    // Bookings
    public function bookingsIndex()
    {
        return view('user.bookings.index');
    }

    public function bookingsCreate()
    {
        return view('user.bookings.create');
    }

    public function bookingsShow($id)
    {
        return view('user.bookings.show', compact('id'));
    }

    // Reviews
    public function reviewsIndex()
    {
        return view('user.reviews.index');
    }

    public function reviewsCreate()
    {
        return view('user.reviews.create');
    }

    public function reviewsEdit($id)
    {
        return view('user.reviews.edit', compact('id'));
    }

    // Profile
    public function profileIndex()
    {
        return view('user.profile.index');
    }

    public function profileEdit()
    {
        return view('user.profile.edit');
    }

    // Hotels
    public function hotelsIndex()
    {
        return view('user.hotels.index');
    }

    public function hotelsShow($id)
    {
        return view('user.hotels.show', compact('id'));
    }

    // Tours
    public function toursIndex()
    {
        return view('user.tours.index');
    }

    public function toursShow($id)
    {
        return view('user.tours.show', compact('id'));
    }

    // Travel Planner
    public function travelPlannerIndex()
    {
        return view('user.travel_planner.index');
    }

    public function travelPlannerCreate()
    {
        return view('user.travel_planner.create');
    }

    public function travelPlannerEdit($id)
    {
        return view('user.travel_planner.edit', compact('id'));
    }

    // Gallery
    public function galleryIndex()
    {
        return view('user.gallery.index');
    }

    // Wishlist
    public function wishlistIndex()
    {
        return view('user.wishlist.index');
    }

    // Support
    public function supportIndex()
    {
        return view('user.support.index');
    }

    public function supportCreate()
    {
        return view('user.support.create');
    }

    // Notifications
    public function notificationsIndex()
    {
        return view('user.notifications.index');
    }

    // Payments
    public function paymentsIndex()
    {
        return view('user.payments.index');
    }

    public function paymentsMethods()
    {
        return view('user.payments.methods');
    }

    // Add these new methods for admin routes

       // Categories Management
       public function adminCategoriesIndex()
       {
           $plans = Plan::all(); // Fetch all plans
           $categories = Category::with('parent', 'plans')->get(); // Fetch all categories with their parent and associated plans
           $category_plans = DB::table('category_plan')
               ->join('categories', 'category_plan.category_id', '=', 'categories.id')
               ->join('plans', 'category_plan.plan_id', '=', 'plans.id')
               ->select('category_plan.id', 'category_plan.category_id', 'category_plan.plan_id', 'categories.name as category_name', 'plans.name as plan_name')
               ->get();
       
           return view('admin.categories.index', compact('plans', 'categories', 'category_plans'));
       }

   
       public function adminCategoriesCreate()
       {
           $plans = Plan::all(); // Fetch plans for category creation
           return view('admin.categories.create', compact('plans'));
       }
   
       public function adminCategoriesStore(Request $request)
       {
           $validatedData = $request->validate([
               'name' => 'required|string|max:100',
               'description' => 'nullable|string',
           ]);
       
           $category = Category::create([
               'name' => $validatedData['name'],
               'description' => $validatedData['description'],
           ]);
       
           return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
       }
   
       public function adminCategoriesEdit(Category $category)
       {
           $plans = Plan::all(); // Fetch plans for category edit
           return view('admin.categories.edit', compact('category', 'plans'));
       }
   
       public function adminCategoriesUpdate(Request $request, Category $category)
       {
           $validatedData = $request->validate([
               'name' => 'required|string|max:100',
               'description' => 'nullable|string',
           ]);
       
           $category->update([
               'name' => $validatedData['name'],
               'description' => $validatedData['description'],
           ]);
       
           return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
       }
   
       public function adminCategoriesDestroy(Category $category)
       {
           $category->delete();
           return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
       }

       public function store(Request $request)
       {
           $request->validate([
               'plan_id' => 'required|exists:plans,id',
               'category_id' => 'required|exists:categories,id',
           ]);
       
           // Check if the relationship already exists
           $exists = DB::table('category_plan')
               ->where('plan_id', $request->plan_id)
               ->where('category_id', $request->category_id)
               ->exists();
       
           if (!$exists) {
               DB::table('category_plan')->insert([
                   'plan_id' => $request->plan_id,
                   'category_id' => $request->category_id,
                   'created_at' => now(),
                   'updated_at' => now(),
               ]);
       
               return redirect()->route('admin.categories.index')->with('success', 'Category assigned to plan successfully.');
           }
       
           return redirect()->route('admin.categories.index')->with('error', 'This category is already assigned to the plan.');
       }

   
    public function adminLocationsIndex()
    {
        return view('admin.locations.index');
    }

    public function adminHotelsIndex()
    {
        return view('admin.hotels.index');
    }

    public function adminToursIndex()
    {
        return view('admin.tours.index');
    }

    public function adminBlogsIndex()
    {
        return view('admin.blogs.index');
    }

    public function adminUsersIndex()
    {
        return view('admin.users.index');
    }

    public function adminPaymentsIndex()
    {
        return view('admin.payments.index');
    }

    public function adminSettingsGeneral()
    {
        return view('admin.settings.general');
    }

    public function adminReportsIndex()
    {
        return view('admin.reports.index');
    }

    public function adminAuditLogsIndex()
    {
        return view('admin.audit_logs.index');
    }

    public function adminGalleryIndex()
    {
        return view('admin.gallery.index');
    }

    public function adminPlansIndex()
    {
        $plans = Plan::all(); // Fetch all plans from the database
        return view('admin.plans.index', compact('plans'));
    }
    
    

    public function adminPlansEdit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function adminPlansUpdate(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'features' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $plan->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'features' => $validatedData['features'],
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.');
    }
    public function adminPlansDestroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully.');
    }

    public function adminPlansCreate()
    {
        return view('admin.plans.create');
    }

    public function create()
{
    $plans = Plan::all();
    $categories = Category::all();
    return view('admin.categories.createplan', compact('plans', 'categories'));
}


    public function adminPlansStore(Request $request)
    {
        try {
            Log::info('Received request data: ' . json_encode($request->all()));

            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'features' => 'nullable|string',
                'is_active' => 'boolean',
            ]);

            // Create a new plan
            $plan = Plan::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'features' => $validatedData['features'],
                'is_active' => $request->has('is_active'),
            ]);

            Log::info('Plan saved successfully with ID: ' . $plan->id);

            // Redirect to plans index with success message
            return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating plan: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Error creating plan. Please try again.')->withInput();
        }
    }


}
