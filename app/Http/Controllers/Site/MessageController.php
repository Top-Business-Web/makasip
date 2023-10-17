<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Notification::where('user_id', auth()->user()->id)->orWhereNull('user_id')->orderBy('id','Desc')->paginate(10);
//        return $messages;
        return view('site.messages.index',compact('messages'));
    } // end of index

    public function delete(Request $request)
    {
//        dd($request->all());
        $notif = Notification::find($request->id);
        $notif->delete();

        if ($notif){
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    } // delete message

    public function messageRead(Request $request)
    {
        $message = Notification::find($request->id);
        $message->update(['seen' => '1']);

        if ($message){
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    } // message Read

    public function messageAllRead(Request $request)
    {
        $messages = Notification::where('user_id', auth()->user()->id);
        $messages->update(['seen' => '1']);

        if ($messages){
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    } // message All Read
}

