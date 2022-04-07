$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});

let currentscrollpos;

function renderAllComments(structure=null){
    console.log("Rendering all comments");
    //render all comments
    $('#tbody').empty();
    const url = structure == null || structure == "" ? "/comment" : "comment/cat/" + structure
    $.ajax({
        type : "GET",
        url : url,
        dataType : "json",
        success: function(data){
            var output = "";
            for(let i=0;i < data.comments.length;i++){

                //action button itional options 
                var e = data.comments[i];
                var tone = e.tone == 1 ? "Positive" : "Negative";
                var isApproved = e.isApproved == 1 ? "Approved" : "Pending";
                var isApprovedClass;
                var edit;

                if(data.isAuth == true){
                    isApprovedClass = e.isApproved == 1 ? "approved" : "";
                    edit = `<div class="btn-group" role="group" aria-label="Basic example">
                        <button data-rowid="${e.id}" 
                        data-action="approve" type="button" class="actionButton 
                        btn approveComment btn-sm btn-success">A</button>

                        <button data-rowid="${e.id}" data-action="edit"
                        type="button" class="actionButton btn  btn-sm btn-primary">E</button>

                        <button data-rowid="${e.id}" data-action="delete" type="button"
                        data-struct="${e.code}" class="actionButton btn btn-sm 
                        btn-danger">D</button>
                        </div>`;
                }

                output += 
                    `<tr id="comment_${e.id}" class="datarow ${isApprovedClass}">
                    <td><div class="form-check">
                      <input class="form-check-input clipboardBox" type="checkbox" value="${e.id}" />
                    </div></td>
                    <td class="bold">${e.code}${e.id}</td>
                    <td>${e.firstName} ${e.lastName}</td>
                    <td id="commentText_${e.id}">${e.comment}</td>
                    <td>${tone}</td>
                    <td>${isApproved}</td>`;
                output += data.isAuth == true ?  `<td>${edit}</td>` : "";
                output += `</tr>`;
            }
            $('#tbody').empty();
            $('#tbody').append(output);
            bindActionButtons();
        } //success
    });   //ajax
}

renderAllComments();

// update or save a new comment
$('.newCommentFormSaveButton').on('click',function(){

    //getting the form elements
    var data = {
        'firstName' : $('#firstName').val(),
        'lastName' : $('#lastName').val(),
        'email' : $('#email').val(),
        'tone' : $('#tone').val(),
        'comment' : $('#comment').val(),
        'structureId' : $('#structureId').val(),
        'commentId' : $('#commentId').val(),
    }

    console.log("Save button hit with commentId: " + data.commentId);
    var type = data.commentId.length > 1 ? "PATCH" : "POST";
    var url = data.commentId.length > 1 ? "/comment/" + data.commentId : "/comment";
    console.log("Request type is: " + type);

    //if the hidden field not empty, that means we do a UPDATE request
    $.ajax({
        type : type,
        url : url,
        dataType : "json",
        data : data,
        success: function(data){
            $('#newComment').modal('hide');
            $('#newCommentForm').trigger('reset');
            output = "";
            var tone = data.tone == 1 ? "Positive" : "Negative";
            var isApproved = data.isApproved == 1 ? "Approved" : "Pending";
            var approve_disabled = isApproved == 1 ? "disabled" : "";
            var edit_disabled = isApproved == 1 ? "disabled" : "";
            console.log(data[0].id);

            var edit  = `<div class="btn-group" role="group">

              <button data-rowid="${data.id}" ${approve_disabled}
              data-action="approve" type="button" class=" {{$isApprovedClass}} 
              actionButton btn btn-sm btn-success">A</button>

              <button data-rowid="${data.id}" ${edit_disabled} 
              data-action="edit" type="button" class="actionButton 
              btn  btn-sm btn-primary">E</button>

              <button data-rowid="${data.id}" data-action="delete" 
              data-struct="${data.code}" type="button" class="deleteButton
              actionButton btn btn-sm btn-danger">D</button>
              </div>`;

            output += `<tr class="new" id="${data.id}">
            <td>
            <div class="form-check">
            <input class="form-check-input clipboardBox"
                type="checkbox" value="${data.id}" />
            </div>
            </td>
            <td class="bold">${data.code}${data.id}</td>
            <td>${data.firstName} ${data.lastName}</td>
            <td>${data.comment}</td>
            <td>${tone}</td>
            <td>${isApproved}</td>
            <td>${edit}</td>
            </tr>`;
            //bind buttons
            bindActionButtons();
            //a modal to displaying the values
            showConfirmedModal();
            //render all comments
            renderAllComments();
            $("html, body").animate({ scrollTop: window.currentscrollpos }, 500);
        },

        error: function(data){
            //rendering errors above the form
            var errors = Object.entries(data.responseJSON.errors).map(
                ([key, value]) => ({key,value})
            );
            errorOutput = "";
            for(let i=0;i < errors.length ;i++){
                errorOutput += `<div class="alert alert-danger" role="alert">
                                    ${err = errors[i].value[0]}
                                </div>`;
            }
            $('#errormsg').empty().html(errorOutput);
        },

    });
});


