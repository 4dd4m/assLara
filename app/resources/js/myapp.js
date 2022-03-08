$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//handling of the new form buttons 

//bind an event listener to them

//    $('.newForm').on('click',function(){
//
//        var targetDiv = this.getAttribute('data-name');
//        var selector = "#"+targetDiv+"_form";
//        var editForm = $(selector);
//
//        //display the modal
//        $('#newComment').modal('show');
//    });



$.ajax({
    type : "GET",
    url : "/show",
    dataType : "json",
    success: function (data){

        var output = "";
        var currentStructure = "";
        console.log(data);
        for(let i=0;i < data.length;i++){

            var e = data[i];

            //change the header
            if(currentStructure != e.name){
                currentStructure = e.name;
                console.log(currentStructure);
                var linkHref = e.name.replace(/ /g,"_");
                output += `<h1 class="stcructureTitle aOffset" id="link_${linkHref}">${e.name}</h1>`;
            }

            if(e.isApproved == 1){
                output += ` <div class="card text-white bg-success mb-3 shadow">`;
            }else{
                output += ` <div class="card text-white bg-secondary mb-3 shadow">`;
            }
            output += `<div class="card-header">
    <span class="glyphicon glyphicon-copy"></span>

   <span class="commentId">#${e.code}${e.id}</span>

<div class="form-check">
<!--Clipboard checkbox -->
  <input class="form-check-input" type="checkbox" value="${e.tone}" id="${e.id}">
  <label class="form-check-label" for="check_${e.id}">
   <span data-toggle="tooltip" data-placement="right" title="Copy this comment to the clipboard"> Clipboard</span>
  </label>

<!--End of Clipboard checkbox -->`;
            if(e.tone == 1){
                output += `<span class="badge badge-success toneBadge">Positive Tone</span>`;
            }else{
                output += `<span class="badge badge-danger toneBadge">Negative Tone</span>`;
            }

            if( e.isApproved == 1){

                output += `<span class="toneBadge badge badge-info">Approved Comment</span>`;
            }else{
                output += `<span class="toneBadge badge  badge-warning">Pending Comment</span>`;
            }

            output += `
                        </div>
                        </div>
                        <div class="card-body">
                        <p class="card-text">${e.comment}</p>
                        <p class="submittedBy">Submitted by <a href="#" class="authorLink">${e.firstName}${e.lastName} @ ${e.updated_at}</a></p>
                        </div>
                        </div>`;
        }
        $('#cards').html(output);
    } //success
});

$('.saveNewComment').on('click',function(){

    var data = {
        'firstName' : $('#firstName').val(),
        'lastName' : $('#lastName').val(),
        'email' : $('#email').val(),
        'tone' : $('#tone').val(),
        'comment' : $('#comment').val(),
        'structureId' : $('#structureId').val(),
    }
    //saving the new comment
    $.ajax({
        type : "POST",
        url : "/",
        dataType : "json",
        data : data,
        success: function (data){
            $('#newComment').modal('hide');
            $('#newComment').reset();
        },
        error: function(data){
            var errormsg="";
            var errors = Object.entries(data.responseJSON.errors).map(([key, value]) => ({key,value}));

            errorOutput = "";
            for(let i=0;i < errors.length ;i++){
                errorOutput += `<div class="alert alert-danger" role="alert">${err = errors[i].value[0]}</div>`;
            }
            $('#errormsg').empty().html(errorOutput);
        },
    });
});

$('.closeNewForm').on('click', function(){
        console.log("Reset");
        $('#newCommentForm').trigger("reset");
});

