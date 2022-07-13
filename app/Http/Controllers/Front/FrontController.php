<?php

namespace App\Http\Controllers\Front;
use App\Helper\Media;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Models\Page;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    use Media;
    public function index(Request $request)
    {
        return view('front.home');
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if(!$page){
            $this->flashMessage('warning', 'Page not found!', 'danger');
            return redirect()->route('index');
        }


        return view('front.page',compact('page'));
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
                       'ar_name' => $request['ar_name'],
                       'name' => $request['name'],
                       'description' => $request['description'],
                       'ar_description' => $request['ar_description'],
                       'image' => $fileData['filePath'],
                       'created_at' => Carbon::now(),
                       'updated_at' => Carbon::now()
                    ]);
        }else{
            $page = Page::create($request->all());

        }

        $this->flashMessage('check', 'Page successfully added!', 'success');

        return redirect()->route('page.create');
    }

}
