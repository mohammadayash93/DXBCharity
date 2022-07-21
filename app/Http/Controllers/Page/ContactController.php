<?php

namespace App\Http\Controllers\Page;
use App\Helper\Media;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use Media;
    public function index(Request $request)
    {
        $contact = Contact::paginate(15);

        return view('contact.index', compact('contact'));
    }

    public function show($id)
    {
        //$this->authorize('show-role', User::class);

        $contact = Contact::find($id);

        if(!$contact){
            $this->flashMessage('warning', 'Contact not found!', 'danger');
            return redirect()->route('contact');
        }


        return view('contact.show',compact('contact'));
    }

    public function create()
    {
        //$this->authorize('create-role', Role::class);


        return view('contact.create');
    }

    public function store(Request $request)
    {
        //$this->authorize('create-role', Role::class);


        if($file = $request->file('image')) {
            $fileData = $this->uploads($file,'contact/');
            $contact = Contact::create([
                       'ar_name' => $request['ar_name'],
                       'name' => $request['name'],
                       'description' => $request['description'],
                       'ar_description' => $request['ar_description'],
                       'image' => $fileData['filePath'],
                       'email' => $request['email'],
                       'mobile' => $request['mobile'],
                       'address' => $request['address'],
                       'ar_address' => $request['ar_address'],
                       'location' => $request['location'],
                       'facebook' => $request['facebook'],
                       'instagram' => $request['instagram'],
                       'tiktok' => $request['tiktok'],
                       'snapchat' => $request['snapchat'],
                       'youtube' => $request['youtube'],
                       'created_at' => Carbon::now(),
                       'updated_at' => Carbon::now()
                    ]);
        }else{
            $contact = Contact::create($request->all());

        }

        $this->flashMessage('check', 'Contact successfully added!', 'success');

        return redirect()->route('contact.create');
    }

    public function edit($id)
    {
        //$this->authorize('edit-role', Role::class);

        $contact = Contact::find($id);

        if(!$contact){
            $this->flashMessage('warning', 'Contact not found!', 'danger');
            return redirect()->route('contact');
        }


        return view('contact.edit',compact('contact'));
    }

    public function update(Request $request,$id)
    {
        //$this->authorize('edit-role', User::class);

        $contact = Contact::find($id);

        if(!$contact){
            $this->flashMessage('warning', 'Contact not found!', 'danger');
            return redirect()->route('contact');
        }

        if($request->image != ''){
            $path = public_path().'/';

            //code for remove old file
            if($contact->image != ''  && $contact->image != null){
                 $file_old = $path.$contact->image;
                 unlink($file_old);
            }
            $fileData = $this->uploads($request->image,'contact/');

            $contact->image = $fileData['filePath'];
        }

        $contact->ar_name = $request->ar_name;
        $contact->name = $request->name;
        $contact->description = $request->description;
        $contact->ar_description = $request->ar_description;
        $contact->address = $request->address;
        $contact->ar_address = $request->ar_address;
        $contact->location = $request->location;
        $contact->facebook = $request->facebook;
        $contact->instagram = $request->instagram;
        $contact->snapchat = $request->snapchat;
        $contact->tiktok = $request->tiktok;
        $contact->youtube = $request->youtube;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->updated_at = Carbon::now();
        $contact->save();


        $this->flashMessage('check', 'Contact successfully updated!', 'success');

        return redirect()->route('contact');
    }

    public function destroy($id)
    {
        //$this->authorize('destroy-role', Role::class);

        $contact = Contact::find($id);

        if(!$contact){
            $this->flashMessage('warning', 'Contact not found!', 'danger');
            return redirect()->route('contact');
        }
        $path = public_path().'/';

        //code for remove old file
        if($contact->image != ''  && $contact->image != null){
             $file_old = $path.$contact->image;
             unlink($file_old);
        }

        $contact->delete();

        $this->flashMessage('check', 'Contact successfully deleted!', 'success');

        return redirect()->route('contact');
    }
}
