<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('order', 'asc')->get();
        return view('backend.dashboard.teacher.academic.category.index-category',compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories,category_name',
            
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Category();
        $data->category_name = $request->category_name;
        $data->order = $request->order;

        $data->slug = Str::slug($request->category_name);
       
        $data->save();

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editsms(){
        $notification = array(
            'message' => 'You can not access this action!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


}
