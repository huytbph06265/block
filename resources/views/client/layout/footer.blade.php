<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="footer-widget">
                    <!-- Logo -->
                    <a href="index.html" class="foo-logo"><img src="img/core-img/logo2.png" alt=""></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="footer-social-info">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="footer-widget">
                    <h6 class="widget-title">Categories</h6>
                    <nav class="footer-widget-nav">
                        <ul>
                            @foreach($category as $cate)
                            <li><a href="{{route('cate',['id'=>$cate->id])}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$cate->name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <!-- Copywrite Text -->
                <div class="col-12 col-sm-6">
                    <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
</footer>
