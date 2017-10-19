 jQuery( document ).ready( function( $ ) { 
     
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Sticky Bar
    //__________________________________________________________________________
    
    if ( $( window ).width() > 600 ) {
        if ( $( "#wpadminbar" ).length > 0 ) {
            $( ".site-header" ).sticky({ topSpacing:32 });
        } else {
            $( ".site-header" ).sticky({ topSpacing:0 });
        }
    } else {
        $( ".site-header" ).unstick();
    }

    $( window ).resize(function() {        
        if ( $( window ).width() > 600 ) {
            if ( $( "#wpadminbar" ).length > 0 ) {
                $( ".site-header" ).sticky({ topSpacing:32 });
            } else {
                $( ".site-header" ).sticky({ topSpacing:0 });
            }
        } else {
            $( ".site-header" ).unstick();
        }
    });
    
    $( '.menu-primary-container .menu > li > ul.sub-menu' ).css({
        
        top : sterlingTheme.headerDesktopHeight/2
        
    })
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Mobile Opacity Layer
    //__________________________________________________________________________
    
    var opacityCtr = 0;
    
    $( ".menu-link" ).on( 'click', function () {
        
        // Every other click fadeOut
        if ( opacityCtr % 2 ) {
            $( "#mobile-overlay" ).fadeOut(300);
            $('html, body').css({
                overflow: 'auto'
            });
        } else {
            $( "#mobile-overlay" ).fadeIn(200);
            $('html, body').css({
                overflow: 'hidden'
            });
        }
        opacityCtr++;
        
    });
    
    $( ".menu-link" ).on( 'touchend', function () {
        
        // Every other click fadeOut
        if ( opacityCtr % 2 ) {
            $( "#mobile-overlay" ).fadeOut(300);
            $('html, body').css({
                overflow: 'auto'
            });
        } else {
            $( "#mobile-overlay" ).fadeIn(200); 
            $('html, body').css({
                overflow: 'hidden'
            });
        }
        opacityCtr++;
        
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Search Menu
    //__________________________________________________________________________
    
    $( ".search-btn" ).on( 'click', function(){
        $( "#search-menu" ).fadeIn(300).css( "display", "table" );
        $('html, body').css({
           overflow: 'hidden',
           height: '100%'
        });
    });
    
    $( ".search-btn" ).on( 'touchend', function(){
        $( "#search-menu" ).fadeIn(300).css( "display", "table" );
        $( "html, body" ).css({
           overflow: 'hidden',
           height: '100%'
        });
    });
    
    $( "#close-search-btn" ).on( 'click', function(){
        $( "#search-menu" ).fadeOut(300);
        $( "#main-navigation" ).css( "z-index", "0" );
        $( "html, body" ).css({
           overflow: 'auto',
           height: 'auto'
        });
    });
    
    $( "#close-search-btn" ).on( 'touchend', function(){
        $( "#search-menu" ).fadeOut(300);
        $( "#main-navigation" ).css( "z-index", "0" );
        $( "html, body" ).css({
           overflow: 'auto',
           height: 'auto'
        });
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Scroll To Top
    //__________________________________________________________________________  
     
    $( "#scrolltotop-btn" ).on( 'click', function(){
        $( 'html, body' ).animate({ scrollTop: 0 }, 'fast' );
    });  
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Mobile Menu - Big Slide.js
    //__________________________________________________________________________
    
    $( '.menu-link' ).bigSlide({
        menu: ( '#mobile-menu nav#menu' ),
        side: 'right'
    });

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Mobile Menu - Inject Expansion Icons
    //__________________________________________________________________________

    $('#mobile-menu ul#primary-menu > li.menu-item-has-children').prepend( '<span class="fa fa-chevron-right"></span>' );

    $( '#mobile-menu ul#primary-menu > li.menu-item-has-children' ).on( 'click', function() {
        $(this).find( 'span' ).stop().toggleClass('submenu-rotated');
        $(this).find( '> ul.sub-menu' ).stop().slideToggle( 400 );
    });
     
 });

