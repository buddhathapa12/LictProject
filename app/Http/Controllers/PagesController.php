<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\TextData;
class PagesController extends Controller
{
    public function index(){
        $top= Home::find(0);
        $all=json_decode($top['directories']);
        $headers=array();
        foreach ($all as $item) {
            $headers[Home::find($item)['title']]=array(
                        'location'=>Home::find($item)['location']
            );
            if(Home::find($item)['directories']!=""){
                $tmp=json_decode(Home::find($item)['directories']);
                foreach ($tmp as $item2) {
                    $headers[Home::find($item)['title']][Home::find($item2)['title']]=array(
                        'location'=>Home::find($item2)['location']
                    );
                    if(Home::find($item2)['directories']!=""){
                        $tmp2=json_decode(Home::find($item2)['directories']);
                        foreach ($tmp2 as $item3) {
                            $headers[Home::find($item)['title']][Home::find($item2)['title']][Home::find($item3)['title']]=array(
                                'location'=>Home::find($item3)['location']
                            );
                        }
                    }
                }
            }
        }
        $text_data = TextData::find('Dean\'s Message');
        $chairman_data = TextData::find('Chairman\'s Message');
        $text_array = array(
            'Dean\'s Message'=>array(
                'txt'=>$text_data['text'],
                'img'=>json_decode($text_data['imgloc'])
            ),
            'Chairmam\'s Message' => array(
                'txt'=>$chairman_data['text'],
                'img'=>json_decode($chairman_data['imgloc'])
            )
        );
        
        $wrapper=array(
            "all"=>$headers,
            "txt_data"=>$text_array
        );
        return View('Home.home')->with($wrapper);
    }
}

