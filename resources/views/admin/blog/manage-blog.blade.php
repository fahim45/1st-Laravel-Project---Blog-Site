@extends('admin.master');
@section('title')
    Manage Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">In Manage Blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-light">
                @if($message = Session::get('message'))
                    <h3 class="text-center text-success">{{ $message }}</h3>
                @endif
                <table class="table table-bordered table-responsive table-hover">
                    <tr class="bg-info">
                        <th>SL</th>
                        <th>Blog Title</th>
                        <th>Author Name</th>
                        <th>Category Name</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $blog->blog_title }}</td>
                            <td>{{ $blog->author_name }}</td>
                            <td>{{ $blog->category_name }}</td>
                            <td>{{ $blog->publication_status==1? 'Published':'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/blog/view-blog/'.$blog->id) }}" class="btn btn-primary btn-sm" title="View">
                                    <span class="fa fa-fw fa-eye"></span>
                                </a>
                                @if($blog->publication_status==1)
                                    <a href="{{ url('/blog/unpublished-blog/'.$blog->id) }}" class="btn btn-info btn-sm" title="Published">
                                        <span class="fa fa-fw fa-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{ url('/blog/published-blog/'.$blog->id) }}" class="btn btn-warning btn-sm" title="UnPublished">
                                        <span class="fa fa-fw fa-arrow-down"></span>
                                    </a>
                                @endif
                                <a href="{{ url('/blog/edit-blog/'.$blog->id) }}" class="btn btn-success btn-sm" title="Edit">
                                    <span class="fa fa-fw fa-edit"></span>
                                </a>
                                <a href="{{ url('/blog/delete-blog/'.$blog->id) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm" title="Delete">
                                    <span class="fa fa-fw fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

@endsection