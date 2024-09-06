<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\CompanyProfile;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\Setting;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class GeneralController extends Controller
{
    // landing page
    public function index(){
        $setting = Setting::find(1);
        $sliders = SliderImage::all();
        return view("welcome",compact("setting","sliders"));
    }
    
    // about us
    public function about(){
        $setting = Setting::find(1);
        $profiles = CompanyProfile::all();
        return view("about",compact("setting","profiles"));
    }

    // contact us
    public function contact(){
        $setting = Setting::find(1);
        return view("contact",compact("setting"));
    }

    // contact us
    public function events(){
        $setting = Setting::find(1);
        $events = Event::where("status",1)->paginate(8);
        return view("events",compact("setting","events"));
    }
    // contact us
    public function events_details($slug){
        $setting = Setting::find(1);
        $event = Event::where("slug",$slug)->first();
        return view("event_details",compact("setting","event"));
    }

    public function sends(Request $request)
{
    // Honeypot validation
    if (!empty($request->palsey)) {
        return response()->json(['success' => false, 'message' => 'Invalid form submission'], 422);
    }

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'subject' => 'required|string|max:255',
        'contact' => 'required|string',
        'captcha' => 'required|captcha',
    ]);

    // Prepare the email data
    $details = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'contact' => $request->contact,
    ];

    // Send the email
    Mail::to("info@fmapmedia.com")->send(new ContactUsMail($details));

    // Return a JSON response
    return response()->json(['success' => true]);
}

public function send(Request $request)
    {
        // Honeypot validation
        if (!empty($request->palsey)) {
            return response()->json(['success' => false, 'message' => 'Invalid form submission'], 422);
        }

        try {
            // Validate the form input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'subject' => 'required|string|max:255',
                'contact' => 'required|string',
                'captcha' => 'required|captcha',
            ]);

            // Prepare the email data
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'contact' => $request->contact,
            ];

            // Send the email
             Mail::to("info@fmapmedia.com")->send(new ContactUsMail($details));

            // Return a JSON response for success
            return response()->json(['success' => true]);

        } catch (ValidationException $e) {
            // Return a JSON response for validation errors
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
    }
public function reloadCaptcha()
{
    // return response()->json(['captcha'=> captcha_img()]);
    return response()->json(['captcha' => captcha_img('flat')]);
}

public function donate(){
    $setting = Setting::find(1);
    return view("donate",compact("setting"));
}

public function programs(){
    $setting = Setting::find(1);
    $galleries = Gallery::where("status",1)->get();
    // dd($galleries);
    $programs = Program::where("status",'publish')->paginate(8);
    return view("programs",compact("setting","programs","galleries"));
}

public function program_details($id){
    $program = Program::where("id",$id)->first();
    $setting = Setting::find(1);
    return view("program_details",compact("setting","program"));
}

public function donate_form(Request $request)

{
    $request->validate([
        'fname' => 'required|string',
        'lname' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'country' => 'required|string',
        'amount' => 'required|numeric',
    ]);

    return response()->json(['info'=>"Coming Soon!"]);
}
}
