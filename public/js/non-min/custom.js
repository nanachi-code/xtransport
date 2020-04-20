/**
 * http://kopatheme.com
 * Copyright (c) 2016 Kopatheme
 *
 * Licensed under the GPL license:
 *  http://www.gnu.org/licenses/gpl.html
 **/

/**
 *   1  - Menu
 *   2  - Search
 *   3  - Drop Down
 *   4  - Owl Carousel
 *   5  - Match Height
 *   6  - BX Slider
 *   7  - Back To Top
 *   8  - Hero Slider
 *   9  - Collapse
 *   10 - Count Down
 *   11 - Count Up
 *   12 - Responsive Tabs
 *   13 - Fit Video
 *   14 - Masonry
 *-----------------------------------------------------------------
 **/

'use strict';

jQuery(document).ready(function($) {
    var link_to_github_01 = 'https://gist.githubusercontent.com/hjepbo/66ff41bd37b7d216f9be6458c2d6bd9b/raw/7ff91694af7339161541dcc0828029d9d510d6f9/blog-masonry';

    /* Other */
    if ( jQuery('.kopa__service.style--03').length ) {
        var ServiceItem       = jQuery('.kopa__service.style--03'),
            widthServiceItem  = ServiceItem.find('.entry-item').outerWidth();

        ServiceItem.find('.entry-item').css('height', widthServiceItem + 'px');
    }

    if ( jQuery('.kopa__service.style--04').length ) {
        padding('.kopa__service.style--04', '.widget-title', '.entry-content');
    }

    if ( jQuery('.kopa__about.style--05').length ) {
        padding('.kopa__about.style--05', '.widget-title', '.entry-content');
    }

    if ( jQuery('.kopa__about.style--02').length ) {
        padding2('.kopa__about.style--02');
    }

    /* =========================================================
    1. Menu
    ============================================================ */
    /* Super fish */
    if ( jQuery('.sf-menu').length ) {
        // Main menu
        jQuery('.sf-menu').superfish({
            delay: 200,
            speed: 'normal',
            cssArrows: true,
            animation: {opacity:'show',height:'show'},
        });
    }

    /* Navgoco */
    if ( jQuery('.kopa__mobileMenu').length ) {
        jQuery(".kopa__mobileMenu .nav").navgoco();

        jQuery(".kopa__mobileMenu").each(function(){
            jQuery(this).on('click', '.kopa__mobileMenu__iconBar',function() {
                jQuery(".kopa__mobileMenu .nav").toggleClass("active");
            });
        });
    }

    /* =========================================================
    2. Search
    ============================================================ */
    if ( jQuery('.sb-search').length ) {
        new UISearch(document.getElementById('sb-search'));
    }

    /* =========================================================
    3. Drop Down
    ============================================================ */
    if ( jQuery('.kopa__header__office').length ) {

        var kopaHeaderOffice = jQuery('.kopa__header__office');

        dropDown(kopaHeaderOffice);

        kopaHeaderOffice.find('ul > li > a').on('click', function() {
            var kopaTextHeaderOffice = jQuery(this).text();

            kopaHeaderOffice.find('.active > span').text(kopaTextHeaderOffice);
        });
    }

    if ( jQuery('.kopa__header__country').length ) {
        var kopaHeaderCountry = jQuery('.kopa__header__country');

        dropDown(kopaHeaderCountry);

        kopaHeaderCountry.find('.widget_polylang > ul > li > a').on('click', function() {
            var kopaImgHeaderCountry = jQuery(this).find('img').clone();

            kopaHeaderCountry.find('div.active img').remove();
            kopaHeaderCountry.find('div.active').append(kopaImgHeaderCountry);
        });
    }

    /* =========================================================
    4. Owl Carousel
    ============================================================ */
    if ( jQuery('.owl-wrapper').length ) {
        jQuery('.owl-wrapper').each(function() {
            // Control slider
            var $this              = jQuery(this),
                option             = $this.find('.owl-carousel'),
                _item              = option.data('slider-item'),
                _itemsDesktop      = option.data('item-desktop'),
                _itemsDesktopSmall = option.data('item-desktop-small'),
                _itemTablet        = option.data('item-tablet'),
                _itemsMobile       = option.data('item-mobile'),
                _transition        = option.data('transition-style'),
                auto               = option.data('slider-auto'),
                navigation         = option.data('slider-navigation'),
                pagination         = option.data('slider-pagination'),
                owl                = option;


            if ( 1 == _itemTablet ) {
                _itemTablet = 1;
            } else {
                _itemTablet = 2;
            }

            owl.owlCarousel({
                items: _item,
                itemsDesktop: [1119, _itemsDesktop],
                itemsDesktopSmall: [992, _itemsDesktopSmall],
                itemsTablet: [768, _itemTablet],
                itemsMobile: [479, _itemsMobile],
                slideSpeed: 500,
                autoPlay: auto,
                navigation: navigation,
                pagination: pagination,
                stopOnHover: true,
                navigationText: false,
                addClassActive: true,
                transitionStyle : _transition,
                afterInit: function() {
                    if( jQuery(".kopa__mainSlider__loading").length ) {
                        jQuery(".kopa__mainSlider__loading").hide();
                    }
                }
            });

            // Custom Navigation Events
            $this.find(".next").on('click', function() {
                owl.trigger('owl.next');
            });

            $this.find(".prev").on('click', function() {
                owl.trigger('owl.prev');
            });
        });
    }

    if ( jQuery('.kopa__owlSync').length ) {
        jQuery('.kopa__owlSync').each(function() {

            var SyncThis   = jQuery(this),
                sync1      = SyncThis.find('.sync1'),
                sync2      = SyncThis.find('.sync2'),
                speed      = sync1.data('slider-speed'),
                auto       = sync1.data('slider-auto'),
                navigation = sync1.data('slider-navigation'),
                item       = sync1.data('slider-item');

            if (1 == auto) {
                auto = true;
            } else {
                auto = false;
            }

            if (1 == navigation) {
                navigation = true;
            } else {
                navigation = false;
            }

            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: speed,
                autoPlay: auto,
                navigation: navigation,
                pagination: false,
                stopOnHover: true,
                navigationText: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200,
                transitionStyle : "fade"
            });

            sync2.owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [767, 3],
                itemsMobile: [639, 2],
                navigation: false,
                stopOnHover: true,
                pagination: false,
                navigationText: false,
                responsiveRefreshRate: 100,
                afterInit: function(el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                }
            });


            function syncPosition(el) {
                var current = this.currentItem;
                sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced");
                if (sync2.data("owlCarousel") !== undefined) {
                    center(current);
                }
            }
            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = jQuery(this).data("owlItem");
                sync1.trigger("owl.goTo", number);
            });

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
                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                    } else {
                        if (num - 1 === -1) {
                            num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                    }
                } else if (num === sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", sync2visible[1])
                } else if (num === sync2visible[0]) {
                    sync2.trigger("owl.goTo", num - 1)
                }

            }
        });
    }

    /* =========================================================
    5. Match Height
    ============================================================ */
    if ( jQuery('.kopa__news.style--01').length ) {
        var matchHeight01 = jQuery('.kopa__news.style--01');
        matchHeight01.find('.matchHeight').matchHeight();
    }

    if ( jQuery('.kopa__bottomSidebar').length ) {
        var matchHeight02 = jQuery('.kopa__bottomSidebar');
        matchHeight02.find('.widget').matchHeight();
    }

    if ( jQuery('.kopa__news.style--02').length ) {
        var matchHeight03 = jQuery('.kopa__news.style--02');
        matchHeight03.find('.matchHeight').matchHeight();
    }

    if ( jQuery('.kopa__bottomSidebar').length ) {
        var matchHeight04 = jQuery('.kopa__bottomSidebar');
        matchHeight04.find('.col-xs-12').matchHeight();
    }

    if ( jQuery('.kopa__service.style--07').length ) {
        var matchHeight05 = jQuery('.kopa__service.style--07');
        matchHeight05.find('.kopa__service__list').matchHeight();
    }

    /* =========================================================
    6. BX Slider
    ============================================================ */
    if ( jQuery('.slider__quote').length ) {
        jQuery('.bxslider').each(function() {
            var $this = jQuery(this),
                controls = $this.data('controls'),
                pager = $this.data('pager');

            jQuery(this).bxSlider({
                mode: 'vertical',
                controls: controls,
                pager: pager,
                infiniteLoop: false
            });
        });
    }

    /* =========================================================
    7. Back To Top
    ============================================================ */
    if ( jQuery('.kopa__backTop').length ) {
        var offset              = 300,
            offset_opacity      = 1200,
            scroll_top_duration = 1000,
            back_to_top         = jQuery('.kopa__backTop');

        back_to_top.on('click', function(event) {
            event.preventDefault();
            jQuery('body,html').animate({
                scrollTop: 0
            }, scroll_top_duration);
        });
    }

    /* =========================================================
    8. Hero Slider
    ============================================================ */
    if ( jQuery('.cd-hero-slider').length ) {
        heroSlider();
    }

    /* =========================================================
    9. Collapse
    ============================================================ */
    (function($) {
        $.fn.accordion = function(options) {
            var defaults = {
                open: false,
                toggle: false
            }
            var settings = jQuery.extend({}, defaults, options);

            return this.each(function() {
                var accTitle = jQuery(this).children('.acc__title');

                accTitle.each(reset);

                jQuery(this).children('.acc__title').each(function() {
                    if (jQuery(this).hasClass('active')) {
                        jQuery(this).next().show();
                    }      
                });

                if(settings.toggle) {
                    accTitle.on('click',onClickTog);
                } else {
                    accTitle.on('click',onClickAcc);         
                }
            });

            function onClickAcc() {
                jQuery(this).siblings('.acc__title').removeClass('active');
                jQuery(this).addClass('active');

                jQuery(this).siblings('.acc__title').each(hide);
                jQuery(this).next().slideDown(400);
                return false;
            }

            function onClickTog() {   
                jQuery(this).toggleClass('active');

                if(jQuery(this).hasClass('active')) {
                    jQuery(this).next().slideDown(400);
                } else {
                    jQuery(this).next().slideUp(400);
                }
                return false;
            }

            function hide() {
                jQuery(this).next().slideUp(400);
            }

            function reset() {
                jQuery(this).next().hide();
            }
        }
    })(jQuery);

    jQuery('.kopa__accordion').each(function() {
        jQuery(this).accordion({
            toggle: false
        }); 
    });

    jQuery('.kopa__toggle').each(function() {
        jQuery(this).accordion({
            toggle: true
        }); 
    });

    /* =========================================================
    10. Count Down
    ============================================================ */
    if (jQuery('.kopa__countDown__wrap').length) {
        var $this        = jQuery('.kopa__countDown__wrap'),
            nextYear     = new Date(new Date().getFullYear() + 1, 0, 0, 0, 0, 0, 0),
            dataYear     = $this.data('year'),
            dataMonth    = $this.data('month'),
            dataDay      = $this.data('day'),
            dataTime     = $this.data('time'),
            dataDateTime = dataYear + '/' + dataMonth + '/' + dataDay + " " + dataTime;

        jQuery($this).countdown(dataDateTime, function(event) {
            var $this = jQuery(this).html(event.strftime(''
                +'<li><div><span>days</span><h3>%D</h3><span class="kopa__countDown__text">' + dataYear + '</span></div></li>'
                +'<li><div><span>hours</span><h3>%H</h3><span class="kopa__countDown__text">' + dataYear + '</span></div></li>'
                +'<li><div><span>minutes</span><h3>%M</h3><span class="kopa__countDown__text">' + dataYear + '</span></div></li>'
                +'<li><div><span>Second</span><h3>%S</h3><span class="kopa__countDown__text">' + dataYear + '</span></div></li>'));
        });
    }

    if (jQuery('.kopa__countDown.style--03').length) {
        var $this        = jQuery('.kopa__countDown.style--03'),
            dataDateTime = $this.data('year') + '/' + $this.data('month') + '/' + $this.data('day') + " " + $this.data('time');

        jQuery($this).find('.kopa__chart').each(function() {
            var $this = jQuery(this);
            var color = $this.data('color');
            var width = $this.data('width');
            var size  = $this.data('size');
            var time  = $this.data('time');

            $this.easyPieChart({
                barColor: color,
                trackColor: '#ebebeb',
                scaleColor: '#fff',
                lineWidth: width,
                size: size,
                animate: time
            });
        });

        jQuery($this).countdown(dataDateTime).on('update.countdown', function(event) {
            var chart_seconds = (event.offset.seconds / 60 *100);
            var chart_minutes = (event.offset.minutes / 60 *100);
            var chart_hours   = (event.offset.hours / 60 *100);
            var chart_days    = (event.offset.totalDays / 24 *100);

            jQuery('#kopa__days').text(event.offset.totalDays);
            jQuery('#kopa__hours').text(event.offset.hours);
            jQuery('#kopa__minutes').text(event.offset.minutes);
            jQuery('#kopa__seconds').text(event.offset.seconds);

            jQuery('.kopa__chart__seconds').data('easyPieChart').update(chart_seconds);
            jQuery('.kopa__chart__minutes').data('easyPieChart').update(chart_minutes);
            jQuery('.kopa__chart__hours').data('easyPieChart').update(chart_hours);
            jQuery('.kopa__chart__days').data('easyPieChart').update(chart_days);
        });
    }

    /* =========================================================
    11. Count Up
    ============================================================ */
    if (jQuery('.kopa__service.style--06').length) {
        jQuery('.kopa__service__text--large').counterUp({
            delay: 10,
            time: 3000
        });
    }

    if (jQuery('.kopa__skillBar').length) {
        jQuery('.kopa__skillBar__counter').counterUp({
            delay: 10,
            time: 3000
        });
    }

    /* =========================================================
    12. Responsive Tabs
    ============================================================ */
    if (jQuery('.kopa__tab').length) {
        fakewaffle.responsiveTabs(['xs', 'sm']);
    }

    /* =========================================================
    13. Fit Video
    ============================================================ */
    if (jQuery('.kopa__fitVid').length) {
        jQuery('.kopa__fitVid').fitVids();
    }

    /* =========================================================
    14. Masonry
    ============================================================ */
    if ( jQuery('.kopa__blogMasonry').length ) {
        jQuery('.kopa__blogMasonryWrapper').imagesLoaded(function() {
            jQuery('.kopa__blogMasonryWrapper').masonry({
                columnWidth: 1,
                itemSelector : '.col-xs-12'
            });

            jQuery('.kopa__loadMore').on('click', function(){
                jQuery.ajax({
                    url:link_to_github_01,
                    beforeSend: function( xhr ) {
                    },
                })
                .done(function( data ) {
                    var position_insert_data = jQuery('.kopa__loadMore').closest('.kopa__blogMasonry').find('.kopa__blogMasonryWrapper'),
                        items                = jQuery(data).find('.kopa__blogMasonryWrapper .col-xs-12');
                    if( items.length ) {
                        jQuery.each(items, function(items, index){
                            jQuery(position_insert_data).append(jQuery(this)).masonry( 'appended', jQuery(this));
                        });
                        jQuery('.kopa__blogMasonryWrapper').masonry('layout');
                    }
                });
            });
        });
    }

    if ( jQuery('.kopa__galleryPage.style--01').length ) {
        var _gallery            = jQuery('.kopa__galleryPage.style--01').find('.kopa__filterOptions__content'),
            masonryOptions      = {
                columnWidth: 1,
                itemSelector : '.col-xs-12'
            };

        _gallery.imagesLoaded(function(){
            var _galleryGrid       = _gallery.masonry(masonryOptions),
                _galleryFilter     = jQuery('.kopa__filterOptions');

            _gallery.masonry('layout');

            _galleryFilter.on('click', 'li', function(event){
                var _galleryFilterVal = jQuery(this).data('filter');

                event.preventDefault();
                _galleryFilter.removeClass('active');
                jQuery(this).addClass('active');

                _gallery.find('.col-xs-12').each(function(){
                    var _galleryFilterItem               = jQuery(this).data('filter').toString().split(','),
                        _galleryFilterItemIndex          = _galleryFilterItem.indexOf(_galleryFilterVal.toString()) > -1;

                    if ( _galleryFilterVal == "*" ) {
                        jQuery(this).removeClass('hide');
                        jQuery(this).addClass('show');
                    } else {
                        if ( _galleryFilterItemIndex == true ) {
                            jQuery(this).removeClass('hide');
                            jQuery(this).addClass('show');  
                        } else {
                            jQuery(this).removeClass('show');
                            jQuery(this).addClass('hide');
                        }
                    }                               
                });
                _gallery.masonry('layout');
            });
        });
    }

    /* =========================================================
    15. Scroll Reveal
    ============================================================ */
    // window.sr = ScrollReveal();
    // if ( jQuery(".kopa__reveal") ) {
    //     sr.reveal('.kopa__reveal', {
    //         duration: 1000,
    //         opacity: 0
    //     });

    //     sr.reveal('.top', {
    //         origin: 'top'
    //     });

    //     sr.reveal('.right', {
    //         origin: 'right',
    //         rotate: { z: -5 }
    //     });

    //     sr.reveal('.bottom', {
    //         origin: 'bottom'
    //     });

    //     sr.reveal('.left', {
    //         origin: 'left',
    //         rotate: { z: 5 }
    //     });
    // }
});

