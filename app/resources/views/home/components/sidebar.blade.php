<div class="sidebar">

@for($i=0;$i<count($sidebar);$i++)
<div class="list-group shadow">
  @php( $replacedCategory = str_replace("_"," ",$sidebar[$i]->name) )
  <a href="#link_{{$replacedCategory}}" class="list-group-item list-group-item-action" aria-current="true">
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
