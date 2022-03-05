    <div id="{{ $section[0] }}_form" class="hidden">


    <div class="card bg-light mb-3">
      <div class="card-body">

<form class="form-horizontal">

  <div class="form-group">
    <div class="col-xs-8"> <input id="studentName" placeholder="Student name" name="studentName" type="text" class="form-control" required="required"> </div>
  </div>

  <div class="row">
    <div class="col">
        <div class="col-xs-8"> <input id="firstName" name="firstName"  placeholder="Contributor's First Name" type="text" class="form-control" required="required"> </div>
    </div>
    <div class="col">
        <div class="col-xs-8"> <input id="text1" placeholder="Contributor's Last Name" name="text1" type="text" class="form-control" required="required"> </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-8">
      <textarea id="comment"  placeholder="Description" name="comment" cols="35" rows="5" class="form-control addcommentArea" required="required"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="row">
            <div class="col">
            <label for="tone" class="control-label col-xs-4 toneLabel">Tone</label> 
              <label class="radio-inline"> <input type="radio" name="tone" value="1"> Positive </label>
              <label class="radio-inline"> <input type="radio" name="tone" value="0"> Negative </label>
            </div>
                <div class="col">
                  <input id="email" name="email" placeholder="e-mail" type="text" class="form-control" required="required">
                </div>
  </div> 
  </div> 
  <div class="form-group row"> <button name="submit" type="submit" class=" submitNewComment btn btn-sm btn-primary">Submit</button> </div>
</form>
    </div>
    </div><!--end card body --> 
</div> <!--end card --> 
