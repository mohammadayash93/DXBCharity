<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Requests\Country\StoreCityRequest;
use App\Http\Requests\Country\UpdateCityRequest;
use App\Models\Models\City;
use App\Models\Models\Country;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('search');
        $countries = !empty($filter) ? Country::where(function ($query) use($filter) {
            $query->where('name', 'like', '%'.$filter.'%')
                  ->orWhere('ar_name', 'like', '%'.$filter.'%')
                  ->orWhere('phonecode', 'like', '%'.$filter.'%')
                  ->orWhere('iso2', 'like', '%'.$filter.'%')
                  ->orWhere('iso3', 'like', '%'.$filter.'%');
        })->paginate(15):Country::paginate(15);

        return view('countries.index', compact('countries', 'filter'));
    }

    public function show($id)
    {
        //$this->authorize('show-role', User::class);

        $country = Country::find($id);

        if(!$country){
            $this->flashMessage('warning', 'Country not found!', 'danger');
            return redirect()->route('country');
        }


        return view('countries.show',compact('country'));
    }

    public function create()
    {
        //$this->authorize('create-role', Role::class);


        return view('countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        //$this->authorize('create-role', Role::class);

        $country = Country::create($request->all());


        $this->flashMessage('check', 'Country successfully added!', 'success');

        return redirect()->route('country.create');
    }

    public function edit($id)
    {
        //$this->authorize('edit-role', Role::class);

        $country = Country::find($id);

        if(!$country){
            $this->flashMessage('warning', 'Country not found!', 'danger');
            return redirect()->route('country');
        }


        return view('countries.edit',compact('country'));
    }

    public function update(UpdateCountryRequest $request,$id)
    {
        //$this->authorize('edit-role', User::class);

        $country = Country::find($id);

        if(!$country){
            $this->flashMessage('warning', 'Country not found!', 'danger');
            return redirect()->route('country');
        }

        $country->update($request->all());


        $this->flashMessage('check', 'Country successfully updated!', 'success');

        return redirect()->route('country');
    }

    public function destroy($id)
    {
        //$this->authorize('destroy-role', Role::class);

        $country = Country::find($id);

        if(!$country){
            $this->flashMessage('warning', 'Country not found!', 'danger');
            return redirect()->route('country');
        }

        $country->delete();

        $this->flashMessage('check', 'Country successfully deleted!', 'success');

        return redirect()->route('country');
    }


    //Cities Functions
    public function indexCity(Request $request)
    {
        $countries = Country::all();
        $filter = $request->query('search');
        $country_id = $request->query('country_id');
        //echo $country_id."        ";
        $cities = (!empty($filter) || $country_id > 0) ? City::where(function ($query) use($filter, $country_id) {
            if($country_id > 0)
                $query->where('country_id', $country_id)
                    ->where('name', 'like', '%'.$filter.'%')
                    ->Where('ar_name', 'like', '%'.$filter.'%');
            else
                $query->where('name', 'like', '%'.$filter.'%')
                  ->orWhere('ar_name', 'like', '%'.$filter.'%');
        })->paginate(15):City::paginate(15);

        //print_r($cities);
        //die();
        return view('countries.cities.index', compact('cities', 'filter', 'country_id', 'countries'));
    }

    public function showCity($id)
    {
        //$this->authorize('show-role', User::class);

        $city = City::find($id);

        if(!$city){
            $this->flashMessage('warning', 'City not found!', 'danger');
            return redirect()->route('city');
        }


        return view('countries.cities.show',compact('city'));
    }

    public function createCity()
    {
        //$this->authorize('create-role', Role::class);
        $countries = Country::all();

        return view('countries.cities.create', compact('countries'));
    }

    public function storeCity(StoreCityRequest $request)
    {
        //$this->authorize('create-role', Role::class);

        $city = City::create($request->all());


        $this->flashMessage('check', 'City successfully added!', 'success');

        return redirect()->route('city.create');
    }

    public function editCity($id)
    {
        //$this->authorize('edit-role', Role::class);

        $city = City::find($id);
        $countries = Country::all();
        if(!$city){
            $this->flashMessage('warning', 'City not found!', 'danger');
            return redirect()->route('city');
        }


        return view('countries.cities.edit',compact('city', 'countries'));
    }

    public function updateCity(UpdateCityRequest $request,$id)
    {
        //$this->authorize('edit-role', User::class);

        $city = City::find($id);

        if(!$city){
            $this->flashMessage('warning', 'City not found!', 'danger');
            return redirect()->route('city');
        }

        $city->update($request->all());


        $this->flashMessage('check', 'City successfully updated!', 'success');

        return redirect()->route('city');
    }

    public function destroyCity($id)
    {
        //$this->authorize('destroy-role', Role::class);

        $city = City::find($id);

        if(!$city){
            $this->flashMessage('warning', 'City not found!', 'danger');
            return redirect()->route('city');
        }

        $city->delete();

        $this->flashMessage('check', 'City successfully deleted!', 'success');

        return redirect()->route('city');
    }

    public function getByCountryId(Request $request)
    {
        if($request->country_id){
            $data['cities'] = City::where("country_id",$request->country_id)
                        ->get(["name","id"]);
        }else{
            $data['cities'] = array();
        }
        return response()->json($data);
    }

}
