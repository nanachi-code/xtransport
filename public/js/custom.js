/**
 * http://kopatheme.com
 * Copyright (c) 2015 Kopatheme
 *
 * Licensed under the GPL license:
 *  http://www.gnu.org/licenses/gpl.html
 **/
/**
1. EVENT LOAD PAGE
	1.1 MENU SUPER FISH
	1.2 BTN SCROLL TOP AND MOVE TO AREA
	1.3 CUSTOM SCROLL
	1.4 COUNT UP
	1.5 MATH HEIGHT
	1.6 SHOW/HIDE CONTENT
	1.7 CAROUSEL JS
	1.8 CUSTOM BACKGROUND
	1.9 ARCORDION
	1.10 GRID MASONRY LAYOUT
	1.11 CLEAR EVENT HREF
	1.12 VALIDATE JS
	1.13 GOOGLE MAPS
	1.14 SMOOTH SCROLL
	1.15 LOADING BAR WAYPOINT

2. FUNCTION
	2.1 JS PIECHART

----------------------------------------------------**/
"use strict";
var sync1 = jQuery(".ex-module-slider-13 .main-img-wrap");
var sync2 = jQuery(".ex-module-slider-13 .thumb-img-wrap");
/*-================= 1- EVENT EVEN LOADPAGE ================== -*/
jQuery(document).ready(function () {
    /*------ ========1.1 MENU SUPER FISH =======--------*/
    if (".main-menu".length) {
        jQuery(".main-menu").superfish({
            speed: "fast",
            delay: "300",
        });
    }
    /*------ ========= END MENU SUPER FISH ====== ------*/

    /*----- =========== 1.2 BTN SCROLLTOP AND MOVE TO AREA ============= ------*/
    if (".btn-back-top".length) {
        jQuery(window).scroll(function (event) {
            var x = jQuery(window).scrollTop();
            if (x > 200) {
                jQuery(".btn-back-top").fadeIn("slow");
            } else {
                jQuery(".btn-back-top").fadeOut();
            }
        });
        jQuery(".btn-back-top").on("click", function (event) {
            jQuery("html,body").animate(
                {
                    scrollTop: 0,
                },
                500
            );
        });
    }

    /*----- ============ END ============ ---------*/

    /*---- ========================= 1.3 CUSTOM SCROLL =================----------*/

    if (".ex-module-scroll-1".length) {
        jQuery(".content-1").mCustomScrollbar({
            axis: "x",
            advanced: {
                autoExpandHorizontalScroll: true,
            },
        });

        var i = 1,
            imgs = [
                "img1.jpg",
                "img2.jpg",
                "img3.jpg",
                "img4.jpg",
                "img5.jpg",
                "img6.jpg",
                "img7.jpg",
            ];

        jQuery("a[rel='add-content']").click(function (e) {
            e.preventDefault();
            var markup =
                "<li id='img-" +
                i +
                "-container'><img src='images/" +
                imgs[i] +
                "' /></li>";
            jQuery(".content .mCSB_container ul").append(markup);
            if (i < imgs.length - 1) {
                i++;
            } else {
                i = 0;
            }
        });

        jQuery("a[rel='remove-content']").click(function (e) {
            e.preventDefault();
            if (jQuery(".content .mCSB_container ul li").length < 4) {
                return;
            }
            i--;
            if (i < 0) {
                i = imgs.length - 1;
            }
            jQuery("#img-" + i + "-container").remove();
        });
    }

    /*--------- ============== 1.4 COUNT UP ============ ------------*/
    if (jQuery(".counter").length) {
        jQuery(".counter").each(function (event) {
            jQuery(this).counterUp({
                time: 3000,
                delay: 10,
            });
        });
    }
    /*----------=============  END  ================ ---------*/

    /*---------============= 1.5 MATCH HEIGHT =========== --------*/
    function mh_1() {
        jQuery(".ul-mh").children().matchHeight();
    }
    if (jQuery(".ul-mh").length) {
        mh_1();
    }

    /*---------==============  END ============= ----------*/

    /*-------- ================ 1.6 SHOW/HIDE HIDDENT CONTENT =============== ---------*/

    if (".btn-off".length) {
        jQuery(".btn-off").on("click", function () {
            jQuery(".wrap-hidden-content").slideUp();
        });
    }

    if (".btn-search".length) {
        jQuery(".btn-search").on("click", function () {
            jQuery(".form-search-hidden").slideToggle();
        });
    }

    if (".btn-device".length) {
        jQuery(".btn-device").on("click", function () {
            jQuery(".contact-hidden").slideToggle();
        });
    }

    if (".active-form-search".length) {
        jQuery(".active-form-search").on("click", function () {
            var get_data = jQuery(this).attr("data-target");
            jQuery(".wrap-hidden-content").slideUp();
            jQuery(
                ".wrap-hidden-content[data-form=" + get_data + "]"
            ).slideToggle();
            jQuery(".wrap-support-number").slideUp();
        });
    }
    if (".active-support-number".length) {
        jQuery(".active-support-number").on("click", function () {
            var get_data = jQuery(this).attr("data-target");
            jQuery(
                ".wrap-support-number[data-contact=" + get_data + "]"
            ).slideToggle();
            jQuery(".wrap-hidden-content").slideUp();
        });
    }

    if (".humberger-menu".length) {
        jQuery(".humberger-menu").on("click", function () {
            jQuery(".slider-area").show("slow");
        });
    }

    if (".btn-close-hidden-nav".length) {
        jQuery(".btn-close-hidden-nav").on("click", function () {
            jQuery(".slider-area").hide("slow");
        });
    }

    if (".btn-show-tb-info".length) {
        jQuery(".btn-show-tb-info").on("click", function () {
            var get_data = jQuery(this).attr("data-target");
            jQuery(".table-info[data-tb=" + get_data + "]").slideToggle();
        });
    }

    /*-------- ================ END ================ --------*/

    /*------- ===============1.7  Js OURCAROUSEL SLIDER JS ============ -------*/

    /*--- JS EX-MODULE-SLIDER-1 ----*/
    if (".ex-module-slider-1".length) {
        var owl = jQuery(".ex-module-slider-1 .owl-carousel");
        owl.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1366, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [1024, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: [360, 1], // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        //owl.trigger('owl.play',2000); //owl.play event accept autoPlay speed as second parameter
        jQuery(".btn-next-slider1").on("click", function () {
            owl.trigger("owl.next");
        });
        jQuery(".btn-prev-slider1").on("click", function () {
            owl.trigger("owl.prev");
        });
    }
    /*---- end ---*/

    /*---- JS EX-MODULE-SLIDER-2 -----*/

    if (".ex-module-slider-2".length) {
        var owl2 = jQuery(".ex-module-slider-2 .owl-carousel");
        owl2.owlCarousel({
            items: 5, //10 items above 1000px browser width
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: [360, 1], // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        owl2.trigger("owl.play", 5000); //owl.play event accept autoPlay speed as second parameter
        jQuery(
            ".ex-module-slider-2 .widget-content .customNavigation .next"
        ).on("click", function () {
            owl2.trigger("owl.next");
        });
        jQuery(
            ".ex-module-slider-2 .widget-content .customNavigation .prev"
        ).on("click", function () {
            owl2.trigger("owl.prev");
        });
    }
    /*---- end ---*/

    /*---  JS EX-MODULE-NEW-LASTEST ----*/
    if (".ex-module-article-2".length) {
        var owl3 = jQuery(".ex-module-article-2 .owl-carousel");
        owl3.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [980, 2], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        //owl1.trigger('owl.play',2000); //owl.play event accept autoPlay speed as second parameter
        jQuery(".btn-next-slider-news-lastest").on("click", function () {
            owl3.trigger("owl.next");
        });
        jQuery(".btn-prev-slider-news-lastest").on("click", function () {
            owl3.trigger("owl.prev");
        });
    }

    /*--- end --*/

    /*------- **** -----*/
    if (".ex-module-slider-7".length) {
        var owl4 = jQuery(".ex-module-slider-7 .owl-carousel");
        owl4.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        //owl1.trigger('owl.play',2000); //owl.play event accept autoPlay speed as second parameter
        jQuery(".btn-next-slider-news-lastest-1").on("click", function () {
            owl4.trigger("owl.next");
        });
        jQuery(".btn-prev-slider-news-lastest-1").on("click", function () {
            owl4.trigger("owl.prev");
        });
    }
    /*------ end ------*/

    /*------ ******** -------*/
    if (".ex-module-slider-9".length) {
        var owl5 = jQuery(".ex-module-slider-9 .owl-carousel");
        owl5.owlCarousel({
            items: 1, //10 items above 1000px browser width
            itemsDesktop: [1000, 1], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 1], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        jQuery(".btn-next-slider9").on("click", function () {
            owl5.trigger("owl.next");
        });
        jQuery(".btn-prev-slider9").on("click", function () {
            owl5.trigger("owl.prev");
        });
    }
    /*------ end ---------*/

    /*------ *** --------*/
    if (".ex-module-slider-10".length) {
        var owl6 = jQuery(".ex-module-slider-10 .owl-carousel");
        owl6.owlCarousel({
            items: 1, //10 items above 1000px browser width
            itemsDesktop: [1000, 1], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 1], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        owl6.trigger("owl.play", 5000); //owl.play event accept autoPlay speed as second parameter
        jQuery(".btn-next-slider10").on("click", function () {
            owl6.trigger("owl.next");
        });
        jQuery(".btn-prev-slider10").on("click", function () {
            owl6.trigger("owl.prev");
        });
    }
    /*------ end --------*/

    /*--------- *** -----------*/
    if (".slider-thumb-blog-art-1".length) {
        var owl7 = jQuery(".slider-thumb-blog-art-1");
        owl7.owlCarousel({
            items: 1, //10 items above 1000px browser width
            itemsDesktop: [1000, 1], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 1], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            pagination: false,
        });
        jQuery(".btn-next-slider-thumb-blog-art-1").on("click", function () {
            owl7.trigger("owl.next");
        });
        jQuery(".btn-prev-slider-thumb-blog-art-1").on("click", function () {
            owl7.trigger("owl.prev");
        });
    }
    /*----------- end ---------*/

    /*----------- **** -------------------*/
    if (".ex-module-slider-13".length) {
        var sync1 = jQuery(".ex-module-slider-13 .main-img-wrap");
        var sync2 = jQuery(".ex-module-slider-13 .thumb-img-wrap");

        sync1.owlCarousel({
            singleItem: true,
            slideSpeed: 1000,
            navigation: true,
            pagination: false,
            afterAction: syncPosition,
            responsiveRefreshRate: 200,
            navigationText: [
                "<i class='fa fa-angle-left' aria-hidden='true'></i>",
                "<i class='fa fa-angle-right' aria-hidden='true'></i>",
            ],
        });

        sync2.owlCarousel({
            items: 8,
            itemsDesktop: [1199, 8],
            itemsDesktopSmall: [979, 10],
            itemsTablet: [768, 8],
            itemsMobile: [479, 4],
            pagination: false,
            responsiveRefreshRate: 100,
            afterInit: function (el) {
                el.find(".owl-item").eq(0).addClass("synced");
            },
        });

        jQuery(".thumb-img-wrap").on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = jQuery(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });
    }
    /*----------- ** ---------------------*/

    /*-------- ============== END ======================== ------*/

    /*---------- ================= 1.8 CUSTOM BACKGROUND ================ --------*/

    var bq_1 = jQuery(".kopa-blockquote-7");
    if (bq_1.length) {
        bq_1.each(function () {
            var bq_1_bg = jQuery(this).data("bg");
            jQuery(this).css("background-image", "url(" + bq_1_bg + ")");
        });
    }

    var bq_2 = jQuery(".wrap-img-1");
    if (bq_2.length) {
        bq_2.each(function () {
            var bq_2_bg = jQuery(this).data("bg");
            jQuery(this).css("background-image", "url(" + bq_2_bg + ")");
        });
    }

    /*---------- ================== END ================== ---------- */

    /*------- ============== 1.9 ACCORDION ============== -----------*/

    var i1 = 0;
    if (jQuery(".kopa-accordion").length) {
        jQuery(".kopa-accordion").each(function () {
            var ct_acc_1 = jQuery(this).find(".panel-group");
            ct_acc_1.each(function () {
                var item_index_1 = "accordion" + i1,
                    item_index_11 = "#" + item_index_1;

                jQuery(this).attr("id", item_index_1);
                jQuery(this)
                    .find(".panel-default")
                    .each(function () {
                        jQuery(this)
                            .find(".panel-title")
                            .children("a")
                            .attr("data-parent", item_index_11);
                        jQuery(this)
                            .find(".panel-title")
                            .children("a")
                            .attr(
                                "href",
                                item_index_11 + +jQuery(this).index()
                            );
                        jQuery(this)
                            .find(".panel-collapse")
                            .attr("id", item_index_11 + +jQuery(this).index());
                    });
            });
            ++i1;
        });
    }

    var panel_titles = jQuery(".kopa-accordion .panel-title a");
    panel_titles.addClass("collapsed");
    jQuery(".panel-heading.active").find(panel_titles).removeClass("collapsed");

    panel_titles.on("click", function () {
        jQuery(this)
            .closest(".kopa-accordion")
            .find(".panel-heading")
            .removeClass("active");
        jQuery(this)
            .closest(".kopa-accordion-1")
            .find(".collapse")
            .collapse("hide");
        jQuery(this).closest(".panel-heading").next().collapse("toggle");

        var pn_heading = jQuery(this).parents(".panel-heading");
        if (jQuery(this).hasClass("collapsed")) {
            pn_heading.addClass("active");
        } else {
            pn_heading.removeClass("active");
        }
    });
    /*----------- ================ END ============== ------------*/

    /*---------- ================ 1.10  GRID ITEM MANSORY  =============== ------------*/

    /*--------- ======== BLOG MASONRY ========= ------------*/

    var filter_1 = jQuery(".ex-module-grid-masonry-1");
    var ex_link_01 =
        "https://gist.githubusercontent.com/anonymous/14420185c4de220a96923d49aea097b4/raw/4524fbbdff2a3fe9a6a9e57970f8eeab50c8bc71/loadmore-ex-01";
    if (jQuery(filter_1).length) {
        jQuery(filter_1).each(function () {
            var container_1 = jQuery(this).find(".masonry-container"),
                m_filters_1 = jQuery(this)
                    .find(".masonry-filter")
                    .children("a");
            var masonryOptions = {
                columnWidth: 1,
                itemSelector: ".ms-item-01.show",
            };
            container_1.imagesLoaded(function () {
                var m_grid = container_1.masonry(masonryOptions);

                m_filters_1.click(function (event) {
                    event.preventDefault();
                    m_filters_1.removeClass("active");
                    jQuery(this).addClass("active");
                    var m_filter_val = jQuery(this).data("val");

                    container_1.find(".ms-item-01").each(function () {
                        var m_item_val = jQuery(this)
                            .data("val")
                            .toString()
                            .split(",");
                        var a =
                            m_item_val.indexOf(m_filter_val.toString()) > -1;

                        if (m_filter_val == "*") {
                            jQuery(this).removeClass("hide");
                            jQuery(this).addClass("show");
                        } else {
                            if (a == true) {
                                jQuery(this).removeClass("hide");
                                jQuery(this).addClass("show");
                            } else {
                                jQuery(this).removeClass("show");
                                jQuery(this).addClass("hide");
                            }
                        }
                    });

                    container_1.masonry("layout");
                });
            });

            jQuery(".btn-load-more").on("click", function (event) {
                jQuery
                    .ajax({
                        url: ex_link_01,
                        beforeSend: function (xhr) {},
                    })
                    .done(function (data) {
                        jQuery(data).imagesLoaded(function () {
                            var position_insert_data_01 = jQuery(
                                ".btn-load-more"
                            )
                                .closest(".ex-module-grid-masonry-1")
                                .find(".masonry-container");
                            var items_01 = jQuery(data).find(".ms-item-01");
                            if (items_01.length) {
                                jQuery.each(items_01, function (
                                    items_01,
                                    index
                                ) {
                                    jQuery(position_insert_data_01)
                                        .append(jQuery(this))
                                        .masonry("appended", jQuery(this));
                                });
                            }
                        });
                    });
            });
        });
    }

    /*------- ================ END BLOG MASONRY ==================== ------*/

    /*--------- ======== GALLERY MASONRY ========= ------------*/

    var filter_2 = jQuery(".masonry-gallery");

    if (jQuery(filter_2).length) {
        jQuery(filter_2).each(function () {
            var container_2 = jQuery(this).find(".masonry-container-2"),
                m_filters_2 = jQuery(this)
                    .find(".masonry-filter-2 li")
                    .children("a");
            var masonryOptionsGallery = {
                columnWidth: 1,
                itemSelector: ".ms-item-01.show",
            };
            container_2.imagesLoaded(function () {
                var m_grid = container_2.masonry(masonryOptionsGallery);

                m_filters_2.click(function (event) {
                    event.preventDefault();
                    m_filters_2.removeClass("active");
                    jQuery(this).addClass("active");
                    var m_filter_val_2 = jQuery(this).data("val");

                    container_2.find(".ms-item-01").each(function () {
                        var m_item_val_2 = jQuery(this)
                            .data("val")
                            .toString()
                            .split(",");
                        var a =
                            m_item_val_2.indexOf(m_filter_val_2.toString()) >
                            -1;

                        if (m_filter_val_2 == "*") {
                            jQuery(this).removeClass("hide");
                            jQuery(this).addClass("show");
                        } else {
                            if (a == true) {
                                jQuery(this).removeClass("hide");
                                jQuery(this).addClass("show");
                            } else {
                                jQuery(this).removeClass("show");
                                jQuery(this).addClass("hide");
                            }
                        }
                    });

                    container_2.masonry("layout");
                });
            });
        });
    }

    /*------- ================ END GALLERY MASONRY ====================== ------*/

    /*------ ================ 1.11 CLEAR EVENT LINK # ====================== ----*/
    if (".clear-href".length) {
        jQuery("a.clear-href").on("click", function (event) {
            event.preventDefault();
            //code
        });
    }
    /*----- ===================== END =========================== ----*/

    /*------ =================== 1.12 VALIDATE JS ================== -------*/

    /*-- form style 1 --*/

    if (".form-style-1".length) {
        jQuery(".form-style-1").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: "Not Null",
                    minlength: "very short, replace with 2 char is minimum",
                    maxlength: "over long, replace with 50 char is maximum",
                },
                email: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }

    /*-- form style 2 --*/

    if (".form-style-2".length) {
        jQuery(".form-style-2").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: "Not Null",
                    minlength: "very short, replace with 2 char is minimum",
                    maxlength: "over long, replace with 50 char is maximum",
                },
                email: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }

    /*-- form style 3 --*/

    if (".form-style-3".length) {
        jQuery(".form-style-3").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: "Not Null",
                    minlength: "very short, replace with 2 char is minimum",
                    maxlength: "over long, replace with 50 char is maximum",
                },
                email: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }

    /*-- form style 4 --*/

    if (".form-style-4".length) {
        jQuery(".form-style-4").validate({
            rules: {
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
                emailAdress: {
                    required: true,
                    email: true,
                },
                phoneNumber: {
                    digits: true,
                },
                subject: {
                    required: true,
                },
            },
            messages: {
                firstName: {
                    required: "Not Null",
                },
                lastName: {
                    required: "Not Null",
                },
                subject: {
                    required: "Not Null",
                },
                emailAdress: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }
    /*-- form style 5 --*/

    if (".form-style-5".length) {
        jQuery(".form-style-5").validate({
            rules: {
                Name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                },
                emailReuired: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                Name: {
                    required: "Not Null",
                    minlength: "very short, replace with 2 char is minimum",
                    maxlength: "over long, replace with 50 char is maximum",
                },
                emailReuired: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }

    /*-- form style 6 --*/

    if (".form-style-6".length) {
        jQuery(".form-style-6").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: "Not Null",
                    minlength: "very short, replace with 2 char is minimum",
                    maxlength: "over long, replace with 50 char is maximum",
                },
                email: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }

    /*-- ct-form-2 --*/

    if (".ct-form-2".length) {
        jQuery(".ct-form-2").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }

    /*-- ct-form-3 --*/

    if (".ct-form-3".length) {
        jQuery(".ct-form-3").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: {
                    required: "Not Null",
                    email: "Not Email Type",
                },
            },
        });
    }
    /*------ ====================== END VALIDATE JS ============== ------*/

    /*----- ========================= 1.13 GOOGLE MAPS ====================== ----*/

    if (jQuery(".kopa-map").length > 0) {
        var id_map = jQuery(".kopa-map").attr("id");
        var lat = parseFloat(jQuery(".kopa-map").attr("data-latitude"));
        var lng = parseFloat(jQuery(".kopa-map").attr("data-longitude"));
        var place = jQuery(".kopa-map").attr("data-place");

        var map = new GMaps({
            el: "#" + id_map,
            lat: lat,
            lng: lng,
            zoom: 10,
            zoomControl: true,
            zoomControlOpt: {
                style: "SMALL",
                position: "TOP_RIGHT",
            },
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            scrollwheel: false,
            styles: [
                {
                    featureType: "administrative",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            visibility: "on",
                        },
                        {
                            color: "#eb0707",
                        },
                    ],
                },
                {
                    featureType: "road",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#f6be73",
                        },
                    ],
                },
                {
                    featureType: "road",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#eddba9",
                        },
                        {
                            weight: "1",
                        },
                        {
                            visibility: "on",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [
                        {
                            visibility: "simplified",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#f6be73",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#ff0000",
                        },
                        {
                            visibility: "off",
                        },
                    ],
                },
                {
                    featureType: "road.arterial",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            weight: "1",
                        },
                    ],
                },
                {
                    featureType: "road.arterial",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#f6be73",
                        },
                        {
                            visibility: "off",
                        },
                    ],
                },
                {
                    featureType: "transit.line",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            weight: "1",
                        },
                    ],
                },
                {
                    featureType: "transit.line",
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            weight: "0.14",
                        },
                    ],
                },
            ],
        });
        map.addMarker({
            lat: lat,
            lng: lng,
            title: place,
        });
    }
    /*---- =========================== END ================================= ---*/

    /*--- ============================ 1.14 SMOOTH SCROLL ======================= ---*/

    var sj_sm_scroll = jQuery(".btn-get-your-quote");
    if (sj_sm_scroll.length) {
        sj_sm_scroll.each(function () {
            var sj_sm_scroll_btn = sj_sm_scroll;
            sj_sm_scroll_btn.on("click", function (event) {
                event.preventDefault();
                if (
                    location.pathname.replace(/^\//, "") ==
                        this.pathname.replace(/^\//, "") &&
                    location.hostname == this.hostname
                ) {
                    var target = $(this.hash);
                    target = target.length
                        ? target
                        : $("[name=" + this.hash.slice(1) + "]");
                    if (target.length) {
                        $("html,body").animate(
                            {
                                scrollTop: target.offset().top,
                            },
                            800
                        );
                        return false;
                    }
                }
            });
        });
    }

    /*------ ================= END ====================== ----------*/

    /*------- ===================== 1.15 LOADING BAR WAYPOINT =================== -----*/

    var waypoint_element_1 = jQuery(".kopa-loading-bar-1"),
        waypoint_element_2 = jQuery(".kopa-loading-bar-2"),
        waypoint_element_3 = jQuery(".kopa-loading-bar-3"),
        waypoint_element_4 = jQuery(".kopa-loading-bar-4");
    if (".kopa-loading-bar".length) {
        waypoint_element_1.waypoint({
            handler: function () {
                jQuery(".kopa-loading-body-1").each(function () {
                    var get_data = jQuery(this).attr("data-load");
                    var set_data = get_data;

                    jQuery(this).animate(
                        {
                            width: set_data + "%",
                        },
                        2000,
                        "swing",
                        function () {
                            jQuery(
                                ".kopa-loading-bar .kopa-loading-header .data-load"
                            ).fadeIn("slow");
                        }
                    );
                });
            },
            offset: 300,
        });
        waypoint_element_2.waypoint({
            handler: function () {
                jQuery(".kopa-loading-body-2").each(function () {
                    var get_data = jQuery(this).attr("data-load");
                    var set_data = get_data;

                    jQuery(this).animate(
                        {
                            width: set_data + "%",
                        },
                        2000,
                        "swing",
                        function () {
                            jQuery(
                                ".kopa-loading-bar .kopa-loading-header .data-load"
                            ).fadeIn("slow");
                        }
                    );
                });
            },
            offset: 300,
        });

        waypoint_element_3.waypoint({
            handler: function () {
                jQuery(".kopa-loading-body-3").each(function () {
                    var get_data = jQuery(this).attr("data-load");
                    var set_data = get_data;

                    jQuery(this).animate(
                        {
                            width: set_data + "%",
                        },
                        2000,
                        "swing",
                        function () {
                            jQuery(
                                ".kopa-loading-bar .kopa-loading-header .data-load"
                            ).fadeIn("slow");
                        }
                    );
                });
            },
            offset: 300,
        });

        waypoint_element_4.waypoint({
            handler: function () {
                jQuery(".kopa-loading-body-4").each(function () {
                    var get_data = jQuery(this).attr("data-load");
                    var set_data = get_data;

                    jQuery(this).animate(
                        {
                            width: set_data + "%",
                        },
                        2000,
                        "swing",
                        function () {
                            jQuery(
                                ".kopa-loading-bar .kopa-loading-header .data-load"
                            ).fadeIn("slow");
                        }
                    );
                });
            },
            offset: 300,
        });
    }
    /*------- ========================= END ============================== -----*/

    /*------- ============================ 1.16 SLIDER PRO ======================= ----------*/
    if (".ex-module-slider-pro-1".length) {
        $(".ex-module-slider-pro-1 .slider-pro").sliderPro({
            width: 1366,
            height: 600,
            fade: true,
            arrows: true,
            buttons: false,
            shuffle: true,
            smallSize: 500,
            mediumSize: 1000,
            largeSize: 3000,
            autoplay: false,
            autoScaleLayers: true,
            forceSize: "fullWidth",
            init: function (event) {
                jQuery(".ex-module-slider-pro-1 .loading").hide();
                jQuery(".ex-module-slider-pro-1 .slider-pro").show();
            },
        });
    }

    /*-------- =============================== END ================================== -------*/
});
/*------- =========================== END EVENT LOAD ======================= -------------*/

