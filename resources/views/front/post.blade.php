<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Development by PaulIsLava (paulislava.space) -->
    <title>Buxoro davlat universiteti tarixi</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet"> -->
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

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(55789402, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="watch/55789402" style="position:absolute; left:-9999px;" alt=""></div>
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

</head>

<body class="ru pc">

<header id="header">
    <div id="logo" style="background: transparent;">
        <div class="inner">
            <a id="urfu-logo" target="_blank" href="/"><img src="{{ asset('front/images/logoWhite.png') }}"></a>
        </div>
    </div>
    <div id="label" style="color: white;">Buxoro davlat universiteti</div>
    <!-- <div class="partners mobile-hide">
        <div id="strat-partner">
            <span>Стратегическое партнерство</span>
            <a class="logo" id="strat-logo-1" href="https://www.tmk-group.ru/" target="_blank"><img src="imgs/tmk.svg"></a>
            <a class="logo" id="strat-logo-2" href="https://www.sinara-group.com/" target="_blank"><img src="imgs/sinara.svg"></a>
        </div>
        <div id="gen-partner">
            <span>Генеральный партнер празднования<br>
                <nobr>100-летия</nobr>
            </span>
            <a class="logo" id="gen-logo" href="https://kontur.ru/" target="_blank"><img src="imgs/kontur.svg?v=1"></a>
        </div>
    </div> -->
    <a id="openMenu"></a>
</header>
<nav role="navigation" id="menu">
    <div id="menu-header"><a id="closeMenu"></a></div>
    <div id="main-menu">
        <ul>
            <li>
                <a href="{{ route('post.page','news') }}">Yangiliklar</a>
            </li>


            <li>
                <a href="{{ route('post.page','announcement') }}">E'lonlar</a>
            </li>
            <li class="active">
                <a href="/">Universitet tarixi</a>
            </li>
            <li>
                <a href="/tabriklar/index.html">Tabriklar</a>
            </li>
            <li>
                <a target="_blank" href="{{ route('register.page') }}">Ro'yxatdan o'tish</a>
            </li>
            <li id="lang-choice">
                <a class="active" href="index.html">UZ</a>
                <a href="/ru/index.html">РУ</a>
                <a href="/en/index.html">ENG</a>
            </li>
            <!-- <li id="lang-choice">
                <a class="active" href="index.htm">RU</a>
                <a href="en/index.htm">ENG</a>
            </li> -->
        </ul>
    </div>

</nav>
<main>

    <div class="wrap buxdu_news">
        <h1>Yangiliklar</h1>
        <div class="news" >
            @foreach($posts as $post)
                <div class="new">
                    <div class="new_header">
                        <img src="{{ asset('storage/files/announcements/'.$post->files()->first()->filename) }}" loading="lazy" alt="image">
                    </div>
                    <div class="new_body">
                        <a href="#">
                            <div class="date">
                                <img src="{{ asset('front/images/date.svg') }}" loading="lazy" width="20" alt="date">
                                <p>{{ $post->date }}</p>
                            </div>
                            <h3>{{ $post->languages()->where('lang', 'uz')->first()->title }}</h3>
                            <p>{{ $post->languages()->where('lang', 'uz')->first()->text }}</p>
                        </a>

                    </div>
                </div>
            @endforeach
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
