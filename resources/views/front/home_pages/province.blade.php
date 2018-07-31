@extends('front.main_layout.master')

@section('content')
<div class="colorlib-wrap">
    <div class="container">
        <div class="colorlib-tour colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Popular Destination</h2>
						<p>{{$pro->description}}</p>
					</div>
				</div>
			</div>
			<div class="tour-wrap">
				@foreach($places as $pl)
				<a href="{{route('tour-place',$pl->id)}}" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(upload/{{$pl->image}});">
					</div>
					<span class="desc" style="text-align: center;">
						<h2>{{$pl->name}}</h2>
						<p style="color: black">{{$pl->description}}</p>
					</span>
				</a>
				@endforeach
			</div>
		</div>
    </div>
</div>
@endsection