jQuery(window).resize(function() {
    if ( jQuery('.kopa__service.style--04').length ) {
        padding('.kopa__service.style--04', '.widget-title', '.entry-content');
    }

    if ( jQuery('.kopa__about.style--05').length ) {
        padding('.kopa__about.style--05', '.widget-title', '.entry-content');
    }

    if ( jQuery('.kopa__about.style--02').length ) {
        padding2('.kopa__about.style--02');
    }

    if ( jQuery('.kopa__news.style--01').length ) {
        var matchHeight01 = jQuery('.kopa__news.style--01');
        matchHeight01.find('.matchHeight').matchHeight();
    }

    if ( jQuery('.kopa__bottomSidebar').length ) {
        var matchHeight02 = jQuery('.kopa__bottomSidebar');
        matchHeight02.find('.widget').matchHeight();
    }

    if ( jQuery('.kopa__news.style--02').length ) {
        var matchHeight03 = jQuery('.kopa__news.style--02');
        matchHeight03.find('.matchHeight').matchHeight();
    }

    if ( jQuery('.kopa__bottomSidebar').length ) {
        var matchHeight04 = jQuery('.kopa__bottomSidebar');
        matchHeight04.find('.col-xs-12').matchHeight();
    }

    if ( jQuery('.kopa__service.style--07').length ) {
        var matchHeight05 = jQuery('.kopa__service.style--07');
        matchHeight05.find('.kopa__service__list').matchHeight();
    }
});

