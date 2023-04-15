//Libs
window.$ = window.jQuery = require('jquery');

//Helpers
$(document).on('click','.js-link',function (){
    location.href = $(this).find('a').attr('href');
});

$('.toggle_favorite').click((e) => {
    e.preventDefault();
    e.stopPropagation();
    fetch(`/asic/${e.target.dataset.asic_id}/favorite`).then(() => {
        $(e.target).toggleClass('favorite');
    });
});
