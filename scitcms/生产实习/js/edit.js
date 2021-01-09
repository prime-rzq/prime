$('#edit').click(function(){
    $('input').removeAttr('disabled');
})
$('#keep').click(function(){
    $('input').attr('disabled','disabled');
})