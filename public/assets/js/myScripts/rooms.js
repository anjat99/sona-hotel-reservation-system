function ajaxRooms(keyword, sort, services, types, page, freeRooms , showAllRooms) {
    $.ajax({
        url: "/api/rooms",
        method: "get",
        data: {
            keyword: keyword,
            sort: sort,
            services: services,
            types: types,
            page: page,
            freeRooms: freeRooms
        },
        success: function (response) {
            console.log(response)
            console.log(response.rooms);
            // console.log(response.rooms);
            console.log(response.rooms.links);
            if ((response.rooms.data).length != 0) {
                showAllRooms(response.rooms.data, response.rooms.links);
            } else {
                $("#rooms").html("<h3 class='text-danger notification'>Sorry, the room with your search doesn't exists yet in our database. Please contact administrator in case you want to add that room to our collection if we somehow forget it... </h3>");
            }
        },
        error: function (xhr) {
            let code = xhr.status;
            console.log(xhr);
            console.log(code);
        },
        dataType: "json"
    });
}

//region PRINTING DATE FORMAT OF REVIEWS
function printDate(dateForCheck){
    //2021-03-07T21:45:17.000000Z
    let currentDate = dateForCheck.toString();

    let date = currentDate.split('T')[0];
    let datePart2 = currentDate.split('T')[1];
    let hours = datePart2.split('.')[0];

    return `${date} ${hours}`;
}
//endregion

