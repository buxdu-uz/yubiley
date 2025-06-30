var img_path = "/imgs/";
$(document).ready(function () {

    $('.slider').addClass("owl-carousel").owlCarousel({
        nav: true,
        navText: ['', ''],
        loop: true,
        dots: false,
        items: 1
    });

    $('#openMenu').click(function () {
        $('#header').addClass('open');
        $('#menu').slideDown(200);
    });

    $('#closeMenu').click(function () {
        $('#menu').slideUp(200, function () { $('#header').removeClass('open'); });
    });

});

$('#menu').on('click', 'a', function (e) {
    $('#menu').slideUp(200, function () { $('#header').removeClass('open'); });
});


$.fn.shuffle = function () {
    var m = this.length, t, i;
    while (m) {
        i = Math.floor(Math.random() * m--);
        t = this[m];
        this[m] = this[i];
        this[i] = t;
    }
    return this;
};

student_active = '';
$(document).on('click', '#students>div', function () {
    var c_active = $('#students>div.active');
    c_active.removeClass('active');
    if (student_active != $(this).attr('id')) {
        $(this).addClass('active');
        student_active = $(this).attr('id');
    }
});

screenwidth = $(window).width();
screenheight = $(window).height();

mobile = screenwidth <= 1200;
pc = !mobile;

scrolling = null;
autoScrolling = true;
scrollSlide = function () {
    if (autoScrolling)
        $("html, body").animate({ scrollTop: $(window).scrollTop() + 250 }, 600, 'linear');
}
autoScroll = function () {
    scrolling = setInterval(scrollSlide, 600);
};

$(window).bind('mousewheel', function (e) {
    autoScrolling = false;
    clearInterval(scrolling);
});

/*
$(window).keypress(function (e) {
    if (e.key === ' ' || e.key === 'Spacebar') {
        e.preventDefault();
        if (!autoScrolling) {
            console.log("scrolling on");
            autoScrolling = true;
            scrollSlide();
            autoScroll();
        } else {
            autoScrolling = false;
            console.log("scrolling off");
            clearInterval(scrolling);
        }
    }
}) */

checkMenu = function () {
    let pos = $(window).scrollTop();
    active_li = null;
    $("#years-menu a").each(function () {
        var href = $(this).attr("href");
        if ($(href).length > 0) {
            var block_t = $(href).offset().top;
            if (pos + 1 >= block_t) {
                active_li = $(this).parent();
            }
        }
    });
    $("#years-menu li").removeClass("active");
    $(active_li).addClass("active");

    let active_menu = null;
    $(".dark-menu, .bright-menu").each(function () {
        var btop = $(this).offset().top;
        var height = $(this).outerHeight();
        if (pos >= (btop - 50)) {
            active_menu = this;
        }
    });
    $("#menu").toggleClass("bright", $(active_menu).hasClass("bright-menu"));
}



$(window).scroll(function () {
    checkMenu();
});


$('a[href^="#"]').click(function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});

getTL_medium_year = function (selector) {
    return new TimelineMax()
        .fromTo(selector, 0.5, { xPercent: -50 }, { xPercent: -2 }, 0)
        .fromTo(selector, 0.5, { css: { marginLeft: screenwidth / 2 } }, { css: { marginLeft: 0 } }, 0)
}

var ctrl = new ScrollMagic.Controller({
    globalSceneOptions: {
        triggerHook: "onLeave"
    }
});

var ctrl_1 = new ScrollMagic.Controller({
    globalSceneOptions: {
        triggerHook: "onEnter"
    }
});

var machine_images = [
    img_path + "machine/1.png",
    img_path + "machine/2.png",
    img_path + "machine/3.png",
    img_path + "machine/4.png",
    img_path + "machine/5.png",
    img_path + "machine/6.png",
    img_path + "machine/7.png",
    img_path + "machine/8.png",
    img_path + "machine/9.png",
    img_path + "machine/10.png",
    img_path + "machine/11.png",
    img_path + "machine/12.png",
    img_path + "machine/13.png",
    img_path + "machine/14.png",
    img_path + "machine/15.png",
    img_path + "machine/16.png",
    img_path + "machine/17.png",
    img_path + "machine/18.png",
    img_path + "machine/19.png"
];

var machine_obj = { curImg: 0 };

// create tween
var tween = TweenMax.to(machine_obj, 1.2,
    {
        curImg: machine_images.length - 1,	// animate propery curImg to number of images
        roundProps: "curImg",
        onUpdate: function () {
            $("#machine img").attr("src", machine_images[machine_obj.curImg]); // set the image source
        }
    }
);

