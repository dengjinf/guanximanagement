<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //
    public function index()
    {
        if ($locale = session()->get('locale') == 'en'){
            $aboutData = About::get(['part','name','description','image','created_at'])->toArray();
        }else{
            $aboutData = About::get(['part','name','description_fr as description','image_fr as image','created_at'])->toArray();
        }

        $data = array();

        foreach($aboutData as $key => $value){
            if ($value['name'] == 'banner'){
                $data['banner'] = $value;
                continue;
            }

            $data[$value['part']]= $value;
        }

        return view('home.about',$data);
    }

    public function company()
    {
        if ($locale = session()->get('locale') == 'en'){
            $pageData = About::where('name','about-company')->get('page_content')->toArray();
        }else{
            $pageData = About::where('name','about-company')->get('page_content_fr as page_content')->toArray();
        }

        $data['page_data'] = $pageData[0];

        return view('home.about-company',$data);
    }
}
