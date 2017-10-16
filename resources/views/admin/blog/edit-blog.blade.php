@extends('admin.master');
@section('title')
    Edit Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">In Edit Blog</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                @if($message = Session::get('message'))
                    <h2 class="text-center text-success">{{$message}}</h2>
                @endif
                <form class="form-horizontal" action="{{url('/blog/update-blog')}}" method="post" name="editBlog">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="col-sm-3">Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="blog_title" value="{{$blog->blog_title}}" class="form-control"/>
                            <input type="hidden" name="blog_id" value="{{$blog->id}}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Author Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="author_name" value="{{$blog->author_name}}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <select name="category_id" id="" class="form-control">
                                <option>Select Category Name</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Blog Description</label>
                        <div class="col-sm-9">
                            <textarea name="blog_description" class="form-control" id="" cols="30" rows="10">{{$blog->blog_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" id="" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Blog Info" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editBlog'].elements['category_id'].value='{{$blog->category_id}}';
        document.forms['editBlog'].elements['publication_status'].value='{{$blog->publication_status}}';
    </script>
@endsection