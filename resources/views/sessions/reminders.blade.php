@extends('layouts.app')

@section('content')
    <h1>Reminders</h1>
    @foreach($reminders as $reminder)
        <p>{{ $reminder->message }}</p>
    @endforeach
@endsection
