@extends('front.master')
@section('title')
    Home
@endsection

@section('content')
    @foreach($blogs as $blog)
    <div class="article">
        <h2>{{$blog->blog_title}}</h2>
        <p class="infopost">Posted on <span class="date">11 sep 2018</span> by <a href="#">{{$blog->author_name}}</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">{{$blog->category_name}}</a><a href="#" class="com">Comments <span>11</span></a></p>
        <div class="clr"></div>
        <div class="img"><img src="{{asset($blog->blog_image)}}" width="177" height="213" alt="" class="fl" /></div>
        <div class="post_content">
            {!! $blog->blog_description !!}
            <p class="spec"><a href="#" class="rm">Read more &raquo;</a></p>
        </div>
        <div class="clr"></div>
    </div>
    @endforeach
    <p class="pages">{{ $blogs->links() }}</p>
    @endsection