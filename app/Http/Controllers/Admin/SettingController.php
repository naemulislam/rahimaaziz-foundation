<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $data = Setting::latest()->first();
        return view('backend.dashboard.admin.setting.setting',compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'site_name'=> 'required',
            'admission_fee'=> 'required',
        ]);
            $data = new Setting();
            $data->site_name = $request->site_name;
            $data->site_slogan = $request->site_slogan;
            $data->admission_fee = $request->admission_fee;
            $data->monthly_fees = $request->monthly_fees;
            $data->admission_quota = $request->admission_quota;
            $data->facebook_link = $request->facebook_link;
            $data->twitter_link = $request->twitter_link;
            $data->instagram_link = $request->instagram_link;
            $data->linkedin_link = $request->linkedin_link;
            $data->youtube_link = $request->youtube_link;
            $data->copyright = $request->copyright;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $image = $request->file('white_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/setting'), $imageName);
            $data->white_logo = '/uploaded/setting/' . $imageName;
        }
        $image = $request->file('black_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/setting'), $imageName);
            $data->black_logo = '/uploaded/setting/' . $imageName;
        }
            $data->save();
            $notification = array(
                'message' => 'Setting updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }

   
    public function updateid(Request $request, $id)
    {
        $this->validate($request,[
            'site_name'=> 'required',
            'admission_fee'=> 'required',
        ]);
        
            $data = Setting::find($id);
            $data->site_name = $request->site_name;
            $data->site_slogan = $request->site_slogan;
            $data->admission_fee = $request->admission_fee;
            $data->monthly_fees = $request->monthly_fees;
            $data->admission_quota = $request->admission_quota;
            $data->facebook_link = $request->facebook_link;
            $data->twitter_link = $request->twitter_link;
            $data->instagram_link = $request->instagram_link;
            $data->linkedin_link = $request->linkedin_link;
            $data->youtube_link = $request->youtube_link;
            $data->copyright = $request->copyright;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $image = $request->file('white_logo');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = public_path($data->white_logo);
                @unlink($image_path);
                $image->move(public_path('uploaded/setting'), $imageName);
                $data->white_logo = '/uploaded/setting/' . $imageName;
            }
            $image = $request->file('black_logo');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path = public_path($data->black_logo);
                @unlink($image_path);
                $image->move(public_path('uploaded/setting'), $imageName);
                $data->black_logo = '/uploaded/setting/' . $imageName;
            }
            $data->save();
            $notification = array(
                'message' => 'Setting updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