function bindActionButtons(){
    //bind action button records
    //the problem is here the DOM loads faster than the ajax query
    //so have to call this after the buttons are loaded

    $('closeNewForm').on('click', function(){
        $('#newCommentForm').trigger("reset");
        $('#errormsg').empty();
    });

    $('.newForm').on('click', function(){
        $('#newCommentForm').trigger("reset");
        $('#errormsg').empty();
    });

    $('.actionButton').on('click', function(){

        //get the action of the button and the id
        var rowId = this.getAttribute('data-rowid');
        var action = this.getAttribute('data-action');
        window.currentscrollpos = $(window).scrollTop();

        switch(action){
                //if the action is 
            case "edit":
                console.log('edit'); 
                console.log('query on id: ' + rowId);

                //request a full record and fill the data back
                $.ajax({
                    type : "GET",
                    url : "/comment/" + rowId,
                    dataType : "json",
                    success: function(data){
                        //fill back the form
                        $('#firstName').val(data[0].firstName);
                        $('#lastName').val(data[0].lastName);
                        $('#comment').val(data[0].comment);
                        $('#email').val(data[0].email);
                        $('#structureId').val(data[0].structureId);
                        $('#tone').val(data[0].tone);
                        $('#commentId').val(data[0].id);
                        $('#newComment').modal('show');
                        console.log(data);      
                    }
                });

                //fill up modal
                break;
            case "delete":
                //ask if not approved or permission
                //modal yes - or - no
                $('#deleteModal').modal('show');
                $('#deleteCommentId').attr('data-id',rowId);
                break;
            case "approve":
                console.log('approve'); 
                const commentId = this.getAttribute("data-rowid");
                console.log("What?: " +commentId);
                $.ajax({
                    type : "POST",
                    url : "/toggleApprove",
                    dataType : "json",
                    data : {
                        id : commentId,
                    }});
                renderAllComments();
                break;
        }
    });

    $('.form-check-input').on('change',function(){
        //if we check a checkbox, it push the comment
        clipboard = "";

        var checkboxes = document.getElementsByClassName('form-check-input');

        for(let i=0;i < checkboxes.length ;i++){
            var td = "";

            if(checkboxes[i].checked){
                var selector = '#commentText_'+checkboxes[i].value;
                td = $(selector).text();
                clipboard += td + "\n---------------\n";
            }        

        }
        $('#scratchpadArea').text(clipboard);
        $('#scratchpadArea').val(clipboard);
        console.log(clipboard);
    });


}

//delete a comment (click delete in modal)
$('#deleteCommentId').on('click',function(){
    //
    var commentId = this.getAttribute('data-id');
    var structureCode = this.getAttribute('data-struct');
    $.ajax({
        type : "DELETE",
        url : "/comment/" + commentId,
        dataType : "json",
        success : function(data){
            $('#counter_'+structureCode).val( 
                $('#counter_'+structureCode).val() + 1  
            );
        },
    }).then( function(){
        $('#tbody').empty();
        renderAllComments();
    });



    //if the delete is cancelled, sets the comment's id to ""
    $('#deleteModal').modal('hide');
    var commentId = this.setAttribute('data-id', "");
});

//click on the clipboard button will open the
//clipbaord modal and show the selection
$('#openscratchPad').on('click', function(){
    $('#scratchpad').modal('show');
});

//on close the new comment form modal
//it will empty the form and hide the modal
$('.closeNewForm').on('click', function(){
    $('#newCommentForm').trigger("reset");
    $('#errormsg').empty();
});

function showConfirmedModal(){
    //show the confirmed data modal, display with the last comment data
    $.ajax({
        type : "GET",
        url : "/lastcomment",
        dataType : "json",
        success: function (data){

            let confirmedTone = data.tone == 1 ? "Positive" : "Negative";
            $('#confirmedAuthor').text(data.firstName + " " + data.lastName);
            $('#confirmedComment').text(data.comment);
            $('#confirmedTone').text(confirmedTone);
            $('#confirmedStructure').text(data.name);
            $('#confirmedEmail').text(data.email);
            $('#confirmModal').modal('show');
        }});
}

function isAuth(){
    var result = $.ajax({
        type : "GET",
        url : "/isAuth",
        dataType : "text",
        success: function (data){
            if(data.reponseText == 1){
                console.log("Ajax isAuth returned: " + data);
                return true;
            }
        }});
    return result;
}


$('.filterButton').on('click', function(){
    const structureId = this.getAttribute('data-structureId');
    console.log("What?: " + structureId);
    renderAllComments(structureId);
    return false;
})


$('#toClipboard').on('click', function(){
    
            $("#scratchpadArea").select();
    		document.execCommand('copy');


});

