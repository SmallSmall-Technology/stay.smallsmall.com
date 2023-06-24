//Javascript file
$('.faq-question').click(function(){
    
    $('.faq-answer').hide();
    
    var id = $(this).attr('id').replace(/question-/, '');
    
    $('#answer-'+id).show();
});