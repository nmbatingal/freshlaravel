var Script = function () {

// custom scrollbar
    $('html').niceScroll({
        styler: 'fb', 
        cursorcolor: '#8f8f8f', 
        cursorwidth: '8', 
        cursorborderradius: '10px', 
        background: '#404040', 
        spacebarenabled:false,  
        cursorborder: '', 
        zindex: '1000'
    });

    $('.hide-alert-panel').delay(5000).hide("slow");

    $( '.form' ).validate( {
        errorPlacement: function ( error, element ) {
            $(element).parents('.form-group').addClass('has-error');
        },
        success: function ( label, element ) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).removeClass( "has-success has-error" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            //$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        }
    } );
    
}();