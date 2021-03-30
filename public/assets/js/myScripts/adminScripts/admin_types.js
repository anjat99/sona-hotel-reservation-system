

function validateField(value, msgErrorName, field) {
    let valid = true;

    if (value === '') {
        msgErrorName.textContent = `The field for the ${field} is required!`;
        valid = false;
    }else{
        msgErrorName.textContent = " ";
        valid = true;
    }
}


$(document).ready(function () {

    // $('.add-type').hide();
    $("#btnShowFormAddType").click(showFormAddType);
    function showFormAddType(e){
        e.preventDefault();
        console.log('show form for create navlink');
        $(".add-type").slideDown("500");

    }
    $("#btnAddRoomType").on("click", insertType);
    function insertType(e) {
        e.preventDefault();
        console.log("insert type");

        let type = $("#tbNameTypeAdd").val().trim();
        let capacity = $("#tbAddCapacity").val().trim();
        let quantity = $("#tbAddQuantity").val().trim();

        console.log(type)

        let msgErrorNameType = document.querySelector(".msgErrorNameType");
        let msgErrorCapacity = document.querySelector(".msgErrorCapacity");
        let msgErrorQuantity = document.querySelector(".msgErrorQuantity");

        let typeField = $("#tbNameTypeAdd").data('field');
        let capacityField = $("#tbAddCapacity").data('field');
        let quantityField = $("#tbAddQuantity").data('field');

        validateField(type,msgErrorNameType, typeField)
        validateField(capacity,msgErrorCapacity, capacityField)
        validateField(quantity,msgErrorQuantity, quantityField)

        $.ajax({
            url: baseUrlAdmin + "/types",
            method:"POST",
            data: {
                'type':type,
                'capacity': capacity,
                'quantity': quantity,
                '_token':token
            },
            success: function (data) {
                console.log(data);
                console.log(data.message);
                alert(data.message);
                $(".add-type").slideUp("500");
                window.location.reload();
            },
            error: function (data) {
                let code = xhr.status;
                console.log(xhr);
                console.log(code);
                if(data.responseJSON.errors)
                    printErrors(data.responseJSON.errors);
            },
            dataType:"json"
        });
    }

    function printErrors(errors) {
        let content = '<ul class="alert alert-info">';
        for(error of Object.keys(errors)) {
            content += '<li class="text-dark font-weight-bold"> <i class="fas fa-info-circle"></i> &nbsp; '+ errors[error][0] +'</li>';
        }
        content += '</ul>';
        $(".errors").html(content);
    }


})
