function validateField(value, msgErrorName, field) {

    if (value === '') {
        msgErrorName.textContent = `The field for the ${field} is required!`;
        return  false;
    }else{
        if (value <= 0) {
            msgErrorName.textContent = `Value of ${field} needs to be larger than 0`;
            return false;
        }else{
            msgErrorName.textContent = " ";
            return  true;
        }
    }
}

$(document).ready(function () {
    $('.add-price').hide();
    $("#btnShowFormAddPrice").click(showFormAddPrice);
    function showFormAddPrice(e){
        // e.preventDefault();
        console.log('show form for create new price');
        $(".add-price").slideDown('slow');
    }
    $("#btnAddPriceValue").on("click", insertNewPrice);
    function insertNewPrice(e) {
        e.preventDefault();
        console.log("insert new price");

        let price = $("#tbPriceAdd").val().trim();

        let msgErrorPrice = document.querySelector(".msgErrorPrice");

        let valueField = $("#tbPriceAdd").data('field');

        let success = validateField(price,msgErrorPrice, valueField)

        if(success){
            $.ajax({
                url: baseUrlAdmin + "/prices",
                method:"POST",
                data: {
                    'price':price,
                    '_token':token
                },
                success: function (data) {
                    console.log(data);
                    console.log(data.message);
                    alert(data.message);
                    $(".add-price").slideUp("500");
                    window.location.reload();
                },
                error: function (xhr, error,status) {
                    let code = xhr.status;
                    console.log(xhr);
                    console.log(code);
                },
                dataType:"json"
            });
        }


    }

})
