//Javascript file
$('.faq-question').click(function(){
    
    $('.faq-question').removeClass('active-faq');
    
    $('.faq-answer').hide();
    
    var id = $(this).attr('id').replace(/question-/, '');
    
    $('#answer-'+id).show();
    
    $('#question-'+id).addClass('active-faq');
});