import './style.styl';

define(['jquery'], ($)=>{


    $('.comment input[type=text], .comment input[type=email], .comment textarea').each(function(){
        
        checkForm($(this));

        $(this).focusin(function(){
            $(this).closest('p').addClass('on');
        });

        $(this).focusout(function(){
            checkForm($(this));
        });
        
    });

    $('.comment label').click(function(){
        $(this).closest('p').addClass('on');
    })

});

function checkForm(el) {
    const value = el.val();

    if(value) {
        el.closest('p').addClass('on');
    } else {
        el.closest('p').removeClass('on');
    }
}