<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/myScripts/newsletter.js') }}"></script>
<script>
    const token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
</script>

<script type="text/javascript">
    var linkAutor=document.getElementById("autor");
    var zatvori=document.getElementById("zatvori0");
    linkAutor.addEventListener("click",otvoriModal);
    zatvori.addEventListener("click",zatvoriModal);

    //modal - autor page
    function otvoriModal(){
        document.getElementById("modal0").style.display="block";
    }
    function zatvoriModal(){
        document.getElementById("modal0").style.display="none";
    }

    var modal = document.getElementById('modal0');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>

<script type="text/javascript">
    var url = `{{ url("/") }}`
    var publicImagesStorage = `{{ url("/storage/assets/img/room/") }}`
</script>
