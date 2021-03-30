$(document).ready(function(){

    $(document).on('click','#btnSendNews',function (e){
        e.preventDefault()
        let valid = true;
        let email = $("#emailNews").val().trim();
        let msgError = document.querySelector(".msgError");
        console.log(email)
        if (email === '') {
            msgError.textContent = `The field for the email of newsletter is required!`;
            valid = false;
        }else{
            msgError.textContent = " ";
            valid = true;
        }

        $.ajax({
            url: "/newsletter",
            method: "POST",
            data: {
                'email': email,
                '_token':token
            },
            success: function (data) {
                console.log(data);
                console.log(data.message);
                alert(data.message);
                if(data.message === "Successfully subscribed to our newsletter. We hope you enjoyed in news!"){
                    document.getElementById("emailNews").value = "";
                }
            },
            error: function (xhr, data) {
                let code = xhr.status;
                console.log(xhr);
                console.log(code);
                console.log(data)
                if(xhr.responseJSON.message == "Already subscribed to our newsletter!"){
                    $(".msgError").html("Already subscribed to our newsletter!");
                    document.getElementById("emailNews").value = "";
                }
            },
            dataType:"json"
        })

    })
})

