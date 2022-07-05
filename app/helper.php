<?php

use App\Models\Models\Category;
use App\Models\Models\City;
use App\Models\Models\Country;
use App\Models\User;

function print_role_name($id){
    echo $id == 1 ? '<b style="color: #17a2b8">Admin</b>' : '<b style="color: #6c757d">Donator</b>';
}

function get_role_name($id){
    return $id == 1 ? 'Admin' : 'Donator';
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

?>
