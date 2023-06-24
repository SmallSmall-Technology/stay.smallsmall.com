//Javascript File

$('#check-in').click(function(){
    
    $('body').addClass('no-scroll');
    
    $('.checkin-overlay').css('display', 'flex');
    
});
$('.close-button').click(function(){
    
    $('body').removeClass('no-scroll');
    
    $('.checkin-overlay').css('display', 'none');
    
});