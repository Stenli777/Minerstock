npm // require('./bootstrap');

//Libs
window.$ = window.jQuery = require('jquery');

//Helpers
$(document).on('click','.js-link',function (){
    location.href = $(this).find('a').attr('href');
});
