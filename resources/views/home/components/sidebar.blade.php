<div class="sidebar">
    <!--Rendering the page sidebar -->

    <!--if the sidebar has element, iterating them --> 
        @if($sidebar->isNotEmpty() == true)
            <button type="button" id="openNewCommentModal" 
                    class="shadow newForm btn btn-primary btn-sm btn-block" 
                    data-toggle="modal" data-target="#newComment">
                    Add a new comment</button>
        <div class="list-group shadow">
          <a href="#" class="filterButton list-group-item list-group-item-action" 
             aria-current="true" data-structureId="">
            <div class="d-flex w-100 justify-content-between">All</div>
          </a>

        </div>
        @for($i=0;$i<count($sidebar);$i++)
        @php($c = 0)

        <div class="list-group shadow">
            <!--Category buttons as filter -->
          <a href="#" class="filterButton list-group-item list-group-item-action" 
             aria-current="true" data-structureId="{{$sidebar[$i]->id}}">
            <div class="d-flex w-100 justify-content-between"> {{ $sidebar[$i]->name}} 


                <!--Category Counts -->
                <span id="counter_{{$sidebar[$i]->code }}" 
                      class="badge bg-primary rounded-pill topicbadge">
                    <!--render the counter --> 
                        @for($j=0;$j<count($sidebarCount);$j++)
                                    @if($sidebarCount[$j]->id == $sidebar[$i]->id)
                                        @php( $c = $sidebarCount[$j]->count )
                                        @break
                                    @endif
                        @endfor
                        {{$c}}
                </span>
            </div>
          </a>
        </div> <!--end listgroup --> 
        @endfor
            <button type="button" id="openscratchPad" 
                    class="shadow newForm btn btn-primary btn-sm btn-block" 
                    data-toggle="modal" data-target="#scratchPad">
                    View Clipboard</button>
        @else   <!--sidebar has no element --> 
            <h1 class="stcructureTitle">No Cat's</h1>
            <p>Please run:
            <quote>artisan db:seed StructureSeeder</quote>
            </p>
    @endif
</div>
