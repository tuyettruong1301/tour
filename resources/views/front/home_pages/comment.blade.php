<h2>Comments</h2>
<form action="" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label for="">Leave message</label>
        <textarea placeholder="Input comment" name="comment" id="noidung" rows="5" cols="100%"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" id="binhluan" duongdan="{{route('comment',$tour->id)}}">Send</button>
</form><br><br>

@foreach(comments as $comment)
    @if($comment->parent_id == 0)
            <p><img src="upload/nouser.jpg" with="45" height="45" style="border-radius: 30px"/><span>{{$comment->user->email}}<span style="margin-left:50px">{{$comment->created_at}}<span></p>
            <p>{{$comment->content}}</p>
    
    @foreach(comments as $comment1)
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
                    <textarea placeholder="Input comment" name="comment" rows="5" cols="100%"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Reply</button>
        </form><br>
    </div>	
    @endif
@endforeach	