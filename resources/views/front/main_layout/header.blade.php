<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="index.html">Tour</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="#">Home</a></li>
                        <li class="has-dropdown">
                            <a href="tours.html">Destination</a>
                            <ul class="dropdown">
                                @foreach($province as $pro)
                                <li><a href="{{route('province',$pro->id)}}">{{$pro->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#register" data-toggle="modal">Register</a></li>
                        <li><a href="#login" data-toggle="modal">Login</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
        <li style="background-image: url(images/img_bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                        <div class="slider-text-inner text-center">
                            <h2>by colorlib.com</h2>
                            <h1>Find Tours</h1>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>