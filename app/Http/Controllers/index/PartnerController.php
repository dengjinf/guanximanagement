<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    //
    public function index()
    {
        $partnerData = Partner::all()->toArray();
        $data = array();
        foreach($partnerData as $key => $value){
            //截开name字段
            if ($value['part'] == 'bot'){
                $data[$value['part']][] = $value;
            }else{
                $data[$value['part']] = $value;
            }
        }
        if (count($data['bot']) > 2){
            $data['bot'] = array_chunk($data['bot'], 2);
        }

        return view('home.partner',$data);
    }
}
