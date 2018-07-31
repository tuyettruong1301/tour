@extends('front.main_layout.master')

@section('content')
<div class="colorlib-wrap">
    <div class="container">
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="wrap-division">
                        @foreach($departions as $de)
                            <div class="col-md-6 col-sm-6 animate-box">
                                <div class="tour">
                                    <a href="{{ route('tour-detail',$de->code)}}" class="tour-img" style="background-image: url(images/tour-7.jpg);">
                                        <p class="price"><span>{{number_format($de->tour->price_adult)}}VND </span> <small>/ {{$de->tour->road->count_day}} Days</small></p>
                                    </a>
                                    <span class="desc">
                                        <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
                                        <?php $sum =0; ?>
                                        @foreach($de->tour->rates as $rate)
                                            $sum += $rate->point;
                                        @endforeach
                                        <?php $count = $de->tour->rates->count();
                                            if($sum == 0) $avg = 0;
                                            else  $avg = round($sum/$count,2);
                                            echo $avg." Rates";
                                        ?>
                                        </p>
                                        <p><span>Departure day :{{$de->departure_day}}</span><span style="margin-left: 40px">Rest seats :{{$de->rest_seat}}</span></p>
                                        <h2><a href="tour-place.html">{{$de->tour->road->name}} </a></h2>
                                        <button type="button" class="btn btn-large btn-block btn-primary">{{$de->tour->type->name}} </button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <div class="row" align="center">
                {{$departions->links()}}
            </div>
        </div>
        <!-- SIDEBAR-->
        @include('front.home_pages.side-right')
    </div>
</div>
@endsection