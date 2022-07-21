<?php

namespace App\Http\Controllers\Front;
use App\Helper\Media;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Models\City;
use App\Models\Models\Item;
use App\Models\Models\ItemImage;
use App\Models\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    use Media;
    public function index(Request $request)
    {
        $search = $request->query('search');
        $country_id = $request->query('country_id') > 0 ? $request->query('country_id') : -1;
        $city_id = $request->query('city_id') > 0 ? $request->query('city_id') : -1;
        $category_id = $request->query('category_id') > 0 ? $request->query('category_id') : -1;
        $paginate = $request->query('paginate') ? $request->query('paginate') : 15;
        //echo $country_id."        ";
        $items = ($search || $category_id > 0 || $country_id > 0 || $city_id > 0) ? Item::where(function ($query) use($search, $country_id, $category_id, $city_id) {
            if($city_id > 0)
                $query = $query->where('city_id', $city_id);
            elseif($country_id > 0){
                    $ids = City::select('id')->where('country_id', $country_id)->get()->toArray();
                    $query = $query->whereIn('city_id', $ids);
            }
            if($category_id > 0)
                $query = $query->where('category_id', $category_id);
            if($search){
                    $query = $query->where('title', 'Like', '%'.$search.'%') || $query->Where('description', 'Like', '%'.$search.'%');
                }
        })->paginate($paginate):Item::paginate($paginate);

        return view('front.home', compact('items', 'search', 'category_id', 'country_id', 'city_id', 'paginate'));
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

    public function contact()
    {
        $contact = Contact::first();

        if(!$contact){
            $this->flashMessage('warning', 'contact not found!', 'danger');
            return redirect()->route('index');
        }


        return view('front.contact',compact('contact'));
    }

    public function donate()
    {
        return view('front.donate');
    }

    public function store(Request $request)
    {

        $user = User::where('mobile', $request['mobile'])->first();
        if($user){
            $user->name = $request['donor_name'];
            $user->mobile = $request['mobile'];
            $user->email = $request['email'];
            $user->updated_at = Carbon::now();
            $user->save();
        }else{
            $user = new User();
            $user->name = $request['donor_name'];
            $user->mobile = $request['mobile'];
            $user->email = $request['email'];
            $user->role = 3;
            $user->password = bcrypt('Pass@123');
            $user->avatar = 'img/config/nopic.png';
            $user->active = 0;
            $user->created_at = Carbon::now();
            $user->updated_at = Carbon::now();
            $user->save();
        }
        if($request->hasFile('files')){
            $item = Item::create([
                'user_id' => $user->id,
                'category_id' => $request['category_id'],
                'city_id' => $request['city_id'],
                'address' => $request['address'],
                'title' => $request['title'],
                'description' => $request['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $images = $request->file('files');
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
        $this->flashMessage('check', trans('front.success_msg'), 'success');

        return redirect()->route('donate', '#donate-form');
    }

    public function item($id){
        $item = Item::find($id);
        return view('front.item', compact('item'));
    }
}
