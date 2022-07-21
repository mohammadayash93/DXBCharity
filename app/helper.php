<?php

use App\Models\Contact;
use App\Models\Models\Category;
use App\Models\Models\City;
use App\Models\Models\Country;
use App\Models\Models\Item;
use App\Models\Models\Page;
use App\Models\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

function get_locale()
{
    return LaravelLocalization::getCurrentLocale();
}

function print_role_name($id){
    echo $id == 1 ? '<b style="color: #17a2b8">Admin</b>' : '<b style="color: #6c757d">Donator</b>';
}

function get_role_name($id){
    return $id == 1 ? 'Admin' : 'Donator';
}

function get_contact(){
    return Contact::first();
}
function get_users(){
    return User::all();
}

function get_countries(){
    return Country::all();
}

function get_cities(){
    return City::all();
}


function get_categories(){
    return Category::all();
}

function get_cities_by_country_id($id){
    return City::where('country_id', $id)->get();
}

function get_menu_pages(){
    return Page::where('is_menu', 1)->orderBy('order_number')->get();
}

function print_value($obj, $attr){
    switch($attr){
        case 'name':
            return get_locale() == 'ar' ? $obj->ar_name : $obj->name;
            break;
        case 'description':
            return get_locale() == 'ar' ? $obj->ar_description : $obj->description;
            break;

            default:
                return '';

        }
}

function print_address($obj){
    $address = get_locale() == 'ar' ? $obj->city->country->ar_name . ' - ' . $obj->city->ar_name . ' - ' . $obj->address : $obj->address . ', ' . $obj->city->name . ', ' . $obj->city->country->name;
    return $address;
}

function similar_items($item){
    $itemscategory = Item::where('id', '!=', $item->id)->where('category_id', $item->category_id)->take(3)->get();
    if(count($itemscategory) > 2){
        return $itemscategory;
    }else{
        $itemcity = Item::where('id', '!=', $item->id)->where('city_id', $item->city_id)->take(3)->get();
        if(count($itemcity)>2){
            return $itemcity;
        }else{
            $cities = City::select('id')->where('country_id', $item->city->country_id)->get();
            $itemscountry = Item::where('id', '!=', $item->id)->where('city_id', 'in' ,$cities)->take(3)->get();
            if(count($itemscountry)>2){
                return $itemscountry;
            }else{
                return Item::where('id', '!=', $item->id)->orderBy('created_at', 'desc')->take(3)->get();
            }
        }
    }
}
?>
