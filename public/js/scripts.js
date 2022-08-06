'use strict';

function loadFont(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var css = xhr.responseText;
            css = css.replace(/}/g, 'font-display: swap; }');

            var head = document.getElementsByTagName('head')[0];
            var style = document.createElement('style');
            style.appendChild(document.createTextNode(css));
            head.appendChild(style);
        }
    };
    xhr.send();
}
loadFont('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,500,700,900');

var Base64 = {
    // private property
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
    encode: function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output +
                this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
                this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

        }

        return output;
    },

    // public method for decoding
    decode: function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = Base64._utf8_decode(output);

        return output;

    },

    // private method for UTF-8 encoding
    _utf8_encode: function (string) {
        string = string.replace(/\r\n/g, "\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            } else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            } else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode: function (utftext) {
        var string = "";
        var i = 0;
        var c = 0;
        var c1 = 0;
        var c2 = 0;

        while (i < utftext.length) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            } else if ((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i + 1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            } else {
                c2 = utftext.charCodeAt(i + 1);
                c3 = utftext.charCodeAt(i + 2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}

$(document).ready(function () {

    $(document).on('click', '.has-subcats', function (e) {
        e.preventDefault();
        $(this).parent().find('ul').slideToggle();
    });


    function pxloadimage(data) {
        var winHeight = $(window).height(),
            curPos = $(document).scrollTop(),
            $images = $('.lazyload');

        if (data == "scroll") {
            for (var i = 0; i < $images.length; ++i) {
                // Note: $img is an jQuery object
                var $img = $images.eq(i),
                    imgPos = $img.offset().top;

                var url = $img.attr('data-src'),
                    img = $img.get(0); // This is the DOM image object

                if (url.length) {
                    img.src = url;
                    img.setAttribute('data-src', '');

                    img.style.opacity = 1;

                }
            }
        } else {
            // Loop thru all of the images that have been assigned the lazyload class
            for (var i = 0; i < $images.length; ++i) {

                // Note: $img is an jQuery object
                var $img = $images.eq(i),
                    imgPos = $img.offset().top;

                if (curPos >= (imgPos - winHeight - 150)) {

                    var url = $img.attr('data-src'),
                        img = $img.get(0); // This is the DOM image object

                    if (url.length) {
                        img.src = url;
                        img.setAttribute('data-src', '');

                        img.style.opacity = 1;
                    }
                }
            }
        }
    }

    pxloadimage();
    $(document).scroll(function (e) {
        pxloadimage('scroll');
    });

    function clearconsole() {
        if (window.console) {
            console.clear();
        }
    }

    $(document).on('click', '.result_ajax', function (event) {
        event.stopPropagation();
    });

    $(window).click(function () {
        if ($('.result_ajax').length) {
            $('.result_ajax').remove();
        }
    });

    if ($('.sinopsis').outerHeight() > 180) {
        $('.sinopsis').addClass('active');
        if ($('.sinopsis.readmore').length) {
            $('.sinopsis').text('Leer más');
        } else {
            $('.sinopsis').after('<a href="javascript:void(0)" class="sinopsis-readmore sipr1">Leer más</a>');
        }
    }

    if (typeof user_id !== 'undefined') {
        setInterval(function () {
            $.post("/ajax/login-update", {
                id: user_id
            })
                .done(function (data) { });
        }, 120 * 1000);
    }

    $(document).on('click', 'a.anotif', function () {
        $('.notif').toggle();
    });

    $(document).on('click', '.menu-child > span', function () {
        $(this).parent().find('.submenu').slideToggle();
    });

    $(document).on('click', '.readmore', function () {
        $(this).next('div').css({
            'display': 'inline'
        });
        $(this).remove();
    });

    $(document).on('click', '.season-n', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).parent().find('.season-ep').slideUp(300);
        } else {
            $(this).parent().parent().find('.season-n').removeClass('active');
            $(this).parent().parent().find('.season-ep').slideUp(300);
            $(this).addClass('active');
            $(this).parent().find('.season-ep').slideToggle(300);
        }
    });
});