$(document).ready(function(){
    var keyword = "";
    var sort = 0;
    var services = [];
    var types = [];
    var page = 1;
    var freeRooms = "";

    //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
    console.log("Key:" + keyword);
    console.log("Sort:" +sort);
    console.log("Services:" + services);
    console.log("Types:" + types);
    console.log("Page:" + page);
    console.log("FreeRooms:" + freeRooms);
    //endregion

    ajaxRooms(keyword, sort, services, types, page,freeRooms, showAllRooms);

    //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
        console.log("Sort:" +sort);
        console.log("Services:" + services);
        console.log("Types:" + types);
        console.log("Page:" + page);
        console.log("FreeRooms:" + freeRooms);
    //endregion

    /************************************************************************************************************/


    //region SHOW/HIDE FORM FOR REVIEWS
    $('.review-add').hide();
    $("#btnShowFormAddReview").click(showFormAddReview);
    function showFormAddReview(e){
        e.preventDefault();
        console.log('show form for create review');
        $(".review-add").slideToggle("500");
    }
    //endregion

    $("#btnAddReview").on("click", insertReview);
    //region INSERTING REVIEWS
    function insertReview(e){
        e.preventDefault();
        console.log("insert review");

        let message = $("#taMessageReview").val().trim();
        let room = $(this).data('room');

        let msgError = document.querySelector("#msgError");
        let errors=[];
        let valid=true;

        if(message == ''){
            errors.push('<b>The field for the text of review is required!</b>')
            msgError.textContent = "The field for the text of review is required!";
            alert ("The field for the text of review is required!");
            valid = false;
        }

        $.ajax({
            url: "/user/reviews-manage",
            method:"POST",
            data: {
                'message':message,
                'room': room,
                '_token':token
            },
            success: function (data) {
                console.log(data);
                console.log(data.message);
                alert(data.message);

                if(data.message === "Review is created successfully"){
                    console.log('if')
                    document.getElementById("taMessageReview").value = "";
                    printReviews(data.reviews);
                    $('.review-add').hide();
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
    //endregion

    //region PRINTING REVIEWS
    function printReviews(data){
        console.log(data);

        let output = ``;
        for(let d of data){
            output += `
            <div class="review-item">
                <div class="ri-pic">
                    <img src="${ url + "/assets/img/profileUser.png"}" alt="${d.rooms[0].name}">
                </div>
                <div class="ri-text">
                    <span> ${printDate(d.created_at)}</span>

                    <h5>${d.user.firstname}  ${d.user.lastname}</h5>
                    <p>${d.message}</p>

                </div>
            </div>`;
        }

        $("#reviews").html(output);
    }
    //endregion

    /*************************************************************************************************************/

    //region PAGINATION
    $(document).on("click",".page-link", function (e) {
        e.preventDefault();
        page = parseInt($(this).data('page'));

        //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
        console.log("Sort:" +sort);
        console.log("Services:" + services);
        console.log("Types:" + types);
        console.log("Page:" + page);
        console.log("FreeRooms:" + freeRooms);
        //endregion

        ajaxRooms(keyword, sort, services, types, page, freeRooms, showAllRooms);
    })
    //endregion

    //region SEARCH
    $("#keyword").on("keyup", function(){
        // console.log($(this).val().trim());
        keyword = $(this).val().trim();

        //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
        console.log("Sort:" +sort);
        console.log("Services:" + services);
        console.log("Types:" + types);
        console.log("Page:" + page);
        console.log("FreeRooms:" + freeRooms);
        //endregion

        ajaxRooms(keyword, sort, services, types, page, freeRooms, showAllRooms);
    });
    //endregion

    //region SORT BY NAME AND PRICE - ASC/DESC
    $("#sort").on("change", function(){
        // alert("sort");

        sort = $(this).val();

        //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
        console.log("Sort:" +sort);
        console.log("Services:" + services);
        console.log("Types:" + types);
        console.log("Page:" + page);
        console.log("FreeRooms:" + freeRooms);
        //endregion

        ajaxRooms(keyword, sort, services, types, page, freeRooms, showAllRooms);

    });
    //endregion

    //region FILTER BY SERVICES
    $(".services").on("change", function(e){
        e.preventDefault();

        //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
        console.log("Sort:" +sort);
        console.log("Services:" + services);
        console.log("Types:" + types);
        console.log("Page:" + page);
        console.log("FreeRooms:" + freeRooms);
        //endregion

        let service = parseInt($(this).val());
        console.log(service);

        services.includes(service) ?  services.splice (services.indexOf(service), 1) : services.push(service)
        console.log(services);

        ajaxRooms(keyword, sort, services, types, page, freeRooms, showAllRooms);
    });
    //endregion

    //region FILTER BY TYPES
    $(".types").on("change", function(e){
        e.preventDefault();

        //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
         console.log("Sort:" +sort);
         console.log("Services:" + services);
         console.log("Types:" + types);
         console.log("Page:" + page);
        //endregion

        let type = parseInt($(this).val());
        console.log(type);

        types.includes(type) ? types.splice (types.indexOf(type), 1) : types.push(type)

        console.log(types)
        ajaxRooms(keyword, sort, services, types, page, freeRooms, showAllRooms);
    });
    //endregion

    //region FILTER BY AVAILABILITY
    $(".freeRooms").on("change", function(e){
        // e.preventDefault();

        //region CONSOLE.LOGS FOR FILTERS/SORT/PAGES/SEARCH
        console.log("Key:" + keyword);
        console.log("Sort:" +sort);
        console.log("Services:" + services);
        console.log("Types:" + types);
        console.log("Page:" + page);
        console.log("Free room:" + freeRooms);
        //endregion

        $(this).is(':checked') ? freeRooms = $(this).data("free") : freeRooms = "";

        console.log(freeRooms);

        ajaxRooms(keyword, sort, services, types, page, freeRooms, showAllRooms);
    });
    //endregion


    //region PRINTING ROOMS AND PAGINATION
    function showAllRooms(rooms, pages) {
        // console.log(pages);
        let output = ``;
        rooms.forEach(room => {
            output += `
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="${publicImagesStorage + '/' +  room.image.path}" alt="${room.roomName}">
                        <div class="ri-text">
                            <h4>${room.roomName}</h4>
                            <h3> ${Math.round(room.price.price)}$<span>/night</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>${room.size}m<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td><i class="fas fa-female"></i> x${room.capacity}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Type:</td>
                                        <td>${room.typeName} </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="${url + /rooms/ + room.id}" data-room="${room.id}" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div> `;
        });



        //region PRINTING PAGINATION
        for(page of pages){
            // console.log(pages);
            if(pages.length <= 3){
                output += "";
            }else{
                output += `
                 <div class="">
                    <div class="room-pagination ">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item ${page.active ? 'active' : ''}" >
                                    <a class="page-link" data-page="${page.label}" href="#">${page.label}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                 </div>
            `;

            }
        }
        //endregion

        $("#rooms").html(output);
    }
    //endregion

    /************************************************************************************************************/


    $(".fa-star").click(function(){
        var rate=$(this).data("id");
        var room=$(this).data("room");
        console.log(rate);
        console.log(room);
        $.ajax({
            url:"/user/rating-room",
            method:"post",
            dataType:"json",
            data:{
                room:room,
                grade:rate,
                _token: token
            },
            success:function(data){
                console.log(data.length)
                console.log(data.message)
                alert(data.message)

                // printStars(rate);
                // if(data.message == 'Successfully voted'){
                //     alert("Successfully voted");
                    window.location.reload();
                // }
            },
            error:function(xhr){
                // console.log("nije ok");
                console.log("nije ok");
                alert("Already rated this movie!");
                // window.location.reload();
                $("#greskaOcena").html("Already rated this movie")
                ;
            }
        })

        // function printStars(rate){
        //     var output =   ``;
        //     if(rate == null || rate==undefined || rate <= 0){
        //         output =   `<a class="btn btn-danger d-flex align-items-center"> No voted yet!</a>`
        //     }else{
        //         for (let i = 0; i<rate; i++){
        //             output = ` <h3 class="btn btn-warning"> <i class="fas fa-star"></i> </h3>`
        //         }
        //         for (let i = 0; i < 5 - rate; i++){
        //             output = ` <h3 class="btn btn-warning"> <i class="far fa-star"></i> </h3>`
        //         }
        //
        //     }
        //     $("#ratings").html(output);
        // }
    })

    /***********************************************************************************/

    console.log("reservation")


    $(".btnReservation").on("click", function (e) {
        e.preventDefault();
        let room = $(this).data('room');
        console.log(room)

        let quantity = $(this).data("quantity");
        let availability_type_id = $(this).data("at");

        let name = $('#name').val().trim();
        console.log("Name: " + name)

        let phone = $('#phone').val().trim();
        console.log("Phone: " + phone)


        let dateIn = new Date($('#date-in').val());
        let dayIn = dateIn.getDate();
        let monthIn = dateIn.getMonth() + 1;
        let yearIn = dateIn.getFullYear();

        let checkInDate = [yearIn, monthIn, dayIn].join('-');
        console.log("Checkin date: " + checkInDate)


        let dateOut = new Date($('#date-out').val());
        let dayOut = dateOut.getDate();
        let monthOut = dateOut.getMonth() + 1;
        let yearOut = dateOut.getFullYear();

        let checkOutDate = [yearOut, monthOut, dayOut].join('-');
        console.log("Checkout date: " + checkOutDate)

        var d = new Date(),
            h = d.getHours(),
            m = d.getMinutes();
            if(h < 10) h = '0' + h;
            if(m < 10) m = '0' + m;
        $('input[type="time"][value="in"]').each(function(){
            $(this).attr({'value': h + ':' + m});
        });
        // console.log("Checkin time: " + $('#time-in').val())

        $('input[type="time"][value="out"]').each(function(){
            $(this).attr({'value': h + ':' + m + ':' + '00'});

        });

        // console.log("Checkout time: " + $('#time-out').val())


        let check_in = checkInDate + " " + $('#time-in').val()
        console.log(Date.parse(check_in))

        let check_out = checkOutDate + " " + $('#time-out').val()
        console.log(Date.parse(check_out))

        let numberPeople = $('#no-people option:selected').val();
        console.log("Number of people: " + numberPeople)


        let dailyPrice = $(this).data("dailyprice");

        var price;



        var differenceInTime = Date.parse(check_out) - Date.parse(check_in);
        var differenceInDays = Math.round(differenceInTime / (1000 * 3600 * 24)) ;
        console.log(differenceInDays);

        var sumPrice = dailyPrice * differenceInDays * numberPeople;
        // price = sumPrice;
        if(differenceInDays > 3){
            price = Math.round(sumPrice - 15/100 * sumPrice) ;
        }else if(differenceInDays > 5){
            price = Math.round(sumPrice - 20/100 * sumPrice);
        }
        else if(differenceInDays > 10 && differenceInDays <= 14){
            price = Math.round(sumPrice - 30/100 * sumPrice);
        }else{
            price = Math.round(sumPrice);
        }
        console.log(price);

        $.ajax({
            url: "/user/reservation",
            method:"POST",
            data:{
                name:name,
                phone:phone,
                room: room,
                quantity:quantity,
                availability_type_id:availability_type_id,
                price:price,
                numberPeople:numberPeople,
                check_in:check_in,
                check_out:check_out,
                _token:token
            },
            success:function (response) {
                console.log(response);
                console.log(response.details);
                console.log(response.quantity);
                alert(response.message);
                printReservationDetails(response.details);
            },
            error:function (xhr) {
                console.log(xhr)
                $(".errors").text(xhr.responseJSON.message);

            },
            dataType:"JSON"
        })

        function printReservationDetails(details) {
            console.log(room)
            let output = ``;
            output += `<h3>RESERVATION DETAILS:</h3>`;
                output += `<table class="table tablesorter">
                             <tbody>
                                <tr>
                                    <th class="text-center">
                                        BOOKED ON NAME
                                    </th>
                                     <td class="text-center">
                                         ${details.name}
                                      </td>
                                </tr>
                                <tr>
                                    <th class="text-center">
                                        CONTACT PHONE
                                    </th>
                                    <td class="text-center">
                                        ${details.phone}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">
                                        ROOM NAME
                                    </th>
                                     <td class="text-center">
                                        ${details.room.name}
                                     </td>
                                </tr>
                                 <tr>
                                    <th class="text-center">
                                        NO. OF PEOPLE
                                    </th>
                                    <td class="text-center">
                                        ${details.no_people}
                                    </td>
                                 </tr>
                                 <tr>
                                    <th class="text-center">
                                        CHECK IN
                                    </th>
                                    <td class="text-center">
                                        <span> ${printDate(details.check_in)}</span>
                                    </td>
                                  </tr>
                                 <tr>
                                    <th class="text-center">
                                        CHECK OUT
                                    </th>
                                    <td class="text-center">
                                        <span> ${printDate(details.check_out)}</span>
                                    </td>
                                  </tr>
                                     <tr>
                                        <th class="text-center">
                                            TOTAL PRICE
                                        </th>
                                         <td class="text-center">
                                            ${details.sum_price}$
                                         </td>
                                     </tr>
                                     <tr>
                                         <td colspan="2" class="text-center">
                                            <a href="${url + '/user/profile#reservations'}" class="btn btn-success">CLOSE AND SEE  OTHER RESERVATIONS</a>
                                         </td>
                                     </tr>

                                </tbody>
                                </table>`;

                $('#reservation_details').html(output)
        }

    });




})
