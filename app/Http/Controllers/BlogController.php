<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlogInfo(){
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.add-blog',['categories'=>$categories]);
    }
    public function saveBlogInfo(Request $request){
        $this->validate($request, [
            'blog_title'=>'required|min:10|max:255',
        ]);

        $blogImage = $request->file('blog_image');
        $imageName = $blogImage->getClientOriginalName();
        $directory = 'blog-image/';
        $blogImage->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        //Blog::create($request->all());
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->author_name = $request->author_name;
        $blog->category_id = $request->category_id;
        $blog->blog_description = $request->blog_description;
        $blog->blog_image = $imageUrl;
        $blog->publication_status = $request->publication_status;
        $blog->save();

        return redirect('/blog/add-blog')->with('message', 'Blog Info Added Successfully');
    }
    public function manageBlogInfo(){
        //$blogs = Blog::all();
        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->get();
        return view('admin.blog.manage-blog',['blogs'=>$blogs]);
    }
    public function viewBlogInfo($id){
        $blogById = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->where('blogs.id',$id)
            ->first();
        return view('admin.blog.view-blog', ['blog'=>$blogById]);
    }
    public function unpublishedBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->publication_status = 0;
        $blogById->save();
        return redirect('/blog/manage-blog')->with('message', 'Blog Info Unpublished Successfully');
    }
    public function publishedBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->publication_status = 1;
        $blogById->save();
        return redirect('/blog/manage-blog')->with('message', 'Blog Info Published Successfully');
    }
    public function editBlogInfo($id){
        $blogById = Blog::find($id);
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.edit-blog', ['blog'=>$blogById, 'categories'=>$categories]);
    }
    public function updateBlogInfo(Request $request){
        $blogById = Blog::find($request->blog_id);
        $blogById->blog_title = $request->blog_title;
        $blogById->author_name = $request->author_name;
        $blogById->category_id = $request->category_id;
        $blogById->blog_description = $request->blog_description;
        $blogById->publication_status = $request->publication_status;
        $blogById->save();

        /*Blog::create($request->all());*/ /*>>>>>>>>>>how can i use this for update?*/
        return redirect('/blog/manage-blog')->with('message', 'Blog Info Updated Successfully');
    }
    public function deleteBlogInfo($id){
        $category = Blog::find($id);
        $category->delete();
        return redirect('/blog/manage-blog')->with('message', 'Blog info deleted successfully.');
    }

}
