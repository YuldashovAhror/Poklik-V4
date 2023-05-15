<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.category.crud', [
            'categories'=>$categories
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request = $request->toArray();
        
        if (!empty($request['photo'])){
            $request['photo'] = $this->photoSave($request['photo'], 'image/category');
        }
        if (!empty($request['photo2'])){
            $request['photo2'] = $this->photoSave($request['photo2'], 'image/category');
        }
        Category::create($request);
        return redirect()->route('category.index');
    }

    public function update(Request $request, $id)
    {
        $request = $request->toArray();
        
        if (!empty($request['photo'])){
            $this->fileDelete('\Category', $id, 'photo');
            $request['photo'] = $this->photoSave($request['photo'], 'image/category');
        }
        if (!empty($request['photo2'])){
            $this->fileDelete('\Category', $id, 'photo2');
            $request['photo2'] = $this->photoSave($request['photo2'], 'image/category');
        }
        Category::find($id)->update($request);
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Category', $id, 'photo');
        $this->fileDelete('\Category', $id, 'photo2');
        Category::find($id)->delete();
        return back();
    }
}
