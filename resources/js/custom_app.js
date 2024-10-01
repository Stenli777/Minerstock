import Vue from 'vue';
import AdminMenu from './components/voyager/admin_menu.vue';

new Vue({
    el: '#adminmenu',
    components: {
        'admin-menu': AdminMenu,
    },
});
