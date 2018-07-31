<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Road;
use App\Province;
use App\Road_Place;
use App\Departion;
use App\Comment;
use App\User;
use DB;
use Hash;

class HomeController extends Controller
{
    public function getIndex()
    {
        $province = Province::all();
        $date =  date('Y-m-d');
        $departions = Departion::where('departure_day','>=',$date)->paginate(8);
        return view('front.home_pages.index', compact('departions', 'province'));
    }

    public function postSearchTour(Request $re)
    {
        $province = Province::all();
        $name = $re->location;
        $date = date('Y-m-d',strtotime($re->date));
        $count = $re->people;
        $codes = DB::table('departions')->join('tours','departions.tour_id','=','tours.id')
        ->join('roads','roads.id','=','tours.road_id')->join('road_places','road_places.id','=','roads.id')
        ->join('places','places.id','=','road_places.place_id')->join('provinces','provinces.id','=','places.province_id')
        ->where('provinces.name','like','%'.$name.'%')
        ->where('departions.departure_day', '=', $date)->where('departions.rest_seat','>',$count)->distinct()
        ->select('departions.code')->get();
        $key= array();
        foreach($codes as $co)
        {
            array_push($key,$co->code);
        }
        $departions = Departion::whereIn('code',$key)->paginate(8);
        return view('front.home_pages.index', compact('departions', 'province'));
    }

    public function postSearchTourPrice(Request $re)
    {
        $province = Province::all();
        $pricelow = (int)($re->pricelow);
        $pricehight = (int)($re->pricehight);
        $codes = DB::table('departions')->join('tours','departions.tour_id','=','tours.id')
        ->where('tours.price_adult','>=',$pricelow)->where('tours.price_adult','<=',$pricehight)->distinct()
        ->select('departions.code')->get();
        $key= array();
        foreach($codes as $co)
        {
            array_push($key,$co->code);
        }
        $departions = Departion::whereIn('code',$key)->paginate(8);
        return view('front.home_pages.index', compact('departions', 'province'));
    }

    public function getDetail($id)
    {
        $departion = Departion::where('code','=',$id)->first();
        $tour = $departion->tour;
        $road_id = $departion->tour->road_id;
        $count_day = Road::find($road_id)->count_day;
        $road_place = Road_Place::where('road_id','=',$tour->road_id)->orderBy('batch')->get();
        $province = Province::all();
        return view('front.home_pages.detail', compact('province', 'road_place', 'count_day', 'tour', 'departion'));
    }

    public function getProvince($id)
    {
        $province = Province::all();
        $pro = Province::find($id);
        $places = $pro->places()->get();
        return view('front.home_pages.province', compact('places', 'province', 'pro'));    
    }

    public function getPlace($id)
    {
        $province = Province::all();
        $date = date('Y-m-d');
        $codes = DB::table('places')->join('road_places','places.id','=','road_places.place_id')
        ->join('roads','road_places.id','=','roads.id')->join('tours','roads.id','=','tours.road_id')
        ->join('departions','departions.tour_id','=','tours.id')->where('places.id','=',$id)
        ->where('departions.departure_day', '>=', $date)->distinct()->select('departions.code')->get(); 
        $key= array();
        foreach($codes as $co)
        {
            array_push($key,$co->code);
        }
        $departions = Departion::whereIn('code',$key)->paginate(8);
        return view('front.home_pages.index', compact('departions', 'province'));        
    }
    
    public function getComment(Request $re,$id)
    {
        $comment = new Comment();
        $comment->user_id = 1;
        $comment->tour_id = $id;
        $comment->content = $re->content;
        $comment->parent_id = 0;
        $comment->save();

        $comments = Comment::where('tour_id','=',$id)->get();
        $result = view('front.home_pages.comment', compact('$comments'))->render();
        return $result;
    }

    public function getReply(Request $re, $id)
    {
        $tour_id = Comment::find($id)->tour()->first()->id;
        $comment = new Comment();
        $comment->user_id = 1;
        $comment->tour_id = $tour_id;
        $comment->content = $re->content;
        $comment->parent_id = $id;
        $comment->save();

        $comments = Comment::where('tour_id','=',$tour_id)->get();
        $result = view('front.home_pages.comment', compact('$comments'))->render();
        return $result;
    }

    public function postRegister(Request $re)
    {
        $user = new User();
        $user->name = $re->name;
        $user->email = $re->email;
        $user->phone = $re->phone;
        $user->address = $re->address;
        $user->password = Hash::make($re->password);
        $file = $re->file('image');
        $duoi = $file->getClientOriginalExtension();
        if($duoi != 'jpg' && $duoi != "png" && $duoi != "jpeg")
        {
            return redirect()->back()->with('loi','Định dạng ảnh phải là jpg, png, jpeg');
        }
        $name = $file->getClientOriginalName();
        $anhdaidien= str_random(4)."_".$name;
        while(file_exists("upload/".$anhdaidien))
        {
            $anhdaidien= str_random(4)."_".$name;
        } 
        $file->move("upload",$anhdaidien);
        $user->image = $anhdaidien;
        $user->role = $re->dk;
        $user->save();

    }
}
