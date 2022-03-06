






//handling of the new form buttons 
const buttons = document.getElementsByClassName('newForm');

//bind an event listener to them
for(let i=0;i < buttons.length ;i++){
    buttons[i].addEventListener('click',function(){
        var targetDiv = buttons[i].getAttribute('data-name');
        var selector = "#"+targetDiv+"_form";
        console.log("Selector: " + selector);
        var editForm = $(selector);

        if(editForm.css('display') == "none"){
        $(editForm).slideDown( "slow", function(){});
        $(editForm).fadeIn( "slow", function(){

            editForm.css('display' , 'block');
        });

        }else{
        $(editForm).slideUp( "slow", function(){});
        $(editForm).fadeOut( "slow", function(){

            editForm.css('display' , 'hidden');
        });
        }
    });
}



const closeButtons = document.getElementsByClassName('closeFormButton');

    for(let i=0;i < closeButtons.length ;i++){
        
    closeButtons[i].addEventListener('click',function(){
        var targetDiv = closeButtons[i].getAttribute('data-name');
        var selector = "#"+targetDiv+"_form";
        var editForm = $(selector);

        console.log("Selector: " + selector);

        $(editForm).slideUp( "slow", function(){});
        $(editForm).fadeOut( "slow", function(){

            editForm.css('display' , 'hidden');
        });
    });

    }
