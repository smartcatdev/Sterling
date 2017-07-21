 jQuery( document ).ready( function( $ ) { 
 
    $("#top-bar").sticky({ topSpacing:70 });
    
    $("#search-btn").on( 'click', function(){
        $("#search-menu").css("display", "table");
    });
    $("#search-btn").on( 'click', function(){
        $("#main-navigation").css("z-index", "2");
    });
    $("#close-search-btn").on( 'click', function(){
        $("#search-menu").css("display", "none");
    });
    $("#close-search-btn").on( 'click', function(){
        $("#main-navigation").css("z-index", "0");
    });
    
    $( "#scrolltotop-btn" ).on( 'click', function(){
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });         
    
 });

