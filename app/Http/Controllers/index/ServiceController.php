<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Events;

class ServiceController extends Controller
{
    //
    public function index()
    {
        if ( $locale = session()->get('locale') == 'en'){
            $serviceData = Service::get(['part','title','description','image','hoverText','created_at'])->toArray();
            $eventsData = Events::orderby('created_at','desc')->limit(2)->get(['title','description','content','image','created_at'])->toArray();
        }else{
            $serviceData = Service::get(['part','title_fr as title','description_fr as description','image_fr as image','hoverText_fr as hoverText','created_at'])->toArray();
            $eventsData = Events::orderby('created_at','desc')->limit(2)->get(['title_fr as title','description_fr as description','content_fr as content','image_fr as image','created_at'])->toArray();
        }

        foreach($serviceData as $key => $value){
            if ($value['part'] == 'banner'){
                $data[$value['part']] = $value;
                continue;
            }else if($value['part'] == 'part5'){
                foreach ($eventsData as $event_k => $event_v){
                    $timestamp = strtotime($event_v['created_at']);
                    $day   = date('d',$timestamp);
                    $month = date('m',$timestamp);
                    $year  = date('Y',$timestamp);
                    $year_month = $year.'-'.$month;
                    $eventsData[$event_k]['day'] = $day;
                    $eventsData[$event_k]['year_month'] = $year_month;
                }

                $value['content'] = $eventsData;
            }

            //获取图片上漂浮title内容
            if ( $value['hoverText'] ){
                $title = explode('|',$value['hoverText']);
                $value['hoverText'] = $title;
            }

            $data[$value['part']] = $value;
        }

        return view('home.service',$data);
    }

    public function sourcing()
    {
        if ( $locale = session()->get('locale') == 'en' ){
            $pageData = Service::where('part','service-sourcing')->get('page_content')->toArray();
        }else{
            $pageData = Service::where('part','service-sourcing')->get('page_content_fr as page_content')->toArray();
        }

        $data['page_data'] = $pageData[0];

        return view('home.service-sourcing',$data);
    }

    public function conseil()
    {
        if ( $locale = session()->get('locale') == 'en' ){
            $pageData = Service::where('part','service-conseil')->get('page_content')->toArray();
        }else{
            $pageData = service::where('part','service-conseil')->get('page_content_fr as page_content')->toArray();
        }

        $data['page_data'] = $pageData[0];

        return view('home.service-conseil',$data);
    }

        public function intermediation()
    {
        if ( $locale = session()->get('locale') == 'en' ){
            $pageData = Service::where('part','service-intermediation')->get('page_content')->toArray();
        }else{
            $pageData = Service::where('part','service-intermediation')->get('page_content_fr as page_content')->toArray();
        }

        $data['page_data'] = $pageData[0];

        return view('home.service-intermediation',$data);
    }
}
