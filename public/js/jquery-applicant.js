$(function () {

    $( '#add_applicant_form' ).validate( {
        rules: {
            'lastname'        : "required",
            'firstname'       : "required",
            'contact-number'  : "required",
        },
        messages: {
            'lastname'        : "Please enter your lastname",
            'firstname'       : "Please enter your firstname",
            'contact-number'  : "Please enter a valid contact number",
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {

            error.addClass( "help-block" );
            element.parents( '.form-group' ).addClass('has-error').addClass( 'has-feedback' );
            error.insertAfter( element );

            /*** GROUP INPUT LAYOUT ***/
            if ( element.parent( '.input-group' ) ) {
                error.insertAfter( element.parent( '.input-group' ) );
            } else {
                error.insertAfter( element );
            }


            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='fa fa-remove form-control-feedback'></span>" ).insertAfter( element );
            }
            
        },
        success: function ( label, element ) {

            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='fa fa-check form-control-feedback'></span>" ).insertAfter( $( element ) );
            }

        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "fa-remove" ).removeClass( "fa-check" );

        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "fa-check" ).removeClass( "fa-remove" );

        }
    } );

    //Masked Input ============================================================================================================================
    var $demoMaskedInput = $('.masked-input');

    //Date
    //$demoMaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
    $demoMaskedInput.find('.date').inputmask('yyyy-mm-dd', { placeholder: '____-__-__' });

    //Time
    //$demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:__ _m', alias: 'time12', hourFormat: '12' });
    //$demoMaskedInput.find('.time24').inputmask('hh:mm', { placeholder: '__:__ _m', alias: 'time24', hourFormat: '24' });

    //Date Time
    //$demoMaskedInput.find('.datetime').inputmask('d/m/y h:s', { placeholder: '__/__/____ __:__', alias: "datetime", hourFormat: '24' });

    //Mobile Phone Number
    //$demoMaskedInput.find('.mobile-phone-number').inputmask('+99 (999) 999-99-99', { placeholder: '+__ (___) ___-__-__' });
    $demoMaskedInput.find('.mobile-phone-number').inputmask('+99 (999) 999-9999', { placeholder: '+__ (___) ___-____' });
    
    //Phone Number
    //$demoMaskedInput.find('.phone-number').inputmask('+99 (999) 999-99-99', { placeholder: '+__ (___) ___-__-__' });

    //Dollar Money
    $demoMaskedInput.find('.money-dollar').inputmask('999,999.99', { placeholder: '___,___.__' });
    
    //Euro Money
    //$demoMaskedInput.find('.money-euro').inputmask('99,99 €', { placeholder: '__,__ €' });

    //IP Address
    //$demoMaskedInput.find('.ip').inputmask('999.999.999.999', { placeholder: '___.___.___.___' });

    //Credit Card
    //$demoMaskedInput.find('.credit-card').inputmask('9999 9999 9999 9999', { placeholder: '____ ____ ____ ____' });

    //Email
    //$demoMaskedInput.find('.email').inputmask({ alias: "email" });

    //Serial Key
    //$demoMaskedInput.find('.key').inputmask('****-****-****-****', { placeholder: '____-____-____-____' });
    //===========================================================================================================================================
});