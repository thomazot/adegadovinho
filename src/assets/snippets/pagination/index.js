import './style.styl';

define(['jquery'], ($)=>{
    const buttonMore = $('.pagination-infinite__more');
    const textDefault = buttonMore.text();
    $('.pagination-infinite__more').click(function(){
        const pagination = $(this).closest('.pagination-infinite');
        const next = pagination.find('.next');

        buttonMore.text('Carregando...');
        buttonMore.attr('disabled', true);

        if(next.length) {
            $.get(next.attr('href'))
                .done(function(data){
                    const items = $(data).find('.main .post-list__list .post-list__item');
                    const paginationList = $(data).find('.pagination-infinite__list .pagination-infinite__item');
                    const nextCurrent = paginationList.find('.next');
                    $('.main .post-list__list').append(items);
                    $('.pagination-infinite__list').html(paginationList);

                    buttonMore.text(textDefault);
                    buttonMore.attr('disabled', false);

                    if(!nextCurrent.length) {
                        $('.pagination-infinite').hide();
                    }

                });
        } 
    });
});