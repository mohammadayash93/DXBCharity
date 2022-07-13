<?php

namespace App\Http\Controllers\Page;

use App\Helper\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use Media;
    public function index(Request $request)
    {
        $pages = Page::paginate(15);

        return view('pages.index', compact('pages'));
    }

    public function show($id)
    {
        //$this->authorize('show-role', User::class);

        $page = Page::find($id);

        if(!$page){
            $this->flashMessage('warning', 'Page not found!', 'danger');
            return redirect()->route('page');
        }


        return view('pages.show',compact('page'));
    }

    public function create()
    {
        //$this->authorize('create-role', Role::class);


        return view('pages.create');
    }

    public function store(StorePageRequest $request)
    {
        //$this->authorize('create-role', Role::class);


        if($file = $request->file('image')) {
            $fileData = $this->uploads($file,'page/');
            $page = Page::create([
                       'slug' => Str::slug($request['name']),
                       'ar_name' => $request['ar_name'],
                       'name' => $request['name'],
                       'description' => $request['description'],
                       'ar_description' => $request['ar_description'],
                       'image' => $fileData['filePath'],
                       'is_menu' => $request['is_menu'] ? 1: 0,
                       'order_number' => $request['order_number'],
                       'created_at' => Carbon::now(),
                       'updated_at' => Carbon::now()
                    ]);
        }else{
            $page = Page::create($request->all());

        }

        $this->flashMessage('check', 'Page successfully added!', 'success');

        return redirect()->route('page.create');
    }

    public function edit($id)
    {
        //$this->authorize('edit-role', Role::class);

        $page = Page::find($id);

        if(!$page){
            $this->flashMessage('warning', 'Page not found!', 'danger');
            return redirect()->route('page');
        }


        return view('pages.edit',compact('page'));
    }

    public function update(UpdatePageRequest $request,$id)
    {
        //$this->authorize('edit-role', User::class);

        $page = Page::find($id);

        if(!$page){
            $this->flashMessage('warning', 'Page not found!', 'danger');
            return redirect()->route('page');
        }

        if($request->image != ''){
            $path = public_path().'/';

            //code for remove old file
            if($page->image != ''  && $page->image != null){
                 $file_old = $path.$page->image;
                 unlink($file_old);
            }
            $fileData = $this->uploads($request->image,'page/');

            $page->image = $fileData['filePath'];
        }

        $page->ar_name = $request->ar_name;
        $page->name = $request->name;
        $page->description = $request->description;
        $page->ar_description = $request->ar_description;
        $page->order_number = $request->order_number;
        $page->is_menu = $request->is_menu ? 1 : 0;
        $page->updated_at = Carbon::now();
        $page->save();


        $this->flashMessage('check', 'Page successfully updated!', 'success');

        return redirect()->route('page');
    }

    public function destroy($id)
    {
        //$this->authorize('destroy-role', Role::class);

        $page = Page::find($id);

        if(!$page){
            $this->flashMessage('warning', 'Page not found!', 'danger');
            return redirect()->route('page');
        }
        $path = public_path().'/';

        //code for remove old file
        if($page->image != ''  && $page->image != null){
             $file_old = $path.$page->image;
             unlink($file_old);
        }

        $page->delete();

        $this->flashMessage('check', 'Page successfully deleted!', 'success');

        return redirect()->route('page');
    }
}
