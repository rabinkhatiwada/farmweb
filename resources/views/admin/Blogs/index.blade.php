@extends('admin.index')
@section('title', 'Manage Blogs')
@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">{{$types[$type][0]}}</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>{{$types[$type][1]}} Lists</h3>
                <a class="btn btn-primary" href="{{route('admin.blogs.store', ['type' => $type])}}">Add new</a>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            @if ($types[$type][3])
                                <th style="width: 20%;">{{$types[$type][1]}} Image</th>
                            @endif
                            <th style="width: 65%;">{{$types[$type][1]}} Title</th>
                            
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                @if ($types[$type][3])
                                    <td style="width: 20%;">
                                        @if ($blog->image1)
                                            <img src="{{ asset('blog_images/' . $blog->image1) }}" alt="{{ $blog->title }}" style="width: 100px; height: 75px; object-fit: cover;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                @endif
                                <td style="width: 65%;"><strong>{{ $blog->title }}</strong></td>

                                <td style="width: 15%;">
                                    <a href="{{ route('admin.blogs.edit', ['blog' => $blog->id, 'type' => $type]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.blogs.delete', ['blog' => $blog->id, 'type' => $type]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

@section('css')

@endsection
