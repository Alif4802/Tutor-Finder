@extends('layouts.app')

@section('content')
    <h1>Sessions</h1>
    @foreach($sessions as $session)
        <p>{{ $session->title }}</p>
    @endforeach
@endsection
