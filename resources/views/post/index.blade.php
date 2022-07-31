@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Post Table</li>
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
                                <h3 class="card-title">All Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">subcategory Name</th>
                                            <th scope="col">User name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Publish date</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($post as $key => $row)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $row->category->category_name }}</td>
                                                <td>{{ $row->subcategory->subcategory_name }}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ date('d F, Y', strtotime($row->post_date)) }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->tags }}</td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <span class="badge badge-info">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td> <img src="{{ asset($row->image) }}" alt="" width="60px"
                                                        height="60px"> </td>
                                                <td><a href="{{ route('post.edit', $row->id) }}">
                                                        <button class="btn btn-info">Edit</button>
                                                    </a>
                                                    <a href="{{ route('post.delete', $row->id) }}" id="delete">
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
