function loginValidate() {
    var id = document.getElementById('myid').value;
    var pass = document.getElementById('mypassword').value;
    if ((id == null || id == "") && (pass == null || pass == "")) {
        alert("Introduce Nombre y Pasword");
        return false;
    }
    else if (id == null || id == "") {
        alert("Introduce el Nombre");
        return false;
    }
    else if (pass == null || pass == "") {
        alert("Introduce el password");
        return false;
    }
    else {
        return true;
    }
}

(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).val().trim() == ''){
            return false;
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }


})(jQuery);