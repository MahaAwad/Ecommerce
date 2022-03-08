<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
   public function NotificationHistory(){
       $result=Notification::all();
       return $result;
   }

   public function AllNotification(){
       $notifications = Notification::all();
       return view('backend.notification.notification_view',compact('notifications'));
   }

   public function AddNotification(){
    return view('backend.notification.notification_add');
  } // End Mehtod

  public function StoreNotification(Request $request){

    $request->validate([
        'title' => 'required',
        'message'=> 'required',
        'date'=>'required'
    ]);
    Notification::insert([
        'title' => $request->title,
        'message' => $request->message,
        'date' => $request->date,

    ]);

    $notification = array(
        'message' => 'Notification Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.notifications')->with($notification);

}// End Mehtod
  public function EditNotification($id){

    $notification = Notification::findOrFail($id);
    return view('backend.notification.notification_edit',compact('notification'));

} //End Method


public function UpdateNotification(Request $request){

    $notification_id = $request->id;
    Notification::findOrFail($notification_id)->update([
        'title' => $request->title,
        'message' => $request->message,
        'date' => $request->date,

    ]);

    $notification = array(
        'message' => 'Notification Updated  Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.notifications')->with($notification);



} //End Method

public function DeleteNotification($id){

    Notification::findOrFail($id)->delete();

    $notification = array(
            'message' => 'Notification Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }//End Method
}