function dropDown(myClass) {
    var classInput = jQuery(myClass);

    classInput.find('.active').on('click', function() {
        classInput.find('ul').toggleClass('active');
    });

    jQuery(document).on('mouseup', function (e) {
        var kopaContainer = myClass;

        if (!kopaContainer.is(e.target) && kopaContainer.has(e.target).length === 0) {
            kopaContainer.find('ul').removeClass('active');
        }
    });
}

function heroSlider() {
    var slidesWrapper = jQuery('.cd-hero-slider');

    //check if a .cd-hero-slider exists in the DOM 
    if ( slidesWrapper.length > 0 ) {
        var primaryNav = jQuery('.cd-primary-nav'),
            sliderNav = jQuery('.cd-slider-nav'),
            navigationMarker = jQuery('.cd-marker'),
            slidesNumber = slidesWrapper.children('li').length,
            visibleSlidePosition = 0,
            autoPlayId,
            autoPlayDelay = 5000;

        //upload videos (if not on mobile devices)
        uploadVideo(slidesWrapper);

        //autoplay slider
        setAutoplay(slidesWrapper, slidesNumber, autoPlayDelay);

        //on mobile - open/close primary navigation clicking/tapping the menu icon
        primaryNav.on('click', function(event){
            if(jQuery(event.target).is('.cd-primary-nav')) jQuery(this).children('ul').toggleClass('is-visible');
        });
        
        //change visible slide
        sliderNav.on('click', 'li', function(event){
            event.preventDefault();
            var selectedItem = jQuery(this);
            if(!selectedItem.hasClass('selected')) {
                // if it's not already selected
                var selectedPosition = selectedItem.index(),
                    activePosition = slidesWrapper.find('li.selected').index();
                
                if( activePosition < selectedPosition) {
                    nextSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, selectedPosition);
                } else {
                    prevSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, selectedPosition);
                }

                //this is used for the autoplay
                visibleSlidePosition = selectedPosition;

                updateSliderNavigation(sliderNav, selectedPosition);
                updateNavigationMarker(navigationMarker, selectedPosition+1);
                //reset autoplay
                setAutoplay(slidesWrapper, slidesNumber, autoPlayDelay);
            }
        });
    }

    function nextSlide(visibleSlide, container, pagination, n){
        visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
            visibleSlide.removeClass('is-moving');
        });

        container.children('li').eq(n).addClass('selected from-right').prevAll().addClass('move-left');
        checkVideo(visibleSlide, container, n);
    }

    function prevSlide(visibleSlide, container, pagination, n){
        visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
            visibleSlide.removeClass('is-moving');
        });

        container.children('li').eq(n).addClass('selected from-left').removeClass('move-left').nextAll().removeClass('move-left');
        checkVideo(visibleSlide, container, n);
    }

    function updateSliderNavigation(pagination, n) {
        var navigationDot = pagination.find('.selected');
        navigationDot.removeClass('selected');
        pagination.find('li').eq(n).addClass('selected');
    }

    function setAutoplay(wrapper, length, delay) {
        if(wrapper.hasClass('autoplay')) {
            clearInterval(autoPlayId);
            autoPlayId = window.setInterval(function(){autoplaySlider(length)}, delay);
        }
    }

    function autoplaySlider(length) {
        if( visibleSlidePosition < length - 1) {
            nextSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, visibleSlidePosition + 1);
            visibleSlidePosition +=1;
        } else {
            prevSlide(slidesWrapper.find('.selected'), slidesWrapper, sliderNav, 0);
            visibleSlidePosition = 0;
        }
        updateNavigationMarker(navigationMarker, visibleSlidePosition+1);
        updateSliderNavigation(sliderNav, visibleSlidePosition);
    }

    function uploadVideo(container) {
        container.find('.cd-bg-video-wrapper').each(function(){
            var videoWrapper = jQuery(this);
            if( videoWrapper.is(':visible') ) {
                // if visible - we are not on a mobile device 
                var videoUrl = videoWrapper.data('video'),
                    video = jQuery('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
                video.appendTo(videoWrapper);
                // play video if first slide
                if(videoWrapper.parent('.cd-bg-video.selected').length > 0) video.get(0).play();
            }
        });
    }

    function checkVideo(hiddenSlide, container, n) {
        //check if a video outside the viewport is playing - if yes, pause it
        var hiddenVideo = hiddenSlide.find('video');
        if( hiddenVideo.length > 0 ) hiddenVideo.get(0).pause();

        //check if the select slide contains a video element - if yes, play the video
        var visibleVideo = container.children('li').eq(n).find('video');
        if( visibleVideo.length > 0 ) visibleVideo.get(0).play();
    }

    function updateNavigationMarker(marker, n) {
        marker.removeClassPrefix('item').addClass('item-'+n);
    }

    jQuery.fn.removeClassPrefix = function(prefix) {
        //remove all classes starting with 'prefix'
        this.each(function(i, el) {
            var classes = el.className.split(" ").filter(function(c) {
                return c.lastIndexOf(prefix, 0) !== 0;
            });
            el.className = $.trim(classes.join(" "));
        });
        return this;
    };
}

function padding(parent, child01, child02) {
    var widthPage      = jQuery(window).width(),
        widthContainer = jQuery('.container').width(),
        widthResult    = (widthPage - widthContainer) / 2,
        titleService   = jQuery(parent).find(child01),
        contentService = jQuery(parent).find(child02);

    titleService.css('padding-left', widthResult + 'px');
    contentService.css('padding-right', widthResult + 'px');
}

function padding2(element) {
    var widthPage      = jQuery(window).width(),
        widthContainer = jQuery('.container').width(),
        widthResult    = (widthPage - widthContainer) / 2;

    jQuery(element).css('padding-left', widthResult + 'px');
}