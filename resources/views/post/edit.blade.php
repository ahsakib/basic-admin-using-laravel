@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Your Title"
                                        value="{{ $post->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Choose the category</label>
                                    <select name="subcategory_id" id="category" class="form-control">
                                        <option value="" disabled selected>Choose category</option>
                                        @foreach ($category as $cat)
                                            @php
                                                $subcategories = App\Models\sub_catagory::where('category_id', $cat->id)->get();
                                            @endphp
                                            <option disabled class="text-info">
                                                {{ $cat->category_name }}
                                            </option>
                                            @foreach ($subcategory as $sub)
                                                <option value="{{ $sub->id }}"
                                                    @if ($sub->id == $post->subcategory_id) selected @endif>
                                                    --{{ $sub->subcategory_name }}</option>
                                            @endforeach
                                        @endforeach


                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="subcategory">Choose the Subcategory</label>
                                    <select name="Subcategory" id="subcategory" class="form-control">
                                        <option value="">
                                            Example one
                                        </option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="post_date">Post date</label>
                                    <input type="date" class="form-control" name="post_date"
                                        value="{{ $post->post_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" name="tags" required
                                        value="{{ $post->tags }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description"cols="30" rows="4" class="form-control summernote">{{ $post->description }}</textarea>
                                </div>
                                <div class="text-center">
                                    <img id="output_image" style="max-width: 150px;" name="old_image"
                                        src="{{ asset($post->image) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="image" accept="image/*" onchange="preview_image(event)">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            {{-- <input type="hidden" name="old_image" value="{{ asset($post->image) }}"> --}}
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status"
                                        value="1" @if ($post->status == 1) checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">Publish now</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.card -->
@endsection
