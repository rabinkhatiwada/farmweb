@extends('admin.index')

@section('title', 'Manage Sliders')

@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Sliders</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Slider Lists</h3>
                <a class="btn btn-primary" href="{{ route('admin.sliders.create') }}">Add new</a>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Image</th>
                            <th>Button Text</th>
                            <th>Button Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>
                                    @if ($slider->image)
                                        <img src="{{ asset('slider_images/' . $slider->image) }}" alt="{{ $slider->title }}"
                                            style="width: 50px; height: 50px; object-fit: cover; border:1px solid black;">
                                    @else
                                        <i class="fa fa-image"></i>
                                    @endif
                                </td>
                                <td>{{ $slider->button_text }}</td>
                                <td>{{ $slider->button_link }}</td>
                                <td>
                                    <a href="{{ route('admin.sliders.edit', ['slider' => $slider->id]) }}" class="btn btn-primary btn-sm my-1">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <form id="deleteForm" action="{{ route('admin.sliders.destroy', ['slider' => $slider->id]) }}" method="POST" style="display:inline-block;">
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
            return confirm('Are you sure you want to delete this slider?');
        }
    </script>
@endsection
