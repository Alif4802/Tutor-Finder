@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Sessions Management') }}</div>

                    <div class="card-body">
                        <h3>Your Upcoming Sessions</h3>
                        <!-- Loop through the sessions and display them -->
                        <!-- @foreach($sessions as $session)
                            <div>
                                <strong>{{ $session->subject }}</strong>
                                <span>{{ $session->date }}</span>
                                <span>{{ $session->time }}</span>
                            </div>
                        @endforeach -->

                        <h3>Manage Booking Requests/Offers</h3>
                        <a href="{{ route('sessions.manageBookings') }}" class="btn btn-primary">Manage Bookings</a>

                        <h3>Reminders and Notifications</h3>
                        <a href="{{ route('sessions.reminders') }}" class="btn btn-warning">View Reminders</a>

                        <h3>Availability</h3>
                        <a href="{{ route('sessions.availability') }}" class="btn btn-success">Check Availability</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
