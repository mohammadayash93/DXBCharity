<?php

namespace App\Http\Controllers\Item;

use App\Helper\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Models\Models\Category;
use App\Models\Models\City;
use App\Models\Models\Country;
use App\Models\Models\Item;
use App\Models\Models\ItemImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    use Media;
    public function index(Request $request)
    {
        $country_id = $request->query('country_id');
        $city_id = $request->query('city_id');
        $user_id = $request->query('user_id');
        $category_id = $request->query('category_id');
        //echo $country_id."        ";
        $items = ($category_id > 0 || $country_id > 0 || $city_id > 0 || $user_id > 0) ? Item::where(function ($query) use($country_id, $category_id, $city_id, $user_id) {
            if($country_id > 0){
                $ids = City::select('id')->where('country_id', $country_id)->get();
                $query = $query->whereIn('city_id', $ids);
            }
            if($city_id > 0)
                $query = $query->where('city_id', $city_id);
            if($user_id > 0)
                $query = $query->where('user_id', $user_id);
            if($category_id > 0)
                $query = $query->where('category_id', $category_id);
        })->paginate(15):Item::paginate(15);

        //print_r($cities);
        //die();
        return view('items.index', compact('items', 'country_id', 'city_id', 'category_id', 'user_id'));
    }

    public function show($id)
    {
        //$this->authorize('show-role', User::class);

        $item = Item::find($id);

        if(!$item){
            $this->flashMessage('warning', 'Item not found!', 'danger');
            return redirect()->route('item');
        }


        return view('items.show',compact('item'));
    }

    public function create()
    {
        //$this->authorize('create-role', Role::class);
        return view('items.create');
    }

    public function store(StoreItemRequest $request)
    {
        //$this->authorize('create-role', Role::class);

        //print_r($request->file('images')); die();
        $item = Item::create([
            'user_id' => $request['user_id'],
            'category_id' => $request['category_id'],
            'city_id' => $request['city_id'],
            'address' => $request['address'],
            'title' => $request['title'],
            'description' => $request['description'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $image){
                $fileData = $this->uploads($image,'item/'.$item->id.'/');

                $item_image = new ItemImage();
                $item_image->item_id = $item->id;
                $item_image->image = $fileData['filePath'];
                $item_image->created_at = Carbon::now();
                $item_image->updated_at = Carbon::now();
                $item_image->save();
            }
        }
        $this->flashMessage('check', 'Item successfully added!', 'success');

        return redirect()->route('item.create');
    }

    public function edit($id)
    {
        //$this->authorize('edit-role', Role::class);

        $item = Item::find($id);

        if(!$item){
            $this->flashMessage('warning', 'Item not found!', 'danger');
            return redirect()->route('item');
        }


        return view('items.edit',compact('item'));
    }

    public function update(UpdateItemRequest $request,$id)
    {
        //$this->authorize('edit-role', User::class);

        $item = Item::find($id);

        if(!$item){
            $this->flashMessage('warning', 'Item not found!', 'danger');
            return redirect()->route('item');
        }

        $item->update($request->all());


        $this->flashMessage('check', 'Item successfully updated!', 'success');

        return redirect()->route('item');
    }

    public function destroy($id)
    {
        //$this->authorize('destroy-role', Role::class);

        $item = Item::find($id);

        if(!$item){
            $this->flashMessage('warning', 'Item not found!', 'danger');
            return redirect()->route('item');
        }

        $item->delete();

        $this->flashMessage('check', 'Item successfully deleted!', 'success');

        return redirect()->route('item');
    }
}
