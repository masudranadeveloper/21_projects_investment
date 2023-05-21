<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\task_ads;
use App\Models\redeem_code;
use File;

class backend_admin_tools_controller extends Controller
{
    // tools_update_package_delete
    public function tools_update_package_delete($id)
    {
        redeem_code::find($id) -> delete();
        return back() -> with('msg', 'Redeem code successfully delete!');
    }
    // tools_update_package_add
    public function tools_update_package_add(Request $req)
    {
        $data = $req -> all();
        $db = new redeem_code;
        $db -> amount = $data['amount'];
        $db -> redeem_code = $data['redeem_code'];
        $db -> save();

        return back() -> with('msg', 'Redeem code successfully added!');
    }

    // tools_update_package_update_data
    public function tools_update_package_update_data(Request $req, $id)
    {
        $data = $req -> all();
        user_package::where('id', $id) -> update([
            "redeem_code" => $data['redeem_code'],
            "amount" => $data['amount'],
        ]);
        return back() -> with('msg', 'Redeem code successfully updated!');
    }

    // tools_update_package_update_data_img
    public function tools_update_package_update_data_img(Request $req, $id)
    {
        $pic = $req -> file('package_img');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move('images/packages', $pic_name);

        user_package::where('id', $id) -> update([
            "package_img" => $pic_name
        ]);

        return back() -> with('msg', 'Package successfully added!');
    }

    /*
    |--------------
    |tools ads
    |--------------
    */
    // tools_ads_add
    public function tools_ads_add(Request $req)
    {
        $pic = $req -> file('img');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move('images/task/yt_img', $pic_name);

        $vid = $req -> file('vid');
        $vid_name = time().".".$vid -> getClientOriginalExtension();
        $vid -> move('video/task_video', $vid_name);

        $data = $req -> all();
        $db = new task_ads;
        $db -> title = $data['title'];
        $db -> time = $data['vid_time'];
        $db -> img = $pic_name;
        $db -> vid = $vid_name;
        $db -> save();

        return back() -> with('msg', 'Ads successfully added!');
    }

    // tools_ads_delete
    public function tools_ads_delete(Request $req, $id)
    {
        task_ads::findOrFail($id) -> delete();
        return back() -> with('msg', 'Ads successfully delete!');
    }

    // tools_ads_update
    public function tools_ads_update(Request $req, $id)
    {
        $data = $req -> all();
        task_ads::where('id', $id) -> update([
            'title' => $data['title'],
            'time' => $data['vid_time'],
        ]);
        return back() -> with('msg', 'Ads successfully updated!');
    }
    // tools_ads_update_img
    public function tools_ads_update_img(Request $req, $id)
    {
        $task_ads_data = task_ads::findOrFail($id);
        File::delete(public_path('images/task/yt_img/'.$task_ads_data['img']));

        $pic = $req -> file('img');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move('images/task/yt_img', $pic_name);

        task_ads::where('id', $id) -> update([
            "img" => $pic_name
        ]);

        return back() -> with('msg', 'Ads img successfully update!');
    }

    // tools_ads_update_video
    public function tools_ads_update_video(Request $req, $id)
    {
        $task_ads_data = task_ads::findOrFail($id);
        File::delete(public_path('video/task_video/'.$task_ads_data['vid']));

        $vid = $req -> file('vid');
        $vid_name = time().".".$vid -> getClientOriginalExtension();
        $vid -> move('video/task_video', $vid_name);

        task_ads::where('id', $id) -> update([
            "vid" => $vid_name
        ]);

        return back() -> with('msg', 'Ads video successfully update!');
    }

}
