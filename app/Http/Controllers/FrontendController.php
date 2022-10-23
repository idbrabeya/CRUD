<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class FrontendController extends Controller
{


    function welcome(){
          return view('welcome');
           }
     function contact(){
          return view('contact');
        }
   public function contactinsert(Request $request){
                    $request->validate([
                        'guest_name'=>'required',
                        'guest_email'=>'required|email',
                        'guest_message'=>'required',
                    ]);
       contact::insert([
               'guest_name'=>$request->guest_name,
               'guest_email'=>$request->guest_email,
               'guest_message'=>$request->guest_message,
                'created_at'=>Carbon::now()

       ]);

       return back()->with('message','data insert successfully');
        }

    function about(){
    // $about_page= "About";
    // $students =["srity","nure","sharmin","orne"];
        $contacts= Contact::latest()->get();
        $contacts_delete=Contact::onlyTrashed()->get();
      return view('about',compact('contacts','contacts_delete'));
    }
    function contactdelete($id){
         $contactdelete=Contact::find($id);
         $contactdelete->delete();
         return redirect()->route('about')->with('message','delete of '.$contactdelete->guest_name.' successfully');
    }
    function Force_contactdelete($id){
        Contact::onlyTrashed()->find($id)->forcedelete();
        return back();
        // $contactdelete->delete();
        // return redirect()->route('about')->with('message','delete of '.$contactdelete->guest_name.' successfully');
   }
   public function restore($id){
             Contact::onlyTrashed()->find($id)->restore();
             return back();
   }
    public function details($id){
            Contact::find($id)->update([
                'status'=>'read'
            ]);

             return view('contactdetails')->with('contact',Contact::find($id));
    }

}
