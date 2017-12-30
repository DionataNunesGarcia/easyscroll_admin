$(window).load(function () {

    // Estilo de campo de formulário
    $('input[type=text], input[type=email],select,input[type=password],input[type=number], textarea,input[type=file]').addClass('form-control');
    $('label').addClass('control-label');
    $('input[type=checkbox]').addClass('checkbox');
    $('input[type=radio]').addClass('radio');

    // Estilo de botoes
    $('input[type=button],button,button[type=submit],button[type=reset]').addClass('btn btn-primary');
    $('.content .box-footer a').addClass('btn btn-primary');
    
});
