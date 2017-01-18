<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
<head>

    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta name="generator" content="2015.2.1.352"/>

    <script type="text/javascript">
        // Update the 'nojs'/'js' class on the html node
        document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

        // Check that all required assets are uploaded and up-to-date
        if (typeof Muse == "undefined") window.Muse = {};
        window.Muse.assets = {
            "required": ["jquery-1.8.3.min.js", "museutils.js", "museconfig.js", "jquery.watch.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.scrolleffects.js", "require.js", "index.css"],
            "outOfDate": []
        };
    </script>

    <title>Без имени 3</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/site_global.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}" id="pagesheet"/>
    <!-- Other scripts -->
    <script type="text/javascript">
        var __adobewebfontsappname__ = "muse";
    </script>
    <!-- JS includes -->
    <script type="text/javascript">
        document.write('\x3Cscript src="' + (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//webfonts.creativecloud.com/coda:n4:all.js" type="text/javascript">\x3C/script>');
    </script>
    <!--HTML Widget code-->

    <style>
        .u15365 .animated-mouse {
            width: 27px;
            height: 47px;
            border: 2px solid #FFFFFF;
            transform: translate(-50%, -50%);
            border-radius: 14px;
            background: transparent;
        }

        .u15365 .animated-mouse-pointer {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 100%;
            background: #FFFFFF;
            left: 50%;
            top: 70%;
            transform: translate(-50%, 0);
            animation-name: mousePointer;
            animation-duration: 3s;
            animation-iteration-count: 10;
            animation-direction: normal;
            animation-timing-function: linear;
            animation-fill-mode: backwards;
            animation-delay: .5s;
        }

        @keyframes mousePointer {
            0% {
                opacity: 0;
                top: 70%;
            }
            20% {
                opacity: 1;
                top: 70%;
            }
            40% {
                opacity: 1;
                top: 70%;
            }
            60% {
                opacity: 1;
                top: 20%;
            }
            61% {
                opacity: 1;
                top: 20%;
            }
            67% {
                opacity: 0;
                top: 20%;
            }
            100% {
                opacity: 0;
                top: 20%;
            }
        }

    </style>

</head>
<body>

<div id="site"></div>



</body>
<script type="text/javascript">
    if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script type="text/javascript">
    window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<!-- Other scripts -->
<script type="text/javascript">
    window.Muse.assets.check = function (d) {
        if (!window.Muse.assets.checked) {
            window.Muse.assets.checked = !0;
            var b = {}, c = function (a, b) {
                if (window.getComputedStyle) {
                    var c = window.getComputedStyle(a, null);
                    return c && c.getPropertyValue(b) || c && c[b] || ""
                }
                if (document.documentElement.currentStyle)return (c = a.currentStyle) && c[b] || a.style && a.style[b] || "";
                return ""
            }, a = function (a) {
                if (a.match(/^rgb/))return a = a.replace(/\s+/g, "").match(/([\d\,]+)/gi)[0].split(","), (parseInt(a[0]) << 16) + (parseInt(a[1]) << 8) + parseInt(a[2]);
                if (a.match(/^\#/))return parseInt(a.substr(1),
                    16);
                return 0
            }, g = function (g) {
                for (var f = document.getElementsByTagName("link"), i = 0; i < f.length; i++)if ("text/css" == f[i].type) {
                    var h = (f[i].href || "").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);
                    if (!h || !h[1] || !h[2])break;
                    b[h[1]] = h[2]
                }
                f = document.createElement("div");
                f.className = "version";
                f.style.cssText = "display:none; width:1px; height:1px;";
                document.getElementsByTagName("body")[0].appendChild(f);
                for (i = 0; i < Muse.assets.required.length;) {
                    var h = Muse.assets.required[i], l = h.match(/([\w\-\.]+)\.(\w+)$/), k = l && l[1] ?
                        l[1] : null, l = l && l[2] ? l[2] : null;
                    switch (l.toLowerCase()) {
                        case "css":
                            k = k.replace(/\W/gi, "_").replace(/^([^a-z])/gi, "_$1");
                            f.className += " " + k;
                            k = a(c(f, "color"));
                            l = a(c(f, "backgroundColor"));
                            k != 0 || l != 0 ? (Muse.assets.required.splice(i, 1), "undefined" != typeof b[h] && (k != b[h] >>> 24 || l != (b[h] & 16777215)) && Muse.assets.outOfDate.push(h)) : i++;
                            f.className = "version";
                            break;
                        case "js":
                            k.match(/^jquery-[\d\.]+/gi) && d && d().jquery == "1.8.3" ? Muse.assets.required.splice(i, 1) : i++;
                            break;
                        default:
                            throw Error("Unsupported file type: " +
                                l);
                    }
                }
                f.parentNode.removeChild(f);
                if (Muse.assets.outOfDate.length || Muse.assets.required.length) f = "Некоторые файлы на сервере могут отсутствовать или быть некорректными. Очистите кэш-память браузера и повторите попытку. Если проблему не удается устранить, свяжитесь с разработчиками сайта.", g && Muse.assets.outOfDate.length && (f += "\nOut of date: " + Muse.assets.outOfDate.join(",")), g && Muse.assets.required.length && (f += "\nMissing: " + Muse.assets.required.join(",")), alert(f)
            };
            location && location.search && location.search.match && location.search.match(/muse_debug/gi) ? setTimeout(function () {
                    g(!0)
                }, 5E3) : g()
        }
    };
    var muse_init = function () {
        require.config({baseUrl: ""});
        require(["jquery", "museutils", "whatinput", "jquery.watch", "webpro", "musewpslideshow", "jquery.museoverlay", "touchswipe", "jquery.musepolyfill.bgsize", "jquery.scrolleffects"], function (d) {
            var $ = d;
            $(document).ready(function () {
                try {
                    window.Muse.assets.check($);
                    /* body */
                    Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();
                    /* body */
                    Muse.Utils.prepHyperlinks(true);
                    /* body */
                    Muse.Utils.resizeHeight('.browser_width');
                    /* resize height */
                    Muse.Utils.requestAnimationFrame(function () {
                        $('body').addClass('initialized');
                    });
                    /* mark body as initialized */
                    Muse.Utils.fullPage('#page');
                    /* 100% height page */
                    Muse.Utils.initWidget('#pamphletu19129', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19129 */
                    Muse.Utils.initWidget('#pamphletu19117', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19117 */
                    Muse.Utils.initWidget('#pamphletu19410', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19410 */
                    Muse.Utils.initWidget('#pamphletu19391', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19391 */
                    Muse.Utils.initWidget('#pamphletu19272', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19272 */
                    Muse.Utils.initWidget('#pamphletu19253', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19253 */
                    Muse.Utils.initWidget('#pamphletu19511', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19511 */
                    Muse.Utils.initWidget('#pamphletu19504', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19504 */
                    Muse.Utils.initWidget('#pamphletu18669', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu18669 */
                    Muse.Utils.initWidget('#pamphletu16085', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu16085 */
                    Muse.Utils.initWidget('#pamphletu11845', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu11845 */
                    Muse.Utils.initWidget('#pamphletu12398', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12398 */
                    Muse.Utils.initWidget('#pamphletu12064', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12064 */
                    Muse.Utils.initWidget('#pamphletu13114', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13114 */
                    Muse.Utils.initWidget('#pamphletu13672', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13672 */
                    Muse.Utils.initWidget('#pamphletu14720', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu14720 */
                    Muse.Utils.initWidget('#pamphletu12761', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12761 */
                    Muse.Utils.initWidget('#pamphletu12110', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12110 */
                    Muse.Utils.initWidget('#pamphletu12444', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12444 */
                    Muse.Utils.initWidget('#pamphletu13764', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13764 */
                    Muse.Utils.initWidget('#pamphletu14679', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu14679 */
                    Muse.Utils.initWidget('#pamphletu15047', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu15047 */
                    Muse.Utils.initWidget('#pamphletu12812', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12812 */
                    Muse.Utils.initWidget('#pamphletu12018', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12018 */
                    Muse.Utils.initWidget('#pamphletu12352', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12352 */
                    Muse.Utils.initWidget('#pamphletu13165', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13165 */
                    Muse.Utils.initWidget('#pamphletu13723', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13723 */
                    Muse.Utils.initWidget('#pamphletu14817', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu14817 */
                    Muse.Utils.initWidget('#pamphletu13962', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13962 */
                    Muse.Utils.initWidget('#pamphletu14766', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu14766 */
                    Muse.Utils.initWidget('#pamphletu15001', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu15001 */
                    Muse.Utils.initWidget('#pamphletu12720', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12720 */
                    Muse.Utils.initWidget('#pamphletu12490', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12490 */
                    Muse.Utils.initWidget('#pamphletu13257', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13257 */
                    Muse.Utils.initWidget('#pamphletu13815', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu13815 */
                    Muse.Utils.initWidget('#pamphletu14858', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu14858 */
                    Muse.Utils.initWidget('#pamphletu12858', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu12858 */
                    Muse.Utils.initWidget('#slideshowu8584', ['#bp_infinity'], function (elem) {
                        var widget = new WebPro.Widget.ContentSlideShow(elem, {
                            autoPlay: false,
                            displayInterval: 3500,
                            slideLinkStopsSlideShow: false,
                            transitionStyle: 'fading',
                            lightboxEnabled_runtime: false,
                            shuffle: false,
                            transitionDuration: 500,
                            enableSwipe: true,
                            elastic: 'off',
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                        $(elem).data('widget', widget);
                        return widget;
                    });
                    /* #slideshowu8584 */
                    Muse.Utils.initWidget('#pamphletu15202', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu15202 */
                    Muse.Utils.initWidget('#pamphletu20308', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu20308 */
                    Muse.Utils.initWidget('#pamphletu20295', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu20295 */
                    Muse.Utils.initWidget('#pamphletu20430', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu20430 */
                    Muse.Utils.initWidget('#pamphletu20412', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu20412 */
                    Muse.Utils.initWidget('#pamphletu18368', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu18368 */
                    Muse.Utils.initWidget('#pamphletu17383', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu17383 */
                    Muse.Utils.initWidget('#pamphletu19957', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19957 */
                    Muse.Utils.initWidget('#pamphletu19944', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu19944 */
                    Muse.Utils.initWidget('#pamphletu20194', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu20194 */
                    Muse.Utils.initWidget('#pamphletu20178', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu20178 */
                    Muse.Utils.initWidget('#pamphletu18096', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'loose',
                            event: 'click',
                            deactivationEvent: 'mouseout_click',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: true,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu18096 */
                    Muse.Utils.initWidget('#widgetu15561', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.Form(elem, {
                            validationEvent: 'submit',
                            errorStateSensitivity: 'high',
                            fieldWrapperClass: 'fld-grp',
                            formSubmittedClass: 'frm-sub-st',
                            formErrorClass: 'frm-subm-err-st',
                            formDeliveredClass: 'frm-subm-ok-st',
                            notEmptyClass: 'non-empty-st',
                            focusClass: 'focus-st',
                            invalidClass: 'fld-err-st',
                            requiredClass: 'fld-err-st',
                            ajaxSubmit: true
                        });
                    });
                    /* #widgetu15561 */
                    Muse.Utils.initWidget('#pamphletu15583', ['#bp_infinity'], function (elem) {
                        return new WebPro.Widget.ContentSlideShow(elem, {
                            contentLayout_runtime: 'lightbox',
                            event: 'click',
                            deactivationEvent: 'none',
                            autoPlay: false,
                            displayInterval: 3000,
                            transitionStyle: 'fading',
                            transitionDuration: 500,
                            hideAllContentsFirst: false,
                            shuffle: false,
                            enableSwipe: true,
                            resumeAutoplay: true,
                            resumeAutoplayInterval: 3000,
                            playOnce: false,
                            autoActivate_runtime: false
                        });
                    });
                    /* #pamphletu15583 */
                    $('#u10537').registerOpacityScrollEffect([{
                        "in": [-Infinity, 385.55],
                        "fade": 324,
                        "opacity": 30
                    }, {"in": [385.55, 385.55], "opacity": 100}, {
                        "in": [385.55, Infinity],
                        "fade": 414.45,
                        "opacity": 100
                    }]);
                    /* scroll effect */
                    $('#u11046').registerPositionScrollEffect([{
                        "in": [-Infinity, 799.95],
                        "speed": [1, 1]
                    }, {"in": [799.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11260').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [0.7, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11465').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [0.3, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11055').registerPositionScrollEffect([{
                        "in": [-Infinity, 799.95],
                        "speed": [-0.7, 1]
                    }, {"in": [799.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11300').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [-0.3, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11519').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [-0.1, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11061').registerPositionScrollEffect([{
                        "in": [-Infinity, 799.95],
                        "speed": [-1, 1]
                    }, {"in": [799.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11316').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [-0.7, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11535').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [-0.3, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11049').registerPositionScrollEffect([{
                        "in": [-Infinity, 799.95],
                        "speed": [0.7, 1]
                    }, {"in": [799.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11360').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [0.3, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u11481').registerPositionScrollEffect([{
                        "in": [-Infinity, 800],
                        "speed": [0.1, 1]
                    }, {"in": [800, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13113').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.7, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13671').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.3, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u14719').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [0.5, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12760').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [0.3, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12104').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [0.7, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12438').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [-0.5, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13763').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.3, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u14673').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [0.5, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15041').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.7, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12806').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [0.3, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12012').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [0.7, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12346').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [-0.5, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13159').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.7, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13717').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.3, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u14811').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [0.5, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13956').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.3, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u14765').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [0.5, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u14995').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.7, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12714').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [0.3, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12484').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [-0.5, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13251').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.7, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u13809').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [-0.3, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u14857').registerPositionScrollEffect([{
                        "in": [-Infinity, 3199.35],
                        "speed": [0.5, 1]
                    }, {"in": [3199.35, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u12852').registerPositionScrollEffect([{
                        "in": [-Infinity, 2391.15],
                        "speed": [0.3, 1]
                    }, {"in": [2391.15, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u8556-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 4004.47],
                        "speed": [0, 2]
                    }, {"in": [4004.47, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#buttonu8559').registerPositionScrollEffect([{
                        "in": [-Infinity, 4007.95],
                        "speed": [1, 1]
                    }, {"in": [4007.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#buttonu8561').registerPositionScrollEffect([{
                        "in": [-Infinity, 4007.95],
                        "speed": [-1, 1]
                    }, {"in": [4007.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u16493-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 5598.95],
                        "speed": [0, 2]
                    }, {"in": [5598.95, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15771-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 6394.97],
                        "speed": [0, 2]
                    }, {"in": [6394.97, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#buttonu15774').registerPositionScrollEffect([{
                        "in": [-Infinity, 6395.6],
                        "speed": [1, 1]
                    }, {"in": [6395.6, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#buttonu15780').registerPositionScrollEffect([{
                        "in": [-Infinity, 6395.6],
                        "speed": [-1, 1]
                    }, {"in": [6395.6, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15524-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15525-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15526-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-2, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15527-4').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15528').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15535').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u19760').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u19772').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15539').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u19784').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u19793').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15551').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15554').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u19802').registerPositionScrollEffect([{
                        "in": [-Infinity, 8055.45],
                        "speed": [-1, 1]
                    }, {"in": [8055.45, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#pamphletu18096').registerPositionScrollEffect([{
                        "in": [-Infinity, 8056.6],
                        "speed": [1, 1]
                    }, {"in": [8056.6, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    $('#u15558').registerPositionScrollEffect([{
                        "in": [-Infinity, 8054.38],
                        "speed": [1, 1]
                    }, {"in": [8054.38, Infinity], "speed": [0, 1]}]);
                    /* scroll effect */
                    Muse.Utils.showWidgetsWhenReady();
                    /* body */
                    Muse.Utils.transformMarkupToFixBrowserProblems();
                    /* body */
                } catch (b) {
                    if (b && "function" == typeof b.notify ? b.notify() : Muse.Assert.fail("Error calling selector function: " + b), false)throw b;
                }
            })
        })
    };

</script>
<script src="scripts/require.js" type="text/javascript" async
        data-main="scripts/museconfig.js"
        onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }"
        onerror="window.Muse.assets.check();"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</html>
