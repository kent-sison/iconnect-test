$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    var recaptcha = $("#g-recaptcha-response").val();

    $.ajax({
        type: "POST",
        url: "contact.php",
        data: "name=" + name + "&email=" + email + "&message=" + message + "&g-recaptcha-response=" + recaptcha,
        success : function(text){
            if (text == "success"){
                $("#contactForm")[0].reset();
                submitMSG(true, "<strong>Email Sent Successfully.</strong><p>Your message is successfully delivered to Value Mobile. Updates regarding your message will be sent to the e-mail address you provided.</p>");
            } else {
                formError();
                submitMSG(false, text);
            }
            grecaptcha.reset();
        }
    });
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    var msgClasses = '';
    
    if (valid) msgClasses = "alert alert-success";
    else msgClasses = "alert alert-danger";

    console.log(valid);

    $("#msgSubmit").removeClass().addClass(msgClasses).html(msg);
}