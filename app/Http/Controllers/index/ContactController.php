<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contactData = Contact::all()->toArray();
        $data = array();
        foreach($contactData as $key => $value){
            if ($value['name'] == 'banner'){
                $data['part1'] = $value;
                continue;
            }
            if ($value['name']){
                $name_res = explode(' ',$value['name']);
                $value['before_name'] = $before_name = $name_res[0];
                $value['after_name']  = $after_name  = $name_res[1];
            }
            $data['part2'] = $value;
        }

        return view('home.contact',$data);
    }
}
