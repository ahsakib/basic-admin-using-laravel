@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('category.index') }}"><button class="btn btn-info">All category</button></a>
                    <form action="{{ route('category.update', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $data->category_name }}">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
