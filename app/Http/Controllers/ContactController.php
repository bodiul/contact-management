<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'name');
        $search = $request->get('search', '');

        $contacts = Contact::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orderBy($sort)
            ->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->address = $validatedData['address'];
        $contact->save();


        return redirect('/contacts')->with('success', 'Contact created successfully.');
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            return view('contacts.show', ['contacts' => $contact]);
        } else {
            return redirect('/')->with('error', 'Contact not found');
        }
    }
//
    public function edit($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            return view('contacts.edit', ['contacts' => $contact]);
        } else {
            return redirect('/')->with('error', 'Contact not found');
        }
    }

//    __data update--
    public function update(Request $request, $id)
    {
        $items = Contact::find($id);
        $items->name = $request->input('name');
        $items->email = $request->input('email');
        $items->phone = $request->input('phone');
        $items->address = $request->input('address');
        $items->save();
        if ($items){
           echo "<script>alert('Contact updated successfully.');</script>";
        }
        else{
            echo "<script>alert('Contact update failed.');</script>";
        }
        return redirect('/contacts');
    }
 public function destroy(Request $request, $id)
   {
      $contact=Contact::find($id);
      $contact->delete();
      return redirect('/contacts')->with('success', 'Contact deleted successfully.')        ;
    }
}
