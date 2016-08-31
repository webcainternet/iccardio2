(function ($) {
    "use strict";

    CherryJsCore.utilites.namespace('theme_script');
    CherryJsCore.theme_script = {
        init: function () {
            var self = this;

            // Document ready event check
            if (CherryJsCore.status.is_ready) {
                self.document_ready_render(self);
            } else {
                CherryJsCore.variable.$document.on('ready', self.document_ready_render(self));
            }

            // Windows load event check
            if (CherryJsCore.status.on_load) {
                self.window_load_render(self);
            } else {
                CherryJsCore.variable.$window.on('load', self.window_load_render(self));
            }
        },

        document_ready_render: function (self) {
            var self = self;

            self.smart_slider_init(self);
            self.swiper_carousel_init(self);
            self.post_formats_custom_init(self);
            self.navbar_init(self);
            self.subscribe_init(self);
            self.search_trigger(self);
            self.main_menu( self, $( '.main-navigation' ) );
            self.to_top_init(self);
            self.mobileMenuDropdown( self );
        },

        window_load_render: function ( self ) {
            var self = self;
            self.page_preloader_init( self );
        },

        smart_slider_init: function (self) {
            $('.madeleine-smartslider').each(function () {
                var slider = $(this),
                    sliderId = slider.data('id'),
                    sliderWidth = slider.data('width'),
                    sliderHeight = slider.data('height'),
                    sliderOrientation = slider.data('orientation'),
                    slideDistance = slider.data('slide-distance'),
                    slideDuration = slider.data('slide-duration'),
                    sliderFade = slider.data('slide-fade'),
                    sliderNavigation = slider.data('navigation'),
                    sliderFadeNavigation = slider.data('fade-navigation'),
                    sliderPagination = slider.data('pagination'),
                    sliderAutoplay = slider.data('autoplay'),
                    sliderFullScreen = slider.data('fullscreen'),
                    sliderShuffle = slider.data('shuffle'),
                    sliderLoop = slider.data('loop'),
                    sliderThumbnailsArrows = slider.data('thumbnails-arrows'),
                    sliderThumbnailsPosition = slider.data('thumbnails-position'),
                    sliderThumbnailsWidth = slider.data('thumbnails-width'),
                    sliderThumbnailsHeight = slider.data('thumbnails-height');

                if ($('.madeleine-smartslider__slides', '#' + sliderId).length > 0) {
                    $('#' + sliderId).sliderPro({
                        width: sliderWidth,
                        height: sliderHeight,
                        orientation: sliderOrientation,
                        slideDistance: slideDistance,
                        slideAnimationDuration: slideDuration,
                        fade: sliderFade,
                        arrows: sliderNavigation,
                        fadeArrows: sliderFadeNavigation,
                        buttons: sliderPagination,
                        autoplay: sliderAutoplay,
                        fullScreen: sliderFullScreen,
                        shuffle: sliderShuffle,
                        loop: sliderLoop,
                        waitForLayers: false,
                        thumbnailArrows: sliderThumbnailsArrows,
                        thumbnailsPosition: sliderThumbnailsPosition,
                        thumbnailWidth: sliderThumbnailsWidth,
                        thumbnailHeight: sliderThumbnailsHeight,
                        init: function () {
                            $(this).resize();
                        },
                        sliderResize: function (event) {
                            var thisSlider = $('#' + sliderId),
                                slides = $('.sp-slide', thisSlider);

                            slides.each(function () {

                                if ($('.sp-title a', this).width() > $(this).width()) {
                                    $(this).addClass('text-wrapped');
                                } else {
                                    $(this).removeClass('text-wrapped');
                                }

                            });
                        },
                        breakpoints: {
                            992: {
                                height: parseFloat(sliderHeight) * 0.75,
                            },
                            768: {
                                height: parseFloat(sliderHeight) * 0.5
                            }
                        }
                    });
                }
            });//each end
        },

        swiper_carousel_init: function (self) {

            // Enable swiper carousels
            jQuery('.madeleine-carousel').each(function () {
                var swiper = null,
                    uniqId = jQuery(this).data('uniq-id'),
                    slidesPerView = parseFloat(jQuery(this).data('slides-per-view')),
                    slidesPerGroup = parseFloat(jQuery(this).data('slides-per-group')),
                    slidesPerColumn = parseFloat(jQuery(this).data('slides-per-column')),
                    spaceBetweenSlides = parseFloat(jQuery(this).data('space-between-slides')),
                    durationSpeed = parseFloat(jQuery(this).data('duration-speed')),
                    swiperLoop = jQuery(this).data('swiper-loop'),
                    freeMode = jQuery(this).data('free-mode'),
                    grabCursor = jQuery(this).data('grab-cursor'),
                    mouseWheel = jQuery(this).data('mouse-wheel');

                var swiper = new Swiper('#' + uniqId, {
                        slidesPerView: slidesPerView,
                        slidesPerGroup: slidesPerGroup,
                        slidesPerColumn: slidesPerColumn,
                        spaceBetween: spaceBetweenSlides,
                        speed: durationSpeed,
                        loop: swiperLoop,
                        freeMode: freeMode,
                        grabCursor: grabCursor,
                        mousewheelControl: mouseWheel,
                        paginationClickable: true,
                        nextButton: '#' + uniqId + '-next',
                        prevButton: '#' + uniqId + '-prev',
                        pagination: '#' + uniqId + '-pagination',
                        onInit: function () {
                            $('#' + uniqId + '-next').css({'display': 'block'});
                            $('#' + uniqId + '-prev').css({'display': 'block'});
                        },
                        breakpoints: {
                            1200: {
                                slidesPerView: Math.floor(slidesPerView * 0.75),
                                spaceBetween: Math.floor(spaceBetweenSlides * 0.75)
                            },
                            992: {
                                slidesPerView: Math.floor(slidesPerView * 0.5),
                                spaceBetween: Math.floor(spaceBetweenSlides * 0.5)
                            },
                            769: {
                                slidesPerView: Math.floor(slidesPerView * 0.25)
                            },
                        }
                    }
                );
            });
        },

        post_formats_custom_init: function (self) {
            CherryJsCore.variable.$document.on('cherry-post-formats-custom-init', function (event) {

                if ('slider' !== event.object) {
                    return;
                }

                var uniqId = '#' + event.item.attr('id'),
                    swiper = new Swiper(uniqId, {
                        pagination: uniqId + ' .swiper-pagination',
                        paginationClickable: true,
                        nextButton: uniqId + ' .swiper-button-next',
                        prevButton: uniqId + ' .swiper-button-prev',
                        spaceBetween: 30,
                        onInit: function () {
                            $(uniqId + ' .swiper-button-next').css({'display': 'block'});
                            $(uniqId + ' .swiper-button-prev').css({'display': 'block'});
                        },
                    });

                event.item.data('initalized', true);
            });

            var items = [];

            $('.mini-gallery .post-thumbnail__link').on('click', function (event) {
                event.preventDefault();

                $(this).parents('.mini-gallery').find('.post-gallery__slides > a[href]').each(function () {
                    items.push({
                        src: $(this).attr('href'),
                        type: 'image'
                    });
                });

                $.magnificPopup.open({
                    items: items,
                    gallery: {
                        enabled: true
                    }
                });
            });
        },

        navbar_init: function (self) {

            $(window).load(function () {

                var $navbar = $('.site-menu');

                if (!$.isFunction(jQuery.fn.stickUp) || !$navbar.length) {
                    return !1;
                }

                if ($('#wpadminbar').length) {
                    $navbar.addClass('has-bar');
                }

                $navbar.stickUp({
                    correctionSelector: '#wpadminbar',
                    listenSelector: '.listenSelector',
                    pseudo: true,
                    active: true
                });
                CherryJsCore.variable.$document.trigger('scroll.stickUp');
            });
        },

        search_trigger: function (self) {

            var toggle = $(".search__toggle"),
                container = $(".site-menu");

            function stopPropagation(event){
                event.stopPropagation();
            }

            toggle.on("click", function () {
                container.toggleClass("srch-on");
            }).on('click touchstart touchend', stopPropagation);


            $(document).click(function (event) {
                if ($(event.target).closest(toggle).length || $(event.target).closest(container).length)
                    return;

                if (container.hasClass("srch-on"))
                    container.removeClass("srch-on");

                event.stopPropagation();
            });

        },

        subscribe_init: function (self) {
            CherryJsCore.variable.$document.on('click', '.subscribe-block__submit', function (event) {

                event.preventDefault();

                var $this = $(this),
                    form = $this.parents('form'),
                    nonce = form.find('input[name="madeleine_subscribe"]').val(),
                    mail_input = form.find('input[name="subscribe-mail"]'),
                    mail = mail_input.val(),
                    error = form.find('.subscribe-block__error'),
                    success = form.find('.subscribe-block__success'),
                    hidden = 'hidden';

                if ('' == mail) {
                    mail_input.addClass('error');
                    return !1;
                }

                if ($this.hasClass('processing')) {
                    return !1;
                }

                $this.addClass('processing');
                error.empty();

                if (!error.hasClass(hidden)) {
                    error.addClass(hidden);
                }

                if (!success.hasClass(hidden)) {
                    success.addClass(hidden);
                }

                $.ajax({
                    url: madeleine.ajaxurl,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        action: 'madeleine_subscribe',
                        mail: mail,
                        nonce: nonce
                    },
                    error: function () {
                        $this.removeClass('processing');
                    }
                }).done(function (response) {

                    $this.removeClass('processing');

                    if (true === response.success) {
                        success.removeClass(hidden);
                        mail_input.val('');
                        return 1;
                    }

                    error.removeClass(hidden).html(response.data.message);
                    return !1;

                });

            })
        },

        main_menu: function ( self, target ) {

            var menu = target,
                duration_timeout,
                closeSubs,
                hideSub,
                showSub,
                init,
                moreButtonText = '&middot;&middot;&middot;';

            if ( 'undefined' !== typeof madeleine &&
                'undefined' !== typeof madeleine.labels &&
                'undefined' !== typeof madeleine.labels[ 'hidden_menu_items_title' ] &&
                '' !== madeleine.labels.hidden_menu_items_title ) {
                moreButtonText = madeleine.labels.hidden_menu_items_title;
            }

            // menu.superGuacamole( {
            //     threshold: 768, // Minimal menu width, when this plugin activates
            //     minChildren: 3, // Minimal visible children count
            //     childrenFilter: '.menu-item', // Child elements selector
            //     menuTitle: moreButtonText, // Menu title
            //     menuUrl: '#',
            //     templates: {
            //         menu: '<li class="%1$s"><a href="%2$s">%3$s</a>%4$s</li>',
            //         child_wrap: '<ul class="%1$s">%2$s</ul>',
            //         child: '<li class="%1$s"><a href="%2$s">%3$s</a></li>'
            //     }
            // } );

            closeSubs = function() {
                $( '.menu-hover > a', menu ).each(
                    function() {
                        hideSub( $(this) );
                    }
                );
            };

            hideSub = function( anchor ) {

                anchor.parent().removeData( 'index' ).removeClass( 'menu-hover' ).triggerHandler( 'close_menu' );

                anchor.siblings('ul').addClass('in-transition');

                clearTimeout( duration_timeout );
                duration_timeout = setTimeout(
                    function() {
                        anchor.siblings('ul').removeClass( 'in-transition' );
                    },
                    200
                );
            };

            showSub = function( anchor ) {

                // all open children of open siblings
                var item = anchor.parent();

                item
                    .siblings()
                    .find( '.menu-hover' )
                    .addBack( '.menu-hover' )
                    .children( 'a' )
                    .each(function() {
                        hideSub( $( this ), true );
                    });

                item.addClass( 'menu-hover' ).triggerHandler( 'open_menu' );
            };

            init = function() {
                var $mainNavigation = $( '.main-navigation' ),
                    $mainMenu = $( 'ul.menu', $mainNavigation ),
                    $menuToggle = $( '.menu-toggle', $mainNavigation ),
                    $liWithChildren = $( 'li.menu-item-has-children, li.page_item_has_children', menu ),
                    $self;

                $liWithChildren.hoverIntent( {
                    over   : function() {
                        showSub( $( this ).children( 'a' ) );
                    },
                    out    : function() {
                        if ( $( this ).hasClass( 'menu-hover' ) ) {
                            hideSub( $( this ).children( 'a' ) );
                        }
                    },
                    timeout: 300
                } );

                var $parentNode,
                    $self,
                    index = -1;

                /**
                 * Double click on menu item
                 * @access private
                 */
                function doubleClickMenu( $jqEvent ) {
                    $self = $(this);

                    if ( $self.index() !== parseInt( $parentNode.data( 'index' ), 10 ) ) {
                        $jqEvent.preventDefault();
                    }

                    $parentNode.data( 'index', $self.index() );
                }

                // Check if touch events supported
                if ( 'ontouchend' in window ) {

                    // Attach event listener for double click
                    $mainNavigation.find( '#main-menu li[class*="children"] > a' ).on( 'click', doubleClickMenu );

                    // Reset index on touchend event
                    CherryJsCore.variable.$document.on( 'touchend', function( $jqEvent ) {
                        $parentNode = $( $jqEvent.target ).parent();

                        if ( $parentNode.hasClass( 'menu-hover' ) === false ) {
                            closeSubs();

                            index = $parentNode.data( 'index' );

                            if ( index ) {
                                $parentNode.data( 'index', parseInt( index, 10 ) - 1 );
                            }
                        }
                    } );
                }

                $menuToggle.on( 'click', function(){
                    $mainNavigation.toggleClass( 'toggled' );
                });
            };

            init();
        },

        mobileMenuDropdown: function () {
            var $btnToggle = $('.main-navigation .menu-toggle'),
                $itemHasChildren = $('.main-navigation .menu li.menu-item-has-children'),
                $mobileNavigation = $('.main-navigation .menu');

            $itemHasChildren.prepend('<span class="sub-menu-toggle"></span>');

            var $subMenuToggle = $('.sub-menu-toggle');

            $subMenuToggle.on( 'click', function(){
                $(this).toggleClass( 'active' );
                $(this).parent().toggleClass( 'sub-menu-open' );
            });

            $btnToggle.on( 'click', function(){
                $mobileNavigation.toggleClass( 'active' );

                if( $subMenuToggle.hasClass('active')){
                    $subMenuToggle.removeClass('active');
                    $itemHasChildren.removeClass('sub-menu-open');
                }
            });
        },

        page_preloader_init: function ( self ) {

            if ( $( '.page-preloader-cover' )[0] ) {
                $( '.page-preloader-cover' ).delay( 500 ).fadeTo( 500, 0, function() {
                    $( this ).remove();
                });
            }
        },

        to_top_init: function (self) {
            if ($.isFunction(jQuery.fn.UItoTop)) {
                $().UItoTop({
                    text: madeleine.labels.totop_button,
                    scrollSpeed: 600
                });
            }
        }
    }
    CherryJsCore.theme_script.init();
}(jQuery));
