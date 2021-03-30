/**
 * contact messages
 *
 * **/
function validateField(value, msgErrorName, field) {
    let valid = true;
    console.log(value)
    console.log("Type: " + typeof (value))
    if (value === '') {
        msgErrorName.textContent = `The field for the ${field} of contact message is required!`;
        valid = false;
    }else{
        msgErrorName.textContent = " ";
        valid = true;
    }
}

$(document).ready(function () {
    $("#btnSendMessage").on("click", sendMessage);
    function sendMessage(e){
        e.preventDefault();
        console.log('send message');

        let name = $("#tbNameContact").val().trim();
        let email = $("#tbEmailContact").val().trim();
        let subject = $("#tbSubjectContact").val().trim();
        let message = $("#taMessageContact").val().trim();

        let msgErrorName = document.querySelector(".msgErrorName");
        let msgErrorEmail = document.querySelector(".msgErrorEmail");
        let msgErrorSubj = document.querySelector(".msgErrorSubj");
        let msgErrorMessage = document.querySelector(".msgErrorMessage");

        let nameField = $("#tbNameContact").data('field');
        let emailField = $("#tbEmailContact").data('field');
        let subjField = $("#tbSubjectContact").data('field');
        let msgField = $("#taMessageContact").data('field');

        validateField(name, msgErrorName, nameField);
        validateField(email, msgErrorEmail, emailField);
        validateField(subject, msgErrorSubj, subjField);
        validateField(message, msgErrorMessage, msgField);

        $.ajax({
            url: "/contact",
            method:"POST",
            data: {
                'name':name,
                'email': email,
                'subject': subject,
                'message': message,
                '_token':token
            },
            success: function (data) {
                console.log(data);
                console.log(data.message);
                alert(data.message);
                if(data.message === "Message is created successfully"){

                    document.getElementById("tbSubjectContact").value = "";
                    document.getElementById("taMessageContact").value = "";
                }
            },
            error: function (xhr, error,status) {
                let code = xhr.status;
                console.log(xhr);
                console.log(code);
            },
            dataType:"json"
        });

    }

})
