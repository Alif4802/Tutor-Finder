<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingRequestNotification;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the calendar and available sessions
    public function index()
    {
        // Fetch available sessions from the database
        // $sessions = Session::where('user_id', Auth::id())->get();
        return view('sessions.index'); //, compact('sessions'));
    }

    // Manage booking requests and offers
    public function manageBookings()
    {
        // Fetch booking requests and offers from the database
        // $bookings = Booking::where('user_id', Auth::id())->get();
        return view('sessions.manageBookings'); //, compact('bookings'));
    }

    // Show reminders and notifications
    public function reminders()
    {
        // Fetch reminders and notifications from the database
        // $reminders = Reminder::where('user_id', Auth::id())->get();
        return view('sessions.reminders'); //, compact('reminders'));
    }

    // Accept a booking request or offer
    public function acceptBooking(Request $request, $bookingId)
    {
        // Logic to accept a booking request
        // $booking = Booking::find($bookingId);
        // $booking->status = 'accepted';
        // $booking->save();

        // Send notification to the other party
        // Notification::send($booking->otherParty, new BookingRequestNotification('Booking Accepted'));

        return redirect()->route('sessions.manageBookings')->with('status', 'Booking accepted.');
    }

    // Reject a booking request or offer
    public function rejectBooking(Request $request, $bookingId)
    {
        // Logic to reject a booking request
        // $booking = Booking::find($bookingId);
        // $booking->status = 'rejected';
        // $booking->save();

        // Send notification to the other party
        // Notification::send($booking->otherParty, new BookingRequestNotification('Booking Rejected'));

        return redirect()->route('sessions.manageBookings')->with('status', 'Booking rejected.');
    }

    // Show availability of tutors/students
    public function showAvailability()
    {
        // Fetch availability from the database
        // $availability = Availability::all();
        return view('sessions.availability'); //, compact('availability'));
    }
}
