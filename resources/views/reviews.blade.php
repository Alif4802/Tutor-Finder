
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Review Moderation</h1>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">Create New Review</a>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->user_id }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->feedback }}</td>
                        <td>{{ $review->status }}</td>
                        <td>
                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('reviews.approve', $review->id) }}" class="btn btn-success">Approve</a>
                            <a href="{{ route('reviews.reject', $review->id) }}" class="btn btn-danger">Reject</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

