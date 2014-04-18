
(function ($) {
    $.fn.cyrillic = function(options) {
        $.fn.cyrillic.init();
        options = $.extend({}, $.fn.cyrillic.defaults, options);

        this.each(function() {
            var opts = $.fn.cyrillic.elementOptions(this, options);

            $(this).bind('keypress', function(e) {

                //alert('jane');
                if ($.browser.msie && !event.ctrlKey) { //IE
                    //Repace Key
                    var upper = $.fn.cyrillic.isUpper(event.keyCode);
                    var rep_letter = $.fn.cyrillic.cyr5ko_tast(event.keyCode, upper);
                    if (rep_letter) {
                        //IE Support
                        window.event.keyCode = rep_letter.charCodeAt();
                    }
                } else if (!e.ctrlKey || $.browser.chrome) { //DOM

                    if ($.browser.safari || $.browser.chrome) {
                        //Chrome Safari Support
                        var upper = $.fn.cyrillic.isUpper(e.which);
                        var rep_letter = $.fn.cyrillic.cyr5ko_tast(e.which, upper);
                        if (rep_letter) {

                            var newEvent = document.createEvent('TextEvent');
                            newEvent.initTextEvent('textInput', true, true, null, rep_letter);

                            e.preventDefault();
                            this.dispatchEvent(newEvent);
                        }

                    } else if ($.browser.opera) {
                        //Opera
                        var upper = $.fn.cyrillic.isUpper(e.which);
                        var rep_letter = $.fn.cyrillic.cyr5ko_tast(e.which, upper);
                        if (rep_letter) {

                            var CaretPosS = this.selectionStart;
                            var CaretPosE = this.selectionEnd;

                            insertionS = CaretPosS == -1 ? CaretPosE : CaretPosS;
                            insertionE = CaretPosE;

                            e.preventDefault();

                            var tmp = this.value;
                            this.value = tmp.substring(0, insertionS) + rep_letter + tmp.substring(insertionS, tmp.length);

                            //alert("This plugin not work best in Opera!!!");
                        }

                    } else {

                        //Firefox 
                        var upper = $.fn.cyrillic.isUpper(e.which);
                        var rep_letter = $.fn.cyrillic.cyr5ko_tast(e.which, upper);
                        if (rep_letter) {
                            var newEvent = document.createEvent("KeyEvents");
                            newEvent.initKeyEvent("keypress", true, true, document.defaultView, e.ctrlKey, e.altKey, e.shiftKey, e.metaKey, 0, rep_letter.charCodeAt(0));
                            e.preventDefault();
                            e.target.dispatchEvent(newEvent);
                        }
                    }
                }

            });

        });
    };

    $.fn.cyrillic.elementOptions = function (ele, options) {
        return $.metadata ? $.extend({}, options, $(ele).metadata()) : options;
    };

    $.fn.cyrillic.defaults =
    {
        AZBk: new Array()
    };

    $.fn.cyrillic.init = function () {
        opts = $.fn.cyrillic.defaults;
        var i1 = 0;
        opts.AZBk[i1++] = new Array("џ", "Џ", "120", "88");
        opts.AZBk[i1++] = new Array("ќ", "Ќ", "39", "34");
        opts.AZBk[i1++] = new Array("љ", "Љ", "113", "81");
        opts.AZBk[i1++] = new Array("њ", "Њ", "119", "87");
        opts.AZBk[i1++] = new Array("ѕ", "Ѕ", "121", "89");
        opts.AZBk[i1++] = new Array("ж", "Ж", "92", "124");
        opts.AZBk[i1++] = new Array("а", "А", "97", "65");
        opts.AZBk[i1++] = new Array("б", "Б", "98", "66");
        opts.AZBk[i1++] = new Array("в", "В", "118", "86");
        opts.AZBk[i1++] = new Array("г", "Г", "103", "71");
        opts.AZBk[i1++] = new Array("д", "Д", "100", "68");
        opts.AZBk[i1++] = new Array("е", "Е", "101", "69");
        opts.AZBk[i1++] = new Array("з", "З", "122", "90");
        opts.AZBk[i1++] = new Array("и", "И", "105", "73");
        opts.AZBk[i1++] = new Array("ј", "Ј", "106", "74");
        opts.AZBk[i1++] = new Array("к", "К", "107", "75");
        opts.AZBk[i1++] = new Array("л", "Л", "108", "76");
        opts.AZBk[i1++] = new Array("м", "М", "109", "77");
        opts.AZBk[i1++] = new Array("н", "Н", "110", "78");
        opts.AZBk[i1++] = new Array("о", "О", "111", "79");
        opts.AZBk[i1++] = new Array("п", "П", "112", "80");
        opts.AZBk[i1++] = new Array("р", "Р", "114", "82");
        opts.AZBk[i1++] = new Array("с", "С", "115", "83");
        opts.AZBk[i1++] = new Array("т", "Т", "116", "84");
        opts.AZBk[i1++] = new Array("у", "У", "117", "85");
        opts.AZBk[i1++] = new Array("ф", "Ф", "102", "70");
        opts.AZBk[i1++] = new Array("х", "Х", "104", "72");
        opts.AZBk[i1++] = new Array("ц", "Ц", "99", "67");
        opts.AZBk[i1++] = new Array("ч", "Ч", "59", "58");
        opts.AZBk[i1++] = new Array("ш", "Ш", "91", "123");
        opts.AZBk[i1++] = new Array("ѓ", "Ѓ", "93", "125");
        opts.AZBk[i1++] = new Array("ш", "Ш", "353", "352");
        opts.AZBk[i1++] = new Array("џ", "Џ", "273", "272");
        opts.AZBk[i1++] = new Array("ч", "Ч", "269", "268");
        opts.AZBk[i1++] = new Array("ќ", "Ќ", "263", "262");
        opts.AZBk[i1++] = new Array("ж", "Ж", "382", "381");
        opts.AZBk[i1++] = new Array(".", ":", "46", "62");
        opts.AZBk[i1++] = new Array(",", ";", "44", "60");
        opts.AZBk[i1++] = new Array("2", "„", "50", "64");
        opts.AZBk[i1++] = new Array("3", "“", "51", "35");
        opts.AZBk[i1++] = new Array("4", "’", "52", "36");
        opts.AZBk[i1++] = new Array("6", "‘", "54", "94");

    };

    $.fn.cyrillic.cyr5ko_tast = function (keyCode, upper) {
        opts = $.fn.cyrillic.defaults;
        for (var i = 0; i < opts.AZBk.length; i++) {
            if (upper) {
                fromKeyCode = opts.AZBk[i][3];
                if (keyCode == fromKeyCode) {
                    toLetter = opts.AZBk[i][1];
                    return toLetter;
                }
            }
            else {
                fromKeyCode = opts.AZBk[i][2];
                if (keyCode == fromKeyCode) {
                    toLetter = opts.AZBk[i][0];
                    return toLetter;
                }
            }
        }
        return false;
    }

    $.fn.cyrillic.isUpper = function (key) {
        opts = $.fn.cyrillic.defaults;
        for (var i = 0; i < opts.AZBk.length; i++) {
            if (key == opts.AZBk[i][3]) {
                return 1;
            }
        }
        return 0;
    }


    $.fn.cyrillic.getKeyCode = function (e) {
        if (!e) {
            //if the browser did not pass the event information to the
            //function, we will have to obtain it from the event register
            if (window.event) {
                //Internet Explorer
                e = window.event;
            } else {
                //total failure, we have no way of referencing the event
                return;
            }
        }
        if (typeof (e.keyCode) == 'number') {
            //DOM
            return e.keyCode;
        } else if (typeof (e.which) == 'number') {
            //NS 4 compatible
            return e.keyCode;
        } else if (typeof (e.charCode) == 'number') {
            //also NS 6+, Mozilla 0.9+
            return e.keyCode;
        } else {
            //total failure, we have no way of obtaining the key code
            return
        }
    };

    $.fn.cyrillic.oc = function (a) {
        var o = {};
        for (var i = 0; i < a.length; i++) {
            o[a[i]] = '';
        }
        return o;
    }

})(jQuery);