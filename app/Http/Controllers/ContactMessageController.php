<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    function index(){
        $contact_messages = ContactMessage::select('id','name','email','phone','subject','content')
        ->paginate(5);
        return view('admin.contact.index' ,compact('contact_messages'));
    }
    function destroy(string $id){
        ContactMessage::where('id',$id)->delete();
        return back()->with('success','Data deleted successfully');
    }
    function store(ContactMessageRequest $request){
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);
        return back()->with('success','Messages sent successfully');
    }
}
