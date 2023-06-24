//Javascript file
$('.location-handler').click(function(){

    //$('.overlay-holders').hide();

    if($('.the-locations').is(':hidden')){

        $('.overlay-holders').hide();

        $('.the-locations').show();

    }else{
        
        $('.the-locations').hide();

    }    
});

$('.location-item').click(function(){

    var location = $(this).attr('id');

    $('.location-val').val(location);

    $('.location-label').addClass('filled');

    $('#location-display').html(location);

    $('.the-locations').hide();

});

$('.guest-handler').click(function(){

    //$('.overlay-holders').hide();

    if($('.the-guests').is(':hidden')){

        $('.overlay-holders').hide();

        $('.the-guests').show();

    }else{
        
        $('.the-guests').hide();

    }    
});
$('.checkindate').click(function(){

    $('.checkin-label').addClass('filled');

});