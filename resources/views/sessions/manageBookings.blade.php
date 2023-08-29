@extends('layouts.app')

@section('content')
    <h1>Manage Bookings</h1>
    @foreach($bookings as $booking)
        <p>{{ $booking->status }}</p>
    @endforeach
@endsection