var year1920 = new TimelineMax()
    .add(tween, 0)
    .from("#y-1920 h1", 0.5, { bottom: "100%" }, 0);
new ScrollMagic.Scene({
    triggerElement: "#y-1920",
    duration: "1200"
})
    .setPin("#y-1920")
    .setTween(year1920)
    .addTo(ctrl);


$('img[data-src]').Lazy({
    // your configuration goes here
    scrollDirection: 'vertical',
    effect: 'fadeIn',
    effectTime: 500,
    visibleOnly: true,
    onError: function (element) {
        console.log('error loading ' + element.data('src'));
    }
});

if (pc) {
    $("#classPhoto").height($("#classesRow").height());
    $("#ints").height($("#classesRow").height());
}

/* var year1920_1 = new TimelineMax()
.add(TweenMax.to(function(){},0,{onReverseComplete:function(){ 
    $("#menu").removeClass("bright");}, immediateRender:false}))
.to("#menu", {className:"bright"});
   
new ScrollMagic.Scene({
         triggerElement: "#y-1920-2"
     })
     .setTween(year1920_1)
     .addTo(ctrl);   */

CSSPlugin.defaultTransformPerspective = 800;


if (pc) {
    var tl = new TimelineMax()
        .from("#y-1920-1 .content", 0.7, { width: 0 });


    new ScrollMagic.Scene({
        triggerElement: "#y-1920-1",
        triggerHook: "onEnter",
        duration: "100%"
    })
        .setPin("#y-1920-1")
        .setTween(tl)
        .addTo(ctrl);
}

ints_ar = "0123456789";
char_ar = "абвгдеёжзийклмнопрстуфхцчшщъыьэюя";
function perebor(block) {
    if ($(block).attr("data-perebor") != 1) {
        var intb = $(block).children(".int");
        var sb = $(block).children(".string");
        $(block).attr("data-orig-int", $(intb).text());
        $(block).attr("data-orig-str", $(sb).text());
        $(block).attr("data-perebor", "1");
        var int_l = $(intb).text().length;
        var s_l = $(sb).text().length;
        var interval = setInterval(function () {
            if ($(block).attr("data-perebor") != 1)
                return false;
            var max_position = ints_ar.length - 1;
            var result = '';
            for (i = 0; i < int_l; ++i) {
                position = Math.floor(Math.random() * max_position);
                result = result + ints_ar.substring(position, position + 1);
            }
            $(intb).text(result);

            var max_position = char_ar.length - 1;
            var result = '';
            for (i = 0; i < s_l; ++i) {
                position = Math.floor(Math.random() * max_position);
                result = result + char_ar.substring(position, position + 1);
            }
            $(sb).text(result);

        }, 100);
        return interval;
    }
}

function stop_perebor(block, interval) {
    $(block).attr("data-perebor", "0");
    if (interval) {
        clearInterval(interval);
        intb = $(block).children(".int");
        sb = $(block).children(".string");
        $(intb).text($(block).data("orig-int"));
        $(sb).text($(block).data("orig-str"));
    }
}

int_intervals = [];
now_perebor = false;
function perebor_all() {
    if (!now_perebor) {
        now_perebor = true;
        var i = 0;
        $("#ints>div").each(function () {
            int_intervals[i++] = perebor($(this));
        });
    }
}

if (pc) {
    var year1920_2 = new TimelineMax()
        // .add(function () { perebor_all(); })
        .from("#classPhoto", 0.5, { bottom: "-100%", right: "100%" }, 0)
        .from("#ints", 0.5, { bottom: "-100%", right: "-100%" }, 0)
        // .add(TweenMax.to(function () { }, 0, {
        //     onComplete: function () {
        //         if (now_perebor) {
        //             setTimeout(function () { stop_perebor($("#ints>div").eq(0), int_intervals[0]); }, 300);
        //             setTimeout(function () { stop_perebor($("#ints>div").eq(1), int_intervals[1]); }, 600);
        //             setTimeout(function () { stop_perebor($("#ints>div").eq(2), int_intervals[2]); now_perebor = false; }, 900);

        //         }
        //     }, onReverseComplete: function () { perebor_all(); }, immediateRender: false
        // }), 1)
        .to("body", 1.2, {}, 2);

    new ScrollMagic.Scene({
        triggerElement: "#y-1920-2",
        duration: "800"
    })
        .setPin("#y-1920-2")
        .setTween(year1920_2)
        .addTo(ctrl);

}

