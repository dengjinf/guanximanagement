<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\ProjectCase;

class HomeController extends Controller
{
    //
    public function index()
    {
        if ( $localle = session()->get('locale') == 'en' ){
            $homeData = Home::get(['part','title','description','content','image','hoverText','created_at'])->toArray();
            $caseData = ProjectCase::get(['image','content','created_at'])->toArray();
        }else {
            $homeData = Home::get(['part','title_fr as title','description_fr as description','content_fr as content','image_fr as image','hoverText_fr as hoverText','created_at'])->toArray();
            $caseData = ProjectCase::get(['image_fr as image','content_fr as content','created_at'])->toArray();
        }
        $data = array();
        foreach($homeData as $key => $value){
            if($value['part'] == 'small_banner'){
                $data[$value['part']] = $value;
                continue;
            }else if($value['part'] == 'part2'){
                $caseData = array_chunk($caseData, 4);
                $value['case'] = $caseData;
            }else{
                //获取文本内容,正则匹配去掉img标签
                $text = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', '', htmlspecialchars_decode($value['content']));
                //获取图片内容
                $str  = htmlspecialchars_decode($value['content']);
                if ($str != ''){
                    preg_match_all('/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i', $str, $imgArr);
                    $img = $imgArr[1];
                    if (count($img) == 1){
                        $img = $img[0];
                    }
                    $value['content_image'] = $img;
                }
                //获取图片上漂浮title内容
                if ( $value['hoverText'] ){
                    $title = explode('|',$value['hoverText']);
                    $value['hoverText'] = $title;
                }
                if ($bannerText = explode('|',$value['description'])){
                    $value['bannerText'] = $bannerText;
                }
                $value['text']  = $text;
            }

            if ($value['part'] == 'part4'){
                $title = explode(' ',$value['title']);
                $value['front_title'] = $title[0];
                $value['after_title'] = $title[1];
                $data[$value['part']][] = $value;
            }else{
                $data[$value['part']] = $value;
            }

        }

        return view('home.home',$data);
    }

    public function changeLocale($locale){
        if (in_array($locale, ['en','fr'])) {
            session()->put('locale', $locale);
        }

        return redirect()->back()->withInput();
    }

}
