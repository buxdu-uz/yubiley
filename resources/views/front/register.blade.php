<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buxoro davlat universiteti tarixi</title>

    <link rel="stylesheet" href="{{ asset('front/Roboto/stylesheet.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css')}}?vers=1749022649">

    <link rel="icon" href="favicon.ico" sizes="16x16">

    <script type="text/javascript" src="{{ asset('front/js/gsap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/ajax/libs/gsap/3.2.4/TextPlugin.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/jquery.lazy.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/ScrollMagic.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/scrollplugins/animation.gsap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/scrollplugins/debug.addIndicators.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/owl.carousel.min.js')}}"></script>


    <noscript>
        <div><img src="{{ asset('front/watch/55789402') }}" style="position:absolute; left:-9999px;" alt=""></div>
    </noscript>

    <script type="text/javascript">
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({id: "3192919", type: "pageView", start: (new Date()).getTime(), pid: "USER_ID"});
        (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
        })(document, window, "topmailru-code");
    </script>

    <noscript><div>
            <img src="counter?id=3192919;js=na" style="border:0;position:absolute;left:-9999px;">
        </div></noscript>

    <style>
        .success{
            color: green;
            font-weight: bold;
            text-align: center;
            font-size: 27px;
            background: #fff;
            border-radius: 32px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="ru pc">

<header id="header">
    <div id="logo" style="background: transparent;">
        <div class="inner">
            <a id="urfu-logo" href="/"><img src="{{ asset('front/images/logoWhite.png') }}"></a>
        </div>
    </div>
    <div id="label" style="color: white;">Buxoro davlat universiteti</div>

    <a id="openMenu"></a>
</header>
<nav role="navigation" id="menu">
    <div id="menu-header"><a id="closeMenu"></a></div>
    <div id="main-menu">
        <ul>
            <li>
                <a href="#">Yangiliklar</a>
            </li>

            <li>
                <a href="#">E'lonlar</a>
            </li>
            <li>
                <a href="#">Universitet tarixi</a>
            </li>
            <li>
                <a href="#">Tabriklar</a>
            </li>
            <li class="active">
                <a href="#">Ro'yxatdan o'tish</a>
            </li>
            <!-- <li id="lang-choice">
                <a class="active" href="index.htm">RU</a>
                <a href="en/index.htm">ENG</a>
            </li> -->
        </ul>
    </div>

</nav>
<div class="load-imgs">
    <img src="{{ asset('front/imgs/machine/1.png')}}">
    <img src="{{ asset('front/imgs/machine/2.png')}}">
    <img src="{{ asset('front/imgs/machine/3.png')}}">
    <img src="{{ asset('front/imgs/machine/4.png')}}">
    <img src="{{ asset('front/imgs/machine/5.png')}}">
    <img src="{{ asset('front/imgs/machine/6.png')}}">
    <img src="{{ asset('front/imgs/machine/7.png')}}">
    <img src="{{ asset('front/imgs/machine/8.png')}}">
    <img src="{{ asset('front/imgs/machine/9.png')}}">
    <img src="{{ asset('front/imgs/machine/10.png')}}">
    <img src="{{ asset('front/imgs/machine/11.png')}}">
    <img src="{{ asset('front/imgs/machine/12.png')}}">
    <img src="{{ asset('front/imgs/machine/13.png')}}">
    <img src="{{ asset('front/imgs/machine/14.png')}}">
    <img src="{{ asset('front/imgs/machine/15.png')}}">
    <img src="{{ asset('front/imgs/machine/16.png')}}">
    <img src="{{ asset('front/imgs/machine/17.png')}}">
    <img src="{{ asset('front/imgs/machine/18.png')}}">
    <img src="{{ asset('front/imgs/machine/19.png')}}">
</div>
<main>

    <div class="wrap buxdu_form">
        <div class="form-parent">
            <h1>Ro‘yxatdan o‘tish</h1>
            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="form-bg" method="post" action="{{ route('register') }}">
                @csrf
                <div>
                    <input type="text" placeholder="To'liq FIO" name="full_name" value="{{ old('full_name') }}">
                    @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <select name="rol" id="" aria-placeholder="Ishtirok etish roli">
                        <option value="1">Ishtirok etish roli</option>
                        <option value="1">Ishtirokchi</option>
                    </select>
                </div>
                <div>
                    <input type="date" placeholder="Tug'ilgan kun" name="birthday"  value="{{ old('birthday') }}">
                    @error('birthday')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <select name="sex" id="sex">
                        <option value="0">Jinsi</option>
                        <option value="male">Erkak</option>
                        <option value="female">Ayol</option>
                    </select>
                    @error('sex')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="email" placeholder="user@gmail.com" name="email"  value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="number" placeholder="998901234567" name="phone"  value="{{ old('phone') }}">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" placeholder="Passport ID" name="passport"  value="{{ old('passport') }}">
                    @error('passport')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Mamlakat" name="country"  value="{{ old('country') }}">
                    @error('country')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div>
                    <input type="text" placeholder="Yashash manzili" name="address"  value="{{ old('address') }}">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Tug'ilgan joy" name="place_of_birth"  value="{{ old('place_of_birth') }}">
                    @error('place_of_birth')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div>
                    <input type="text" placeholder="Tashkilot" name="organization" value="{{ old('organization') }}">
                    @error('organization')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Lavozim" name="position" value="{{ old('position') }}">
                    @error('position')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div>
                    <textarea name="activity" placeholder="Faoliyat" id="" cols="30" rows="4">{{ old('activity') }}</textarea>
                    @error('activity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="text" placeholder="Login" name="login" value="{{ old('login') }}">
                    @error('login')
                        <br>
                        <span style="color: red; font-size: 12px">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Parol" name="password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <button type="submit">Ro'yxatdan o'tish</button>
            </form>
        </div>
    </div>

</main>
<footer id="footer">
    <div class="wrap">
        <div class="col" id="footer-1">
            <a id="footer-logo" href="/"><img src="{{ asset('front/images/logoWhite.png') }}"></a>
            <div class="partners mobile-hide">

                <div id="gen-partner">
                        <span>Buxoro davlat universiteti<br>
                            <nobr>95 yilligi</nobr>
                        </span>

                </div>
            </div>

        </div>
        <div class="col" id="footer-2">
            <h2>Tarix</h2>
            <ul>
                <li><a href="/#y-1920">1930 - 1968</a></li>
                <li><a href="/#y-1968">1968 - 1978</a></li>
                <li><a href="/#y-1978">1978 - 1980</a></li>
                <li><a href="/#y-1980">1980 - 1981</a></li>
                <li><a href="/#y-1981">1981 - 1982</a></li>
                <li><a href="/#y-1982">1982 - 1983</a></li>
                <li><a href="/#y-1983">1983 - 1986</a></li>
                <li><a href="/#y-1986">1986 - 1988</a></li>
                <li><a href="/#y-1988">1988 - 1992</a></li>
                <li><a href="/#y-1992">1992 - 2007</a></li>
                <li><a href="/#y-2007">2007 - 2012</a></li>
                <li><a href="/#y-2012">2012 - 2013</a></li>
                <li><a href="/#y-2013">2013 - 2015</a></li>
                <li><a href="/#y-2015">2015 - 2016</a></li>
            </ul>
        </div>
        <div class="col" id="footer-3">
            <!-- <a href="https://urfu.ru/ru/100-urfu/partner-letters/">Поздравления</a>
            <a href="/events/#month-9">Программа</a> -->
            <h2>Kontaktlar</h2>
            <div id="contacts">
                <b>+998 (65) 221 29 06</b>
                <b>+998 (65) 221 30 46</b>
            </div>
        </div>

        <div class="col" id="footer-4">
            <h2>Ijtimoiy tarmoqlar</h2>
            <div id="soc-links">
                <a class="telegram" target="_blank" href="https://t.me/buxdu_uz">Telegram</a>
                <a class="facebook" target="_blank" href="https://www.facebook.com/buxdu">Facebook</a>
                <a class="instagram" target="_blank" href="https://www.instagram.com/buxdu1/">Instagram</a>
                <a class="youtube" target="_blank" href="https://www.youtube.com/c/BuxDUuzedu">Youtube</a>
            </div>
        </div>


    </div>
</footer>
<script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>
</body>

</html>
