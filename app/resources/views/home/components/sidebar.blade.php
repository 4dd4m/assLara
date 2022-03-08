<div class="sidebar">
    <!--Rendering the page sidebar -->

    <!--if the sidebar has element, iterating them --> 
        @if($sidebar->isNotEmpty() == true)
            <button type="button" class="shadow newForm btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#newComment">Add a new comment</button>

        @for($i=0;$i<count($sidebar);$i++)
        <div class="list-group shadow">
          @php( $replacedCategory = str_replace(" ","_",$sidebar[$i]->name) )
          @php( $replacedCategory = str_replace(" ","_",$sidebar[$i]->name) )
          <a href="#link_{{$replacedCategory}}" class="list-group-item list-group-item-action" 
              aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                {{ $sidebar[$i]->name}} 
                <span class="badge bg-primary rounded-pill topicbadge">
                    <!--render the counter --> 
                    @if(isset($sidebarCount[$i]))
                    {{ $sidebarCount[$i]->count }}
                    @else
                    0
                    @endif
                </span>
            </div>
          </a>
        </div> <!--end listgroup --> 
        @endfor
        @else   <!--sidebar has no element --> 
            <h1 class="stcructureTitle">No Cat's</h1>
            <p>Please run:
            <quote>artisan db:seed StructureSeeder</quote>
            </p>
    @endif
</div>
