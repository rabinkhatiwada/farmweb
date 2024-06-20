@extends('admin.index')

@section('title', 'Manage Testimonials')

@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Testimonial Lists</h3>
                <a class="btn btn-primary" href="{{ route('admin.testimonials.add') }}">Add new</a>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Clients</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>
                                    {{ $testimonial->name }}
                                    @if ($testimonial->image)
                                        <img src="{{ asset('testimonial_images/' . $testimonial->image) }}"
                                            alt="{{ $testimonial->name }}"
                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border:1px solid black;">
                                    @else
                                        <i class="fa fa-user"></i>
                                    @endif
                                </td>
                                <td>{!! $testimonial->content !!}</td>
                                <td>
                                    <a href="{{ route('admin.testimonials.edit', ['testimonial' => $testimonial->id]) }}"
                                        class="btn btn-primary btn-sm my-1"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <form id="deleteForm"
                                        action="{{ route('admin.testimonials.delete', ['testimonial' => $testimonial->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm my-1" onclick="return confirmDelete();">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
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
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this testimonial?');
        }

    </script>
@endsection
