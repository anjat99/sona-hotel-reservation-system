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
    $('.add-navlink').hide();
    $("#btnShowFormAddNavlink").click(showFormAddNavlink);
    function showFormAddNavlink(e){
        e.preventDefault();
        console.log('show form for create navlink');
        $(".add-navlink").slideDown("500");

    }
    $("#btnAddNavlink").on("click", insertNavlink);
    function insertNavlink(e) {
        e.preventDefault();
        console.log("insert navlink");

        let name = $("#tbName").val().trim();
        let url = $("#tbUrl").val().trim();
        let order = $("#tbOrder").val().trim();

        let msgErrorNameLink = document.querySelector(".msgErrorNameLink");
        let msgErrorUrlLink = document.querySelector(".msgErrorUrlLink");
        let msgErrorOrderLink = document.querySelector(".msgErrorOrderLink");

        let nameField = $("#tbName").data('field');
        let urlField = $("#tbUrl").data('field');
        let orderField = $("#tbOrder").data('field');

        validateField(name,msgErrorNameLink, nameField)
        validateField(url,msgErrorUrlLink, urlField)
        validateField(order,msgErrorOrderLink, orderField)

        $.ajax({
            url: baseUrlAdmin + "/menus",
            method:"POST",
            data: {
                'name':name,
                'url': url,
                'order': order,
                '_token':token
            },
            success: function (data) {
                console.log(data);
                console.log(data.message);
                alert(data.message);
                $(".add-navlink").slideUp("500");
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
