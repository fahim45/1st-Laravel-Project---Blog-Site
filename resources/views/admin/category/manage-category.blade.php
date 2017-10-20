@extends('admin.master');
@section('title')
    Manage Category
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">In Manage Category</h1>
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
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td> {{--For Category Serial no--}}
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->publication_status==1? 'Published':'Unpublished' }}</td>
                            <td>
                                @if($category->publication_status==1)
                                <a href="{{ url('/category/unpublished-category/'.$category->id) }}" class="btn btn-info btn-sm" title="Published">
                                    <span class="fa fa-fw fa-arrow-up"></span>
                                </a>
                                @else
                                <a href="{{ url('/category/published-category/'.$category->id) }}" class="btn btn-warning btn-sm" title="UnPublished">
                                    <span class="fa fa-fw fa-arrow-down"></span>
                                </a>
                                @endif
                                <a href="{{ url('/category/edit-category/'.$category->id) }}" class="btn btn-success btn-sm" title="Edit">
                                    <span class="fa fa-fw fa-edit"></span>
                                </a>
                                <a href="{{ url('/category/delete-category/'.$category->id) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm" title="Delete">
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