/*----------================ 2- FUNCTION ================ ---------------*/

/*-- ===============2.1 PIE CHART COUNTER ============== --*/

jQuery(function () {
    if (".kopa-counter-1".length) {
        jQuery(".kopa-counter-1").easyPieChart({
            //your configuration goes here
            barColor: "#009cdc",
            scaleColor: "rgba(0,0,0,0)",
            lineWidth: "8",
            size: "165",
            lineCap: "butt",
            animate: 5000,
            onStep: function (from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent) + "%";
            },
        });

        jQuery(".kopa-counter-1").each(function () {
            var chart = (window.chart = jQuery(this).data("easyPieChart"));

            jQuery(this).on("mouseover", function () {
                chart.update(Math.random() * 200 - 100);
            });
        });
    }
});

jQuery(function () {
    if (".kopa-counter-1".length) {
        jQuery(".kopa-counter-5").easyPieChart({
            //your configuration goes here
            barColor: "#009cdc",
            scaleColor: "rgba(0,0,0,0)",
            lineWidth: "8",
            size: "200",
            lineCap: "butt",
            animate: 5000,
            onStep: function (from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent) + "%";
            },
        });
        jQuery(".kopa-counter-5").each(function () {
            var chart = (window.chart = jQuery(this).data("easyPieChart"));

            jQuery(this).on("mouseover", function () {
                chart.update(Math.random() * 200 - 100);
            });
        });
    }
});

/*-- ================== end ====================== --*/

/*-- ===================== function sync owl carousel ====================== --*/

function syncPosition(el) {
    var current = this.currentItem;
    jQuery(".thumb-img-wrap")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced");
    if (jQuery(".thumb-img-wrap").data("owlCarousel") !== undefined) {
        center(current);
    }
}

function center(number) {
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for (var i in sync2visible) {
        if (num === sync2visible[i]) {
            var found = true;
        }
    }

    if (found === false) {
        if (num > sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", num - sync2visible.length + 2);
        } else {
            if (num - 1 === -1) {
                num = 0;
            }
            sync2.trigger("owl.goTo", num);
        }
    } else if (num === sync2visible[sync2visible.length - 1]) {
        sync2.trigger("owl.goTo", sync2visible[1]);
    } else if (num === sync2visible[0]) {
        sync2.trigger("owl.goTo", num - 1);
    }
}

/*-- ============================= end =========================== --*/

/*------- ================ END FUNCTION ================= --------*/
jQuery(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
