<!-- Display One Card -->
    @if( $comment->isApproved == 1)
    <div class="card text-white bg-success mb-3 shadow">
    @else
    <div class="card text-white bg-secondary mb-3 shadow">
    @endif
    <div class="card-header">
    <span class="glyphicon glyphicon-copy"></span>

   <span class="commentId">#{{$comment->code}}{{ $comment->id }}</span>



<div class="form-check">
<!--Clipboard checkbox --> 
  <input class="form-check-input" type="checkbox" value="{{ $comment->tone }}" id="{{ $comment->id }}_checkBox">
  <label class="form-check-label" for="check_{{ $comment->id }}">
   <span data-toggle="tooltip" data-placement="right" title="Copy this comment to the clipboard"> Clipboard</span>
  </label>
<!--End of Clipboard checkbox --> 
    @if( $comment->tone == 1)
<span class="badge badge-success toneBadge">Positive Tone</span>
    @else
<span class="badge badge-danger toneBadge">Negative Tonte</span>
    @endif


    @if( $comment->isApproved == 1)
    <span class="toneBadge badge badge-info">Approved Comment</span>
    @else
    <span class="toneBadge badge  badge-warning">Pending Comment</span>
    @endif
</div>
        </div>
      <div class="card-body">
        <p class="card-text">{{ $comment->comment  }}</p>
        <p class="submittedBy">Submitted by <a href="#" class="authorLink">{{$comment->firstName}} {{$comment->lastName}} @ {{ $comment->updated_at }}</a></p>
      </div>
   </div>
