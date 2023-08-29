<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingRequestNotification;
use App\Models\Session;
use App\Models\Booking;
use App\Models\Reminder;
use App\Models\Availability;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the calendar and available sessions
    public function index()
    {
        $sessions = Session::where('user_id', Auth::id())->get();
        return view('sessions.index', compact('sessions'));
    }

    // Manage booking requests and offers
    public function manageBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('sessions.manageBookings', compact('bookings'));
    }

    // Show reminders and notifications
    public function reminders()
    {
        $reminders = Reminder::where('user_id', Auth::id())->get();
        return view('sessions.reminders', compact('reminders'));
    }

    // Accept a booking request or offer
    public function acceptBooking(Request $request, $bookingId)
    {
        $booking = Booking::find($bookingId);
        $booking->status = 'accepted';
        $booking->save();

        // Send notification to the other party
        Notification::send($booking->otherParty, new BookingRequestNotification('Booking Accepted'));

        return redirect()->route('sessions.manageBookings')->with('status', 'Booking accepted.');
    }

    // Reject a booking request or offer
    public function rejectBooking(Request $request, $bookingId)
    {
        $booking = Booking::find($bookingId);
        $booking->status = 'rejected';
        $booking->save();

        // Send notification to the other party
        Notification::send($booking->otherParty, new BookingRequestNotification('Booking Rejected'));

        return redirect()->route('sessions.manageBookings')->with('status', 'Booking rejected.');
    }

    // Show availability of tutors/students
    public function showAvailability()
    {
        $availability = Availability::all();
        return view('sessions.availability', compact('availability'));
    }
}
