<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }
    public function saveCategoryInfo(Request $request){
//        return $request->all();

        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Elequent ORM (1st Process)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
        /*$category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();*/

        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Elequent ORM (2nd Process)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
        Category::create($request->all());


        /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Query Builder<<<<<<<<<<<<<<<<<<<<<<<<*/
/*        DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'publication_status' => $request->publication_status
        ]);*/

        return redirect('/category/add-category')->with('message', 'Category Info Added Successfully');
    }

    public function manageCategoryInfo(){
        $categories = Category::orderBy('id', 'desc')->get(); /*Using Order By DESC*/
//        $categories = Category::all(); /*Using Order By ASC*/
        return view('admin.category.manage-category', ['categories'=>$categories]);
    }
    public function unpublishedCategoryInfo($id){
        $categoryById = Category::find($id);
        $categoryById->publication_status = 0;
        $categoryById->save();

        return redirect('/category/manage-category')->with('message', 'Category Info unpublished Successfully');
    }
    public function publishedCategoryInfo($id){
        $categoryById = Category::find($id);
        $categoryById->publication_status = 1;
        $categoryById->save();

        return redirect('/category/manage-category')->with('message', 'Category Info published Successfully');
    }
    public function editCategoryInfo($id){
        $categoryById = Category::find($id);
        return view('admin.category.edit-category', ['category'=>$categoryById]);
    }
    public function updateCategoryInfo(Request $request){
        $categoryById = Category::find($request->category_id);
        $categoryById->category_name = $request->category_name;
        $categoryById->category_description = $request->category_description;
        $categoryById->publication_status = $request->publication_status;
        $categoryById->save();
        return redirect('/category/manage-category')->with('message', 'Category Info Updated Successfully.');
    }

    public function deleteCategoryInfo($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage-category')->with('message', 'Category info deleted successfully.');
    }

}
