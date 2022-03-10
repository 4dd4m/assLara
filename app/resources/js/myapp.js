$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function renderAllComments(){
console.log("Rendering all comments");
//render all comments
$('#commentTable .datarow').remove();
$.ajax({
    type : "GET",
    url : "/comment",
    dataType : "json",
    success: function (data){

        var output = "";
        var currentStructure = "";
        for(let i=0;i < data.length;i++){

            //action button itional options 
            var e = data[i];
            var tone = e.tone == 1 ? "Positive" : "Negative";
            var isApproved = e.isApproved == 1 ? "Approved" : "Pending";
            var approve_disabled = e.isApproved == 1 ? "disabled" : "";
            var edit_disabled = e.isApproved == 1 ? "disabled" : "";
            
            //render the action buttons
            var edit = `<div class="btn-group" role="group" aria-label="Basic example">
                        <button data-rowid="${e.id}" ${approve_disabled} data-action="approve" type="button" class="actionButton btn btn-sm btn-success">A</button>
                        <button data-rowid="${e.id}" ${edit_disabled} data-action="edit" type="button" class="actionButton btn  btn-sm btn-primary">E</button>
                        <button data-rowid="${e.id}" data-action="delete" type="button" data-struct="${e.code}" class="actionButton btn btn-sm btn-danger">D</button>
                        </div>`;

            output += `<tr id="${e.id}" class="datarow"><td class="bold">${e.code}${e.id}</td>
            <td>${e.firstName} ${e.lastName}</td>
            <td>${e.comment}</td>
            <td>${tone}</td>
            <td>${isApproved}</td>
            <td>${edit}</td>
            </tr>`;

        }
        //$('#commentTable').append(output);
        $('#commentTable thead').append(output);
        bindActionButtons();

    } //success
});
}

renderAllComments();









// save a new comment
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

    //if the hidden field not empty, that means we do a UPDATE request
    var type = commentId.length > 1 ? "UPDATE" : "POST";

    $.ajax({
        type : type,
        url : "/comment",
        dataType : "json",
        data : data,
        success: function (data){
            $('#newComment').modal('hide');
            $('#newCommentForm').trigger('reset');
            output = "";
            var tone = data.tone == 1 ? "Positive" : "Negative";
            var isApproved = data.isApproved == 1 ? "Approved" : "Pending";
            var approve_disabled = isApproved == 1 ? "disabled" : "";
            var edit_disabled = isApproved == 1 ? "disabled" : "";

            output  += `<div class="btn-group" role="group">
              <button data-rowid="${data.id}" ${approve_disabled} data-action="approve" type="button" class="actionButton btn btn-sm btn-success">A</button>
              <button data-rowid="${data.id}" ${edit_disabled} data-action="edit" type="button" class="actionButton btn  btn-sm btn-primary">E</button>
              <button data-rowid="${data.id}" data-action="delete" data-struct="${data.code}" type="button" class="deleteButton actionButton btn btn-sm btn-danger">D</button>
                </div>`;

            output += `<tr class="new" id="${data.id}"><td class="bold">${data.code}${data.id}</td>
            <td>${data.firstName} ${data.lastName}</td>
            <td>${data.comment}</td>
            <td>${tone}</td>
            <td>${isApproved}</td>
            <td>${edit}</td>
            </tr>`;
            $('#commentTable tbody').prepend(output);
            bindActionButtons()
            displayCommentModal(data.id); 
            $('html,body').animate({scrollTop: $("#databaseHeader").offset().top},'slow');
        },
        error: function(data){
            //rendering errors above the form
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
    $('#newCommentForm').trigger("reset");
    $('#errormsg').empty();
});

function bindActionButtons(){
    //bind actionbuttons records
    //the problem is here the DOM loads faster than the ajax query
    //so have to call it after the buttons are loaded



    $('.closeNewForm').on('click', function(){
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

        switch(action){ //if the action is 
            case "edit":
                console.log('edit'); 
                console.log('query on id: ' + rowId);

                //request a full record and fill the data back
                $.ajax({
                    type : "GET",
                    url : "/comment/" + rowId,
                    dataType : "json",
                    success: function (data){
                        //fill back the form
                        $('#firstName').val(data[0].firstName);
                        $('#lastName').val(data[0].lastName);
                        $('#comment').val(data[0].comment);
                        $('#email').val(data[0].email);
                        $('#structureId').val(data[0].structureId);
                        $('#tone').val(data[0].tone);
                        $('#commentId').val(rowId);
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
                break;
        }
    });
}

//delete a comment (click delete in modal)
$('#deleteCommentId').on('click',function(){
    var commentId = this.getAttribute('data-id');
    var structureCode = this.getAttribute('data-struct');
    $.ajax({
        type : "DELETE",
        url : "/comment/" + commentId,
        dataType : "json",
        success : function(data){
        $('#commentTable thead:after').empty();
        $('#counter_'+structureCode).val( $('#counter_'+structureCode).val() + 1  );
        },
    });
    $('#deleteModal').modal('hide');
    var commentId = this.setAttribute('data-id', "-1");
    renderAllComments();
});


$('table').on('click', '', function(e){
   $(this).closest('tr').remove()
})
