@extends('layouts.app')
@section('content')
    {{-- <body>
        <div class="py-12">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>All Category</h3>
                        <a href="{{ route('category.create') }}"><button class="btn btn-primary">Add
                                category</button></a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $key => $row)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $row->category_name }}</td>
                                        <td>{{ $row->category_slug }}</td>
                                        <td><a href="{{ route('category.edit', $row->id) }}">
                                                <button class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="{{ route('category.delete', $row->id) }}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </body> --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Category Table</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All category</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $key => $row)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $row->category_name }}</td>
                                                <td>{{ $row->category_slug }}</td>
                                                <td><a href="{{ route('category.edit', $row->id) }}">
                                                        <button class="btn btn-info">Edit</button>
                                                    </a>
                                                    <a href="{{ route('category.delete', $row->id) }}" id="delete">
                                                        <button class="btn btn-danger">Delete</button>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
