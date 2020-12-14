<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function message(Request $request,Message $message)
    {
        $data = $request->except(['_token','code']);
        if ($locale = session()->get('locale') == 'en'){
            $success_message = trans('message.success');
            $fail_message = trans('message.fail');
        }else{
            $success_message = trans('message.success');
            $fail_message = trans('message.fail');
        }

        try {
            $result = $message->create($data);
        }catch(\Illuminate\Database\QueryException $e){
            return \Response::json(['status' => 'error','message' => $fail_message]);
        }

        if ($result->id){
            return  \Response::json(['status' => '200','message' => $success_message]);
        }
    }
}
