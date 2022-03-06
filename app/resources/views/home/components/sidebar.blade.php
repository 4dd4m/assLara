<div class="shadow">

@for($i=1;$i<count($sidebar);$i++)
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
        {{ $sidebar[$i]->name}} 
        <span class="badge bg-primary rounded-pill topicbadge">
@if(isset($sidebarCount[$i]))

{{ $sidebarCount[$i]->count }}
@else

0

@endif




</span>
    </div>
  </a>
</div>

@endfor
</div>
