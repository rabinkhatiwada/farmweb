@extends('admin.index')
@section('title', 'Messages')
@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Messages</li>
@endsection

@section('content')
    <h3>Messages</h3>
    <!-- Display validation errors if any -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <!-- Display success message if any -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($messages->isEmpty())
        <p>No messages found.</p>
    @else
        <div class="table-responsive">
            <table class="table" id="myTable">
                <thead class="msg-table-head">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ implode(' ', array_slice(str_word_count($message->msg, 1), 0, 12)) }}...</td>
                            <td>{{ $message->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-primary btn-sm">View Detail</a>
                                <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
@endsection
