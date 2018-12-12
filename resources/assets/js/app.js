
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(function () {
    $('.ticket-number').on('click', function () {
        let $has_ticket = $('.has-ticket'),
            $no_ticket = $('.no-ticket'),
            $confirm_button = $('#book-ticket');

        $('.ticket-number').removeClass('active');
        $(this).addClass('active');
        let number = $(this).data('number');
        $('#ticket-number-input').val(number);
        $has_ticket.html('');

        $confirm_button.attr('disabled', true);

        let authorization = $('input[name="authorization"]').val();

        $.ajax({
            url: "/api/seatNumbers",
            type: 'GET',
            data: {
                number: number,
                site_id: 1
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", "Bearer  " + authorization);
            },
            success: function(result) {
                if (result.length) {
                    $no_ticket.addClass('hidden');
                    $has_ticket.removeClass('hidden');
                    $confirm_button.attr('disabled', false);
                    $('input[name="seat"]').val(result);

                    $.each(result, function(key, val) {
                        let $ticket = $('<span class="ticket"></span>').html(val);
                        $has_ticket.append($ticket);
                    });

                    $confirm_button.attr('disabled', false);

                } else {
                    $confirm_button.attr('disabled', true);
                }
            },
            error: function() {

            }
        });
    });
});