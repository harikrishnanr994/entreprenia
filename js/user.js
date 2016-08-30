$("#register-form").validate({
            rules: {
                fname: {
                    required: true,
                    minlength: 4
                },
                lname: {
                    required: true
                },
                pwd: {
                    required: true,
                    minlength: 5
                },
                cpwd: {
                    required: true,
                    minlength: 5,
                    equalTo: "#pwd"
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength:10,
                    maxlength:10
                },
                college: {
                    required: true
                },
                gender: {
                    required: "#gender:checked"
                }
            },
            messages: {
                fname: {
                    required: "Please enter a first name",
                    minlength: "Your first name must consist of at least 4 characters"
                },
                lname: {
                    required: "Please enter a last name"
                },
                pwd: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cpwd: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                phone: {
                    required: "Please provide a phone number",
                    minlength: "Your password must be 10 digit number",
                    digits: "Please enter a valid phone number"
                },
                gender: {
                    required: "Please identify your gender"
                },
                college: {
                    required: "Please search for your college"
                }
            }
        });
$(document).ready(function() {
    $('#register-form').submit(function(event) {
        event.preventDefault();

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        $.ajax({
            type        : 'POST',
            url         : 'action_register.php',
            data        : $("#register-form").serialize(),
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                console.log(data); 
                if ( ! data.success) {
                    if (data.errors.email) {
                        $("#error").fadeIn().show();
                        $("#error").html(data);
                        $('#email-group').addClass('has-error');
                        $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); 
                    }
                } else {
                    $("#message").fadeIn().show();
                    $("#register-form")[0].reset();
                }
            })

            .fail(function(data) {
                console.log(data);
                $("#error").fadeIn().show();
            });

        
    });

});

$('#login-form').submit(function(event) {
        event.preventDefault();

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        $.ajax({
            type        : 'POST',
            url         : 'login.php',
            data        : $("#login-form").serialize(),
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                console.log(data); 
                if ( ! data.success) {
                    if (data.errors) {
                        $('#error-login').fadeIn().show();
                        if (data.errors.pwd) {
                        $('#error-login').append('<div class="alert alert-danger">' + data.errors.pwd + '</div>');
                    }

                    if (data.errors.email) {
                        $('#error-login').append('<div class="alert alert-danger">' + data.errors.email + '</div>');
                    }
                    if (data.errors.act) {
                        $('#error-login').append('<div class="alert alert-danger">' + data.errors.act + '</div>');
                    }

                    }
                } else {
                    $("#message-login").fadeIn().show();
                    $("#reg-form")[0].reset();
                    window.location.replace("index.php");
                }
            })
            .fail(function(data) {
                $("#errors-login").fadeIn().show();
                console.log(data);
            });
    });

function checkAvailability() {
    jQuery.ajax({
        url: "check_email.php",
        data:'email='+$("#email").val(),
        type: "POST",
        success:function(data){
            $("#availability-status").html(data);
            if(data != '') {
                document.getElementById("submit-btn").disabled = true;
            } else {
                document.getElementById("submit-btn").disabled = false;
            }
        },
        error:function (){}
    });
}

function auto() {
    $( "#college" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: "institute_auto.php",
                dataType: "jsonp",
                data: {
                    q: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        },
        minLength:2
    });
}