new ScrollMagic.Scene({
    triggerElement: "#y-1920-3",
    offset: -50
})
    .setTween("#bi-1929", 0.7, { opacity: 1 })
    .addTo(ctrl);


var y1929 = new TimelineMax()
    .from("#y-1920-3 .year", 0.3, { bottom: "100%" }, 0)
    .from("#y-1920-3 .descr", 0.3, { top: "100%" }, 0)
    .from("#y-1920-3 .descr", 0.1, {}, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1920-3",
    duration: "100%",
})
    .setPin("#y-1920-3")
    .setTween(y1929)
    .addTo(ctrl);



new ScrollMagic.Scene({
    triggerElement: "#y-1930",
    offset: -1
})
    .setTween("#menu", { className: "" })
    .addTo(ctrl);

var y1934 = new TimelineMax()
    .from("#y-1934 .photo", 1, { xPercent: -100 }, 0)
    .from("#y-1934 h2", 0.5, { bottom: "100%" }, 0)
    .from("#y-1934 .descr", 0.5, { top: "100%" }, 0);

var y1936 = new TimelineMax()
    .from("#y-1936 .photo", 1, { xPercent: 100 }, 0)
    .from("#y-1936 h2", 0.5, { bottom: "100%" }, 0)
    .from("#y-1936 .descr", 0.5, { top: "100%" }, 0);

var y1930 = new TimelineMax()
    .add(y1934, 0)
    .add(y1936, 1);

if (pc) {
    new ScrollMagic.Scene({
        triggerElement: "#y-1930",
        duration: "150%"
    })
        .setTween(y1930)
        .setPin("#y-1930")
        .addTo(ctrl);
} else {
    new ScrollMagic.Scene({
        triggerElement: "#y-1934",
        duration: "100%"
    })
        .setTween(y1934)
        .setPin("#y-1934")
        .addTo(ctrl);

    new ScrollMagic.Scene({
        triggerElement: "#y-1936",
        duration: "100%"
    })
        .setTween(y1936)
        .setPin("#y-1936")
        .addTo(ctrl);
}

/* var year1940_s = new TimelineMax()
.add(TweenMax.to(function(){},0,{ onReverseComplete:function(){ 
    $("#menu").removeClass("bright");}, immediateRender:false}))
//.to("#h1940", 0.5, { bottom: $("#block5").offset.top + $("#block5").height() })
.to("#menu", {className:"bright"}); 
new ScrollMagic.Scene({
         triggerElement: "#y-1940-space",
         offset: -1
     })
     .setTween(year1940_s)
     .addTo(ctrl); */

var h1940t = new TimelineMax()
    .set("#h1940", { top: $("#y-1940-space").height() / 2 })
    .to("#h1940", 1, { autoAlpha: 0 });
new ScrollMagic.Scene({
    triggerElement: "#y-1940-space",
    offset: -$("#y-1940-space").height() / 2 + $("#h1940").height(),
    duration: $("#block5").offset().top + $("#block5").height() - $("#y-1940-space").offset().top + $("#y-1940-space").height() / 2 + $("#h1940").height() / 3
})
    .setPin("#h1940")
    .setTween(h1940t)
    .addTo(ctrl);
var h1945t = new TimelineMax()
    .set("#h1945", { top: $("#y-1945-space").height() / 2 })
    .to("#h1945", 1, { autoAlpha: 0 });
new ScrollMagic.Scene({
    triggerElement: "#y-1945-space",
    offset: -$("#y-1945-space").height() / 2 + $("#h1945").height(),
    duration: $("#block13").offset().top + $("#block13").height() - $("#y-1945-space").offset().top + $("#y-1945-space").height() / 2 - $("#h1940").height() / 5
})
    .setPin("#h1945")
    .setTween(h1945t)
    .addTo(ctrl);

new ScrollMagic.Scene({
    triggerElement: "#block5"
})
    //   .setTween(new TimelineMax().call(function() { h1940_scene.removePin(); }))
    .addTo(ctrl);

new ScrollMagic.Scene({
    triggerElement: "#y-1952",
    offset: -50
})
    .setTween("#bi-1952", 0.7, { opacity: 1 })
    .addTo(ctrl);


var y1952 = new TimelineMax()
    .from("#y-1952 .year", 0.5, { bottom: "100%" }, 0)
    .from("#y-1952 .descr", 0.5, { top: "100%" }, 0)
    .from("#y-1952 .descr", 0.1, {}, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1952",
    duration: "100%",
})
    .setPin("#y-1952")
    .setTween(y1952)
    .addTo(ctrl);

if (pc)
    y1956_img = TweenMax.from("#bi-1956", 0.5, { left: "-100%" }, 0);
else
    y1956_img = TweenMax.from("#bi-1956", 0.5, { yPercent: 100 }, 0);


var y1956 = new TimelineMax()
    .add(y1956_img, 0)
    .from("#y-1956 .year", 0.3, { bottom: "100%" }, 0)
    .from("#y-1956 .descr", 0.3, { top: "100%" }, 0)
    .from("body", 0.1, {}, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1956",
    duration: "100%",
})
    .setPin("#y-1956")
    .setTween(y1956)
    .addTo(ctrl);

if (pc) {
    var y1956_2 = new TimelineMax()
        .from("#y-1956-2-1 .year", 0.3, { bottom: "100%" }, 0)
        .from("#y-1956-2-1 .m-descr", 0.3, { top: "100%" }, 0)
        .from("#y-1956-2-1 .ints", 0.3, { top: "100%" }, 1)
        .from("#y-1956-2-2 .year", 0.3, { bottom: "100%" }, 2)
        .from("#y-1956-2-2 .m-descr", 0.3, { top: "100%" }, 2)
        .from("#y-1956-2-2 .ints", 0.3, { top: "100%" }, 3)
        .from("body", 0.1, {}, 4);

    new ScrollMagic.Scene({
        triggerElement: "#y-1956-2",
        duration: "300%",
    })
        .setPin("#y-1956-2")
        .setTween(y1956_2)
        .addTo(ctrl);
}

new ScrollMagic.Scene({
    triggerElement: "#y-1959",
    offset: -50
})
    .setTween("#bi-1959", 0.7, { opacity: 1 })
    .addTo(ctrl);


var y1959 = new TimelineMax()
    .from("#y-1959 .date", 0.5, { bottom: "100%" }, 0)
    .from("#y-1959 .descr", 0.5, { top: "100%" }, 0)
    .from("body", 0.1, {}, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1959",
    duration: "100%",
})
    .setPin("#y-1959")
    .setTween(y1959)
    .addTo(ctrl);

if (pc) {
    var y1961 = new TimelineMax()
        .from("#y-1961 .date", 0.3, { bottom: "100%" }, 0)
        .from("#y-1961 .descr", 0.3, { top: "100%" }, 0)
        .from("#bi-1961", 1, { xPercent: -100 }, 0)
        .fromTo("#y-1961 .tw-text", 3, { text: { value: "", delimiter: " " } }, { text: { value: $("#y-1961 .tw-text").text() } }, 1)
        .from("body", 0.1, {}, 2);

    new ScrollMagic.Scene({
        triggerElement: "#y-1961",
        duration: "200%",
    })
        .setPin("#y-1961")
        .setTween(y1961)
        .addTo(ctrl);
}

if (pc)
    y1965_img = TweenMax.from("#y-1965 .img", 0.5, { xPercent: 100 }, 0);
else
    y1965_img = TweenMax.from("#y-1965 .img", 0.5, { yPercent: 100 }, 0);


var y1965 = new TimelineMax()
    .add(y1965_img, 0)
    .from("#y-1965 .year", 0.3, { bottom: "100%" }, 0)
    .from("#y-1965 .descr", 0.3, { top: "100%" }, 0)
    .from("body", 0.1, {}, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1965",
    duration: "100%",
})
    .setPin("#y-1965")
    .setTween(y1965)
    .addTo(ctrl);

new ScrollMagic.Scene({
    triggerElement: "#y-1966",
    offset: -50
})
    .setTween("#y-1966 .img", 0.7, { opacity: 1 })
    .addTo(ctrl);


var y1966 = new TimelineMax()
    .from("#y-1966 .date", 0.3, { bottom: "100%" }, 0)
    .from("#y-1966 .descr", 0.3, { top: "100%" }, 0)
    .from("body", 0.1, {}, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1966",
    duration: "100%",
})
    .setPin("#y-1966")
    .setTween(y1966)
    .addTo(ctrl);


new ScrollMagic.Scene({
    triggerElement: "#y-1969",
    offset: -50
})
    .setTween("#y-1969 .img", 0.7, { opacity: 1 })
    .addTo(ctrl);

if (pc) {
    var y1969 = new TimelineMax()
        .from("#y-1969 .year", 0.3, { right: "100%" }, 0)
        .from("#y-1969 .head", 0.3, { left: "100%" }, 0)
        .from("#y-1969 .descr", 0.3, { top: "100%" }, 1)
        .from("body", 0.1, {}, 2);
} else {
    var y1969 = new TimelineMax()
        .from("#y-1969 .year", 0.3, { bottom: "100%" }, 0)
        .from("#y-1969 .head", 0.3, { top: "100%" }, 0)
        .from("#y-1969 .descr", 0.3, { top: "100%" }, 1)
        .from("body", 0.1, {}, 2);
}

new ScrollMagic.Scene({
    triggerElement: "#y-1969",
    duration: "100%",
})
    .setPin("#y-1969")
    .setTween(y1969)
    .addTo(ctrl);


var gorkiy_images = [
    img_path + "gorkiy/1.png",
    img_path + "gorkiy/2.png",
    img_path + "gorkiy/3.png",
    img_path + "gorkiy/4.png",
    img_path + "gorkiy/5.png",
    img_path + "gorkiy/6.png",
    img_path + "gorkiy/7.png",
    img_path + "gorkiy/8.png",
    img_path + "gorkiy/9.png",
    img_path + "gorkiy/10.png"
];

var obj = { curImg: 0 };

// create tween
if (pc)
    var y1974_date = TweenMax.from("#y-1974 .date", 0.5, { left: "-100%" }, 0);
else
    var y1974_date = TweenMax.from("#y-1974 .date", 0.5, { bottom: "100%" }, 0);

var y1974 = new TimelineMax()
    .from("#y-1974 .year", 0.5, { bottom: "100%" }, 0)
    .add(y1974_date, 0)
    .from("#y-1974 .descr", 0.5, { top: "100%" }, 0)
    .to(obj, 1.2,
        {
            curImg: gorkiy_images.length - 1,	// animate propery curImg to number of images
            roundProps: "curImg",
            onUpdate: function () {
                $("#y-1974 .img").attr("src", gorkiy_images[obj.curImg]); // set the image source
            }
        }, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-1974",
    duration: "200%",
})
    .setPin("#y-1974")
    .setTween(y1974)
    .addTo(ctrl);

var y1976 = new TimelineMax()
    .from("#y-1976 .img", 0.5, { yPercent: -100 }, 0)
    .from("#y-1976 .year", 0.5, { bottom: "100%" }, 1)
    .from("#y-1976 .descr", 0.5, { top: "100%" }, 1)
    .from("body", 0.3, {}, 2)

new ScrollMagic.Scene({
    triggerElement: "#y-1976",
    duration: "100%",
})
    .setPin("#y-1976")
    .setTween(y1976)
    .addTo(ctrl);

if (pc) {
    var y1984 = new TimelineMax()
        .from("#y-1984 .date", 0.5, { bottom: "100%" }, 0)
        .from("#y-1984 .descr", 0.5, { top: "100%" }, 0)
        .to("#y-1984 .img-fore", 1, { xPercent: 100 }, 1)
        .from("body", 0.3, {}, 2)

    new ScrollMagic.Scene({
        triggerElement: "#y-1984",
        duration: "200%",
    })
        .setPin("#y-1984")
        .setTween(y1984)
        .addTo(ctrl);
}

new ScrollMagic.Scene({
    triggerElement: "#y-1986",
    offset: -50
})
    .setTween("#y-1986 .img", 0.7, { opacity: 1 })
    .addTo(ctrl);


var y1986 = new TimelineMax()
    .from("#y-1986 .year", 0.3, { bottom: "100%" }, 0)
    .from("#y-1986 .descr", 0.3, { top: "100%" }, 0)
    .from("body", 0.1, {}, 2);

new ScrollMagic.Scene({
    triggerElement: "#y-1986",
    duration: "100%",
})
    .setPin("#y-1986")
    .setTween(y1986)
    .addTo(ctrl);

var y1988 = new TimelineMax()
    .from("#y-1988 .year", 0.3, { bottom: "100%" }, 0)
    .from("#y-1988 .descr", 0.3, { top: "100%" }, 0)
    .to("#y-1988 .img", 2.0, { left: "0%" }, 1)

new ScrollMagic.Scene({
    triggerElement: "#y-1988",
    duration: "260%",
})
    .setPin("#y-1988")
    .setTween(y1988)
    .addTo(ctrl);

// var bbc_2 = $("#bbc-1 img").height() / 2;
if (pc) {
    var y1997 = new TimelineMax()
        .from("#y-1997 .year", 0.3, { bottom: "100%" }, 0)
        .from("#y-1997 .descr", 0.3, { top: "100%" }, 0)
        /*.set("#bbc-2", { y: -bbc_2}, 0)
        .set("#bbc-3", { y: -bbc_2*2 }, 0)
        .from("#bbc-1, #bbc-2, #bbc-3", 1, { bottom: "100%"}, 1)
        .to("#bbc-2", 0.5, { y: 0 }, 2)
        .to("#bbc-3", 0.5, { y: -bbc_2}, 2)
        .to("#bbc-3", 0.5, { y: 0}, 3); */
        .from("#y-1997 .img", 1, { bottom: "100%" }, 1);

    new ScrollMagic.Scene({
        triggerElement: "#y-1997",
        duration: "200%",
    })
        .setPin("#y-1997")
        .setTween(y1997)
        .addTo(ctrl);
}

if (pc) {
    var y2000 = new TimelineMax()
        .add(getTL_medium_year("#y-2000 .year"));

    new ScrollMagic.Scene({
        triggerElement: "#y-2000",
        duration: "100%"
    })
        .setTween(y2000)
        .addTo(ctrl_1);
}

var y2004 = new TimelineMax()
    .from("#y-2004 .img1", 0.5, { xPercent: -100 }, 0)
    .from("#y-2004 .img2", 0.5, { xPercent: 100 }, 0);

new ScrollMagic.Scene({
    triggerElement: "#y-2004",
    duration: "100%",
})
    .setTween(y2004)
    .addTo(ctrl_1);

if (pc) {
    var y2006 = new TimelineMax()
        .from("#y-2006 .img1", 0.3, { xPercent: -100 }, 0)
        .fromTo("#y-2006 .img2", 0.8, { rotation: -180, xPercent: 50 }, { rotation: 0, xPercent: 50 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2006",
        duration: "300%",
    })
        .setTween(y2006)
        .addTo(ctrl_1);
}

if (pc) {
    var y2009 = new TimelineMax()
        .add(getTL_medium_year("#y-2009 .year"))
        .from("#y-2009 .img", 0.5, { xPercent: 100 }, "0+0.2");

    new ScrollMagic.Scene({
        triggerElement: "#y-2009",
        duration: "140%"
    })
        .setTween(y2009)
        .addTo(ctrl_1);
}

if (pc) {
    var y2010 = new TimelineMax()
        .fromTo("#y-2010 .img", 0.5, { xPercent: 100 }, { xPercent: -100 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2010",
        duration: "250%",
    })
        .setPin("#y-2010")
        .setTween(y2010)
        .addTo(ctrl);
}

if (pc) {
    var institutes_obj = { curPath: -1 };
    institutes = [1, 8, 13, 3, 9, 4, 15, 6, 5, 17, 2, 7, 12, 10, 14, 16, 11];
    // create tween
    var institutes_tween = new TimelineMax();
    for (var i = 0; i < institutes.length; i++) {
        institutes_tween.add(TweenMax.to('#institutes #logo-' + institutes[i], 0.1, { autoAlpha: 1 }));
    }

    new ScrollMagic.Scene({
        triggerElement: "#y-2011-1",
        offset: 200,
        duration: "120%",
    })
        .setTween(institutes_tween)
        .addTo(ctrl_1);
}

var cap_images = [
    img_path + "caps/1.png",
    img_path + "caps/2.png",
    img_path + "caps/3.png",
    img_path + "caps/4.png",
    img_path + "caps/5.png",
    img_path + "caps/6.png",
    img_path + "caps/7.png",
    img_path + "caps/8.png",
    img_path + "caps/9.png",
    img_path + "caps/10.png",
    img_path + "caps/11.png",
];


var cap_obj = { curImg: 0 };

var y2012 = new TimelineMax()
    .to(cap_obj, 1,
        {
            curImg: cap_images.length - 1,	// animate propery curImg to number of images
            roundProps: "curImg",
            onUpdate: function () {
                $("#y-2012 .img").attr("src", cap_images[cap_obj.curImg]); // set the image source
            }
        }, 0);

new ScrollMagic.Scene({
    triggerElement: "#y-2012",
    duration: "120%",
})
    .setTween(y2012)
    .addTo(ctrl_1);

new ScrollMagic.Scene({
    triggerElement: "#y-2012-endy",
    duration: "100%",
})
    .setTween(TweenMax.from("#y-2012-endy .img", 1, { left: "100%" }))
    .addTo(ctrl_1);

if (pc) {
    var y2012_2 = new TimelineMax()
        .from("#y-2012-2 .m-content", 0.8, { yPercent: 100 });
    new ScrollMagic.Scene({
        triggerElement: "#y-2012-2 .year",
        duration: "100%",
    })
        .setTween(y2012_2)
        .addTo(ctrl_1);
}

if (pc) {
    var y2012_1 = new TimelineMax()
        .add(getTL_medium_year("#y-2012-1 .year"))

    new ScrollMagic.Scene({
        triggerElement: "#y-2012-1",
        duration: "100%",
    })
        .setTween(y2012_1)
        .addTo(ctrl_1);
}

$(window).on('load', function () {
    label_width = $("#y-2013-0 .img1").outerWidth() - screenwidth;
    var y2013 = new TimelineMax()
        .to("#y-2013-0 .img1", 1, { x: label_width }, 0)
        .to("#y-2013-0 .img2", 1, { x: -label_width }, 0)

    new ScrollMagic.Scene({
        triggerElement: "#y-2013-0",
        duration: "300%",
    })
        .setTween(y2013)
        .addTo(ctrl_1);
});

if (pc) {
    var y2014 = new TimelineMax()
        .add(getTL_medium_year("#y-2014 .year"))

    new ScrollMagic.Scene({
        triggerElement: "#y-2014",
        duration: "100%",
    })
        .setTween(y2014)
        .addTo(ctrl_1);

    var y2014_1 = new TimelineMax()
        .fromTo("#y-2014 .img2", 1.0, { scale: 1.5 }, { scale: 1 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2014 .img2-cont",
        duration: "70%",
    })
        .setTween(y2014_1)
        .addTo(ctrl_1);
}

if (pc) {
    var y2016 = new TimelineMax()
        .add(getTL_medium_year("#y-2016-1 .year"))

    new ScrollMagic.Scene({
        triggerElement: "#y-2016",
        duration: "100%",
    })
        .setTween(y2016)
        .addTo(ctrl_1);

    var y2016_1 = new TimelineMax()
        .from("#y-2016-iypt .img", 1, { xPercent: 100 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2016-iypt",
        duration: "100%"
    })
        .setTween(y2016_1)
        .addTo(ctrl_1);
}

if (pc) {
    var y2017 = new TimelineMax()
        .add(getTL_medium_year("#y-2017 .year"), 0)
        .fromTo("#y-2017 .img", 3, { rotation: -360, xPercent: 40 }, { rotation: 0, xPercent: 40 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2017",
        duration: "300%",
    })
        .setTween(y2017)
        .addTo(ctrl_1);

    var y2019 = new TimelineMax()
        .add(getTL_medium_year("#y-2019 .year"), 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2019",
        duration: "100%",
    })
        .setTween(y2019)
        .addTo(ctrl_1);
}

new ScrollMagic.Scene({
    triggerElement: "#y-2019-1",
    duration: 0,
    offset: -50
})
    .setTween("#y-2019-1 .img", 0.7, { opacity: 1 })
    .addTo(ctrl);

if (pc) {

    var y2019_1 = new TimelineMax()
        .from("#y-2019-1 .date", 0.3, { bottom: "100%" }, 0)
        .from("#y-2019-1 .m-content", 0.3, { top: "100%" }, 0)
        .from("body", 0.1, {}, 1);

    new ScrollMagic.Scene({
        triggerElement: "#y-2019-1",
        duration: "100%",
    })
        .setPin("#y-2019-1")
        .setTween(y2019_1)
        .addTo(ctrl);
}

if (pc) {
    var it_ints_1 = [
        img_path + "it-ints/1/1.svg",
        img_path + "it-ints/1/2.svg",
        img_path + "it-ints/1/3.svg",
        img_path + "it-ints/1/4.svg",
    ];

    var it_ints_2 = [
        img_path + "it-ints/2/1.svg",
        img_path + "it-ints/2/2.svg",
        img_path + "it-ints/2/3.svg",
        img_path + "it-ints/2/4.svg",
    ];

    var obj_it_ints_1 = obj_it_ints_2 = { curImg: 0 };

    var y2019_ints = new TimelineMax()
        .to(obj_it_ints_1, 1,
            {
                curImg: it_ints_1.length - 1,
                roundProps: "curImg",
                onUpdate: function () {
                    $("#y-2019-ints .img1").attr("src", it_ints_1[obj_it_ints_1.curImg]);
                }
            }, 0).repeat(3)
        .to(obj_it_ints_2, 1,
            {
                curImg: it_ints_2.length - 1,
                roundProps: "curImg",
                onUpdate: function () {
                    $("#y-2019-ints .img2").attr("src", it_ints_2[obj_it_ints_2.curImg]);
                }
            }, 0).repeat(3);

    new ScrollMagic.Scene({
        triggerElement: "#y-2019-ints",
        duration: "200%",
    })
        .setTween(y2019_ints)
        .addTo(ctrl_1);
}

