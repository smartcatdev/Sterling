 jQuery( document ).ready( function( $ ) { 
 

    if ( $( window ).width() > 600 ){
        $( "#top-bar" ).sticky({ topSpacing:70 });
    } else {
        $( "#top-bar" ).unstick();
    }

    $( window ).resize(function() {        
        if ( $( window ).width() > 600 ){
            $( "#top-bar" ).sticky({ topSpacing:70 });
        } else {
            $( "#top-bar" ).unstick();
        }
    });
    
    var opacityCtr = 0;
    
    $( ".menu-link" ).on( 'click', function (){
        
        if ( opacityCtr % 2 ) {
            $( "#mobile-overlay" ).fadeOut(300); 
        } else {
            $( "#mobile-overlay" ).fadeIn(200); 
        }
        opacityCtr++;
        
    });
    
    $( ".menu-link" ).on( 'touchend', function (){
        
        if ( opacityCtr % 2 ) {
            $( "#mobile-overlay" ).fadeOut(300); 
        } else {
            $( "#mobile-overlay" ).delay(200).fadeIn(200);  
        }
        opacityCtr++;
        
    });

    
    $( ".search-btn" ).on( 'click', function(){
        $( "#search-menu" ).fadeIn(300).css( "display", "table" );
//        $( "#main-navigation" ).css( "z-index", "2" );
    });
    
    $( "#close-search-btn" ).on( 'click', function(){
        $( "#search-menu" ).fadeOut(300);
        $( "#main-navigation" ).css( "z-index", "0" );
    });
    
    $( "#scrolltotop-btn" ).on( 'click', function(){
        $( 'html, body' ).animate({ scrollTop: 0 }, 'fast' );
    });         
    
    $( '.menu-link' ).bigSlide({
        menu: ( '#menu' ),
        side: 'right'
    });
    
 });

