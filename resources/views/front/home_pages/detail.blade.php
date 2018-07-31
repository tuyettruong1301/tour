@extends('front.main_layout.master')
 @section('content')
<div class="colorlib-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-division">
							<div class="col-md-12 col-md-offset-0 heading2 animate-box">
								<h2>{{$tour->road->name}} </h2>
								<button type="button" class="btn btn-primary">Tour {{$tour->type->name}}</button>
							</div>
							<p style="font-size: 16px">
								<span>Departure day :{{$departion->departure_day}}</span><br>
								<span>Rest seats :{{$departion->rest_seat}}</span><br>
								<span>Price Adult :{{number_format($tour->price_adult)}}VND</span><br>
								<span>Price Child :{{number_format($tour->price_child)}}VND</span><br>
								<span>Eat :{{$tour->eat." "}}lunch and dinner/day</span><br>
								<span>Travel by :{{$tour->travel}}</span><br>
								<span>Hotel :
									@foreach($tour->tour_hotels as $th)
										{{$th->hotel->name." -- "}}
									@endforeach
								</span><br>
								<span>Tour guide :<br> Name :{{$departion->user->name." "}} Email :{{$departion->user->email." " }}
									Address :{{$departion->user->address." "}} Phone:{{$departion->user->phone}}
								</span>
							</p><br><br>
							<div class="row">
								<?php $i = 1 ?> 
								@while($i<= $count_day) 
								   @foreach($road_place as $rp) 
								       @if($rp->order_day == $i)
											<div class="col-md-12 animate-box">
												<div class="room-wrap">
													<div class="row">
														<div class="col-md-6 col-sm-6">
															<div class="room-img" style="background-image: url(upload/{{$rp->place->image}})"></div>
														</div>
														<div class="col-md-6 col-sm-6">
															<div class="desc">
																<span class="day-tour">Day {{$i}}</span>
																<h2>{{$rp->place->name}} </h2>
																<p>{{$rp->place->description}} </p>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endif 
									@endforeach
									<?php $i++; ?> 
								@endwhile
									<div class="col-md-12 animate-box text-center">
										<p>
											<a class="btn btn-primary" data-toggle="modal" href='#book'>Book Tour</a>
										</p>
									</div>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bi">
						<h2>Comments</h2>
						<form action="" method="POST" role="form">
						    @csrf
							<div class="form-group">
								<label for="">Leave message</label>
								<textarea placeholder="Input comment" name="comment" id="noidung" rows="5" cols="100%"></textarea>
							</div>
							<button type="submit" class="btn btn-primary" id="binhluan" duongdan="{{route('comment',$tour->id)}}">Send</button>
						</form><br><br>
						
						@foreach($tour->comments as $comment)
							@if($comment->parent_id == 0)
									<p><img src="upload/nouser.jpg" with="45" height="45" style="border-radius: 30px"/><span>{{$comment->user->email}}<span style="margin-left:50px">{{$comment->created_at}}<span></p>
									<p>{{$comment->content}}</p>
							
							@foreach($tour->comments as $comment1)
								@if($comment1->parent_id == $comment->id )
									<div style="margin-left:80px">
										<p><img src="upload/nouser.jpg" with="45" height="45" style="border-radius: 30px"/><span>{{$comment1->user->email}}<span style="margin-left:50px">{{$comment1->created_at}}<span></p>
										<p>{{$comment1->content}}</p>
									</div>
								@endif
							@endforeach
							<button type="button" class="btn btn-sm btn-primary" id="reply" style="margin-left: 80px">Reply</button>
							<div id="rp" style="margin-left: 80px;display: none">
								<form action="" method="POST" role="form">
					
										<div class="form-group">
											<label for="">Leave message</label>
											<textarea placeholder="Input comment" id="reply1" rows="5" cols="100%"></textarea>
										</div>
										<button type="submit" class="btn btn-primary" id="traloi" duongdan="{{route('reply',$comment->id)}}">Reply</button>
								</form><br>
							</div>	
							@endif
						@endforeach						
					</div>	
				</div>	
			</div>
   
			<!-- SIDEBAR-->
			@include('front.home_pages.side-right')
		</div>
	</div>
	@endsection