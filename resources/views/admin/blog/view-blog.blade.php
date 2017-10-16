@extends('admin.master');
@section('title')
    View Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">In View Blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-light">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Blog ID</th>
                            <td>{{ $blog->id }}</td>
                        </tr>
                        <tr>
                            <th>Blog Title</th>
                            <td>{{ $blog->blog_title }}</td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td>{{ $blog->author_name }}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $blog->category_name }}</td>
                        </tr>
                        <tr>
                            <th>Blog Description</th>
                            <td>{!! $blog->blog_description !!}</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td><img src="" alt="Demo" style="height: 255px;"></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{ $blog->publication_status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection