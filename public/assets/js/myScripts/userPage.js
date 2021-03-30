$(document).ready(function(){
    $(".userSection").css("display","none")
    $(""+section+"").css("display","block")

    $(".userSectionLink").click(function(e){
        e.preventDefault()
        let href = $(this).attr("href")
        $(".userSection").css("display","none")
        $(""+href+"").css("display","block")

        localStorage.setItem('section',href);
        section = localStorage.getItem('section')
        // console.log()
    })


    $(document).on('click','#logOut',function (){

        localStorage.removeItem('section')
    })
})

