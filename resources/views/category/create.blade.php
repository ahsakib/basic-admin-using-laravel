@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('category.index') }}"><button class="btn btn-info">all category</button></a>
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control @error('category_name', 'post') is-invalid @enderror"
                                name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter Your category">
                            @error('category_name')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>


    @push('script')
        <script>
            $(document).ready(function() {
                console.log("hello world");
            })
        </script>
    @endpush
@endsection
