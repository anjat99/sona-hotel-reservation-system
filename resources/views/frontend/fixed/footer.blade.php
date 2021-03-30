<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('assets/img/footer-logo.png') }}" alt="">
                            </a>
                        </div>
                        <p>We inspire and reach millions of travelers<br /> across 90 local websites</p>
                        <div class="fa-social">
                            @foreach ($socialMedias as $social)
                                <a href="{{ $social->path }}"><i class="{{ $social->icon }}"></i></a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Contact Us</h6>
                        <ul>
                            <li>(+381) 345 67890</li>
                            <li>info.sona@gmail.com</li>
                            <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>New latest</h6>
                        <p>Get the latest updates and offers.</p>
                        @include('frontend.partials.newsletter-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul>

                        <li>
                            <a id="autor" data-modal="modalAutor">Author</a>
                            <div id="modal0"class="modal0">
                                <div class="sadrzajModala0">
                                    <a id="zatvori0">&times;</a>
                                    <figure id="autorImg">
                                        <img src="{{ asset('assets/img/autor.png') }}" alt="autor"/>
                                    </figure>
                                    <h2>Fullname: Anja Tomić</h2>
                                    <p>Number of index: 7/18</p>
                                    <p>Birthdate: 31.08.1999</p>
                                    <a href="http://tomicanja.com/" target="_blank">Portfolio</a><br>
                                    <p>
                                        Hello! My name is Anja Tomic and I come from Pancevo. This website is made for the course of Web Programming PHP2. If you want to know something more about me you can click on link of my portfolio and contact me anytime....
                                    </p>


                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                </div>
            </div>
        </div>
    </div>
</footer>
