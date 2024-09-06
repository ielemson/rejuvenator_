<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Facades\Toastr;
class SettingController extends Controller
{
    function __construct()
	{
		// $this->middleware('auth');
		// $this->middleware('permission:websetting-edit', ['only' => ['edit','update']]);

        // $setting_edit = Permission::get()->filter(function($item) {
        //     return $item->name == 'websetting-edit';
        // })->first();


        // if ($setting_edit == null) {
        //     Permission::create(['name'=>'websetting-edit']);
        // }
	}

	public function edit()
	{
        $setting = Setting::find(1);
        // $currencies = Currency::where('status',1)->get();
		return view('settings.edit',compact('setting'));
	}

	public function update(Request $request, $id=1)
	{
        // dd($request->all());
		$rules = [
            'website_title' 			=> 'nullable|string',
            'website_logo_dark'         => 'nullable',
             'about'                    => 'nullable|string',
            'website_favicon'           => 'nullable',
            'meta_title'                => 'nullable|string',
            'meta_description'          => 'nullable|string',
            'meta_tag'                  => 'nullable|string',
            'address'                   => 'nullable|string',
            'phone'                     => 'nullable|string',
            'email'                     => 'nullable|string',
            'work_hours'                => 'nullable',
        ];

        $messages = [
            
        ];

        $this->validate($request, $rules, $messages);
		$input = $request->all();
        // dd($input);
		$setting = Setting::find($id);
        if (!empty($input['website_logo_dark'])) {

            $newImageName = uniqid() . '-' .'logo'. '.' . $request->website_logo_dark->extension();

            $request->website_logo_dark->move(public_path('images/settings'), $newImageName);

            $input['website_logo_dark']  = $newImageName;
            // dd($input);
        }
        if (!empty($input['website_logo_light'])) {

            $newFooterImageName = uniqid() . '-' .'logo'. '.' . $request->website_logo_light->extension();

            $request->website_logo_light->move(public_path('images/settings'), $newFooterImageName);

            $input['website_logo_light']  = $newFooterImageName;
            // dd($input);
        }

        if (!empty($input['website_favicon'])) {

            $newFaviconName = uniqid() . '-' .'favicon'. '.' . $request->website_favicon->extension();

            $request->website_favicon->move(public_path('images/settings'), $newFaviconName);

            $input['website_favicon']  = $newFaviconName;
            // dd($input);
        }
        if (!empty($input['who_we_are_img'])) {

            $newFaviconName = uniqid() . '-' .'favicon'. '.' . $request->who_we_are_img->extension();

            $request->who_we_are_img->move(public_path('images/settings'), $newFaviconName);

            $input['who_we_are_img']  = $newFaviconName;
            // dd($input);
        }
        if (!empty($input['about_img'])) {

            $newFaviconName = uniqid() . '-' .'favicon'. '.' . $request->about_img->extension();

            $request->about_img->move(public_path('images/settings'), $newFaviconName);

            $input['about_img']  = $newFaviconName;
            // dd($input);
        }

// dd($input);
        try {
			$setting->update($input);
            // Toastr::success(__('setting.message.update.success'));
		    return redirect()->route('website-setting.edit');
		} catch (Exception $e) {
            // Toastr::success(__('setting.message.update.error'));
		    return redirect()->route('website-setting.edit');
		}
	}
}

