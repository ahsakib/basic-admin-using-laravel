@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('subcategory.index') }}"><button class="btn btn-info">all Subcategory</button></a>
                    <form action="{{ route('subcategory.update', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chosse SubCategory Name</label>
                            <select name="subcategory_choose" class="form-control" id="exampleInputEmail1">
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}" @if ($row->id == $data->category_id) selected @endif>
                                        {{ $row->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SubCategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Your subcategory"
                                value="{{ $data->subcategory_name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>


    @push('script')
    @endpush
@endsection