var images_2020 = [
    img_path + "2020/1.png?v=1",
    img_path + "2020/2.png?v=1",
    img_path + "2020/3.png?v=1",
    img_path + "2020/4.png?v=1",
];

var obj_2020 = { curImg: 0 };

var y2020 = new TimelineMax()
    .to("body", 0.1, {}, 0)
    .to(obj_2020, 1,
        {
            curImg: images_2020.length - 1,
            roundProps: "curImg",
            onUpdate: function () {
                $("#y-2020 .img").attr("src", images_2020[obj_2020.curImg]);
            }
        }, 1);

new ScrollMagic.Scene({
    triggerElement: "#y-2020 .img",
    duration: "100%",
})
    .setTween(y2020)
    .addTo(ctrl_1);

if (pc) {
    var y2020_1 = new TimelineMax()
        .from("#y-2020-1 .img2", 1, { xPercent: -100 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#y-2020-1",
        duration: "100%",
    })
        .setTween(y2020_1)
        .addTo(ctrl_1);
}

if (pc) {
    var now = new TimelineMax()
        .from("#now .img1", 1, { yPercent: -100 }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#now",
        duration: "200%",
    })
        .setTween(now)
        .addTo(ctrl_1);


    var now1 = new TimelineMax()
        .from("#now-1 .int-block", 1.0, { xPercent: 100 }, 0)


    new ScrollMagic.Scene({
        triggerElement: "#now-1",
        duration: "100%",
    })
        .setTween(now1)
        .addTo(ctrl_1);

    var now2 = new TimelineMax()
        .from("#now-2 .int-block", 1.0, { xPercent: -100 }, 0)


    new ScrollMagic.Scene({
        triggerElement: "#now-2",
        duration: "100%",
    })
        .setTween(now2)
        .addTo(ctrl_1);

}

countries_width = $("#countries-1").outerWidth();
$(window).on('load', function () {
    countries_width = $("#countries-1").outerWidth();
    var now3 = new TimelineMax()
        .from("#now-3-1 .int", 0.3, { right: "100%" }, 0)
        .from("#now-3-1 .int-content", 0.3, { left: "100%" }, 0)
        .from("#now-3-1 .text", 0.3, { top: "100%" }, "0+=0.3")
        .from("#now-3-2 .int", 0.3, { right: "100%" }, "0+=0.6")
        .from("#now-3-2 .int-content", 0.3, { left: "100%" }, "0+=0.6")
        .from("#now-3-2 .text", 0.3, { top: "100%" }, "0+=0.9")
        .from("#countries-1", 2, { left: -countries_width }, 0)
        .from("#countries-2", 2, { right: -countries_width }, 0)
        .from("#countries-3", 2, { left: -countries_width }, 0)
        .from("#countries-4", 2, { right: -countries_width }, 0);

    new ScrollMagic.Scene({
        triggerElement: "#now-3",
        duration: "410%",
    })
        .setPin("#now-3")
        .setTween(now3)
        .addTo(ctrl);
});

if (pc) {
    var now4 = new TimelineMax()
        .from("#now-4-1 .int", 0.3, { right: "100%" }, 0)
        .from("#now-4-1 .int-content", 0.3, { left: "100%" }, 0)
        .from("#now-4-1 .text", 0.3, { top: "100%" }, 1)
        .from("#now-4-2 .int", 0.3, { right: "100%" }, 2)
        .from("#now-4-2 .int-content", 0.3, { left: "100%" }, 2)
        .from("#now-4-2 .text", 0.3, { top: "100%" }, 3)
        .from("#now-4-3 .int", 0.3, { right: "100%" }, 4)
        .from("#now-4-3 .int-content", 0.3, { left: "100%" }, 5)
        .from("#now-4-3 .text", 0.3, { top: "100%" }, 6)
        .from("#now-4 .btn", 0.3, { top: "100%" }, 7);


    new ScrollMagic.Scene({
        triggerElement: "#now-4",
        duration: "300%",
    })
        .setPin("#now-4")
        .setTween(now4)
        .addTo(ctrl);
}

if (mobile) {
    $('#now-5').addClass("owl-carousel").owlCarousel({
        dots: false,
        items: 1,
        startPosition: 1,
        center: true
    });
}

$(window).on("load", function () {
    setTimeout(function () {
        checkMenu();
    }, 700);

    $("body").addClass("loaded");

    let block = $('#each-year')[0];
    let duration = 1000;
    let count = 2020 - 1920;
    let eachYear = setInterval(() => {
        let year = parseInt(block.innerText) + 1;
        block.innerText = year;
        if (year == 2020)
            clearInterval(eachYear);
    },
        duration / count);
});

