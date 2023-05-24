<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Redirect;

class Notifications extends Controller
{
    public function index()
    {
        $services = Notification::all();

        /* $services = DB::table('notification')
        ->select('notification.*')
        ->orderBy('notification.id', 'desc')
        ->get();  */

        return view('admin.notification', compact('services'));
    }

    public function add()
    {
        $action = 'Add';
        return view('admin.notification_form', compact('action'));
    }

    public function insert(Request $request)
    {
        $title       = $request->input('title');
        $description = $request->input('description');
        $status      = $request->input('status');
        $days        = $request->input('days');

        $data = array(
            'title'       => $title,
            'description' => $description,
            'status'      => $status,
            'days'        => $days,
        );

        $inset = Notification::UpdateOrCreate($data);

        if (isset($inset->id)) {
            $code = "PPF" . $inset->id;

            $data1 = array(
                'code' => $code,
            );

            Notification::where('id', $inset->id)->update($data1);

        }

        return Redirect::to('admin/notification')->with('success', 'Data added.');
    }

    public function edit($id)
    {
        $action  = 'edit';
        $service = Notification::where('id', $id)->get();
        return view('admin.notification_form', compact('action', 'service'));
    }

    public function update(Request $request)
    {
        $service_id  = $request->input('service_id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $status      = $request->input('status');
        $days        = $request->input('days');
        $code        = $request->input('code');

        $data = array(
            'title'       => $title,
            'description' => $description,
            'status'      => $status,
            'days'        => $days,
            'code'        => $code,
        );

        Notification::where('id', $service_id)->update($data);
        return Redirect::to('admin/notification')->with('success', 'Data updated.');
    }

    public function delete($id)
    {
        Notification::where('id', $id)->delete();
        return Redirect::to('admin/notification')->with('success', 'Data deleted.');
    }

    public function status($stat, $id)
    {

        $data = array(
            'status' => $stat,
        );

        Notification::where('id', $id)->update($data);

        return Redirect::to('admin/notification')->with('success', 'Data Updated.');
    }

}
