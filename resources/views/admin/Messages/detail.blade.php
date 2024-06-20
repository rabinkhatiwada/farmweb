@extends('admin.index')
@section('title', 'View Message')

@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Messages</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Message</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Message Details
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Name:</strong> {{ $message->name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $message->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $message->phone }}</p>

            <p class="card-text">{{ $message->msg }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $message->created_at }}</p>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
