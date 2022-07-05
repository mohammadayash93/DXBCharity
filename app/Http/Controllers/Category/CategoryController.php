<?php

namespace App\Http\Controllers\Category;

use App\Helper\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use Media;
    public function index(Request $request)
    {
        $filter = $request->query('search');
        $categories = !empty($filter) ? Category::where(function ($query) use($filter) {
            $query->where('name', 'like', '%'.$filter.'%')
                  ->orWhere('ar_name', 'like', '%'.$filter.'%');
        })->paginate(15):Category::paginate(15);

        return view('categories.index', compact('categories', 'filter'));
    }

    public function show($id)
    {
        //$this->authorize('show-role', User::class);

        $category = Category::find($id);

        if(!$category){
            $this->flashMessage('warning', 'Category not found!', 'danger');
            return redirect()->route('category');
        }


        return view('categories.show',compact('category'));
    }

    public function create()
    {
        //$this->authorize('create-role', Role::class);


        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        //$this->authorize('create-role', Role::class);


        if($file = $request->file('image')) {
            $fileData = $this->uploads($file,'category/');
            $category = Category::create([
                       'ar_name' => $request['ar_name'],
                       'name' => $request['name'],
                       'image' => $fileData['filePath'],
                       'created_at' => Carbon::now(),
                       'updated_at' => Carbon::now()
                    ]);
        }else{
            $category = Category::create($request->all());

        }

        $this->flashMessage('check', 'Category successfully added!', 'success');

        return redirect()->route('category.create');
    }

    public function edit($id)
    {
        //$this->authorize('edit-role', Role::class);

        $category = Category::find($id);

        if(!$category){
            $this->flashMessage('warning', 'Category not found!', 'danger');
            return redirect()->route('category');
        }


        return view('categories.edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request,$id)
    {
        //$this->authorize('edit-role', User::class);

        $category = Category::find($id);

        if(!$category){
            $this->flashMessage('warning', 'Category not found!', 'danger');
            return redirect()->route('category');
        }

        if($request->image != ''){
            $path = public_path().'/';

            //code for remove old file
            if($category->image != ''  && $category->image != null){
                 $file_old = $path.$category->image;
                 unlink($file_old);
            }
            $fileData = $this->uploads($request->image,'category/');

            $category->image = $fileData['filePath'];
        }

        $category->ar_name = $request->ar_name;
        $category->name = $request->name;
        $category->updated_at = Carbon::now();
        $category->save();


        $this->flashMessage('check', 'Category successfully updated!', 'success');

        return redirect()->route('category');
    }

    public function destroy($id)
    {
        //$this->authorize('destroy-role', Role::class);

        $category = Category::find($id);

        if(!$category){
            $this->flashMessage('warning', 'Category not found!', 'danger');
            return redirect()->route('category');
        }
        $path = public_path().'/';

        //code for remove old file
        if($category->image != ''  && $category->image != null){
             $file_old = $path.$category->image;
             unlink($file_old);
        }

        $category->delete();

        $this->flashMessage('check', 'Category successfully deleted!', 'success');

        return redirect()->route('category');
    }

}
