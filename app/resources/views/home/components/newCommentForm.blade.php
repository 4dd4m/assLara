<div class="modal fade" id="newComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a new comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="errormsg"></div>
                <form class="form-horizontal" id="newCommentForm">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="col-xs-8"> <input id="firstName" name="firstName"  placeholder="Contributor's First Name" type="text" class="form-control" required="required"> </div>
                        </div>
                        <div class="col">
                            <div class="col-xs-8"> <input id="lastName" placeholder="Contributor's Last Name" name="lastName" type="text" class="form-control" required="required"> </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-8">
                            <textarea id="comment"  placeholder="Description" name="comment" cols="35" rows="5" class="form-control" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">

                                <select id="structureId" name="structureId" class="custom-select form-control">
                                    <option value="">Please select</option>
                                    @for($i=0;$i<count($sidebar);$i++)
                                        <option value="{{ $sidebar[$i]->id }}">{{ $sidebar[$i]->name }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <input id="email" name="email" placeholder="e-mail" type="text" class="form-control" required="required">
                            </div>
                        </div> 
                        <select id="tone" name="tone" class=" toneSelector custom-select form-control">
                            <option value="">Please select the tone of the comment</option>
                            <option value="1">Positive</option>
                            <option value="0">Negative</option>
                        </select>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="closeNewForm btn btn-secondary"  data-dismiss="modal">Close</button>
                <button type="button" class="saveNewComment btn btn-primary">Save changes</button>
            </div>  <!--modal footer --> 
        </div>      <!--modal body --> 
    </div>
</div>
</div>
    </div> 
