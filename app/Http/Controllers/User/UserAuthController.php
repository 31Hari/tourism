<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserAuthController extends Controller
{
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

    public function dashboard()
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
}
