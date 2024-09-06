<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{

    public function index(){
        // return "services";
        $services = Service::all();
        return view("services.index",compact("services"));
    }

    public function create(){
        return view("services.create");
    }

    public function store(Request $request){
        // return $request;
        try {
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('assets/images/services'), $imageName);

            $service = Service::create([
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status,
                'slug'=> Str::slug($request->input('title')),
                'img' => $imageName,
               ]);

            
            if ($service) {
                // assign new role to the user
                // $user->syncRoles($request->role);
                return redirect()->back()->with('success', 'New service created!');
            }

            return redirect('service/create')->with('error', 'Failed to create new service! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function edit(Request $request, $id){
        $service = Service::where("id",$id)->first();
        return view("services.edit",compact("service"));
    }

    
    public function update(Request $request, $id){
        
        $service = Service::where("id",$id)->first();

        try {
        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('assets/images/services'), $imageName);
                $file = $service->img;
                // File::delete($file);
                File::delete(public_path("assets/images/services/$file"));

                $service->title = $request->title;
                $service->status = $request->status;
                $service->content = $request->content;
                $service->slug = Str::slug($request->input('title'));
                $service->img = $imageName;
        }else{

            $service->title = $request->title;
            $service->status = $request->status;
            $service->content = $request->content;
            $service->slug = Str::slug($request->input('title'));
            // $service->img = $imageName;
        }
            
            if ($service->save()) {
                return redirect()->back()->with('success', 'Service updated!');
            }

            return redirect('service/create')->with('error', 'Failed to update service! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

        public function delete($id){
            
           $service =   Service::where("id",$id)->first();
             $file = $service->img;
             // File::delete($file);
             File::delete(public_path("assets/images/services/$file"));

             $service->delete();
             
            return redirect()->back()->with('success','Service removed successfully');
    }
}
