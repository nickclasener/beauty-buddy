/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// Slow loading big pages
// Turbolinks.start();
// require('jquery');

require('./bootstrap');
// require('jquery-ujs');
// require('infinite-scroll');


// make Infinite Scroll a jQuery plugin

import {Application} from "stimulus";
import {definitionsFromContext} from "stimulus/webpack-helpers";

const application = Application.start();
const context = require.context("./controllers", true, /\.js$/);
application.load(definitionsFromContext(context));

Turbolinks.start();

window.Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000
});
// var randomColours = ['3c6dd1', 'd13c9e', '3cd19e'];
// var currentColour = 0;
// var currentDemoColour = 0;
// $(function () {
//     // $('.add-to-list button').click(function (e) {
//     //     addLI($(e.target).parent(), false);
//     // });
//     $('.add-to-list li').each(function (index, item) {
//         console.log($(item));
//         bindNewLI($(item));
//     });
//     // setInterval(function () {
//     //     addDemoURL();
//     // }, 2000);
// });
//
// function bindNewLI(t) {
//     t.click(function (e) {
//         var target = $(e.target);
//         // if (target.hasClass('no-hide')) return;
//         target.removeClass('show');
//         setTimeout(function () {
//             target.remove();
//         }, 2000);
//     });
// }

// function addLI(container, isDemo) {
//     var newLI = $('<li>List item</li>');
//     if (!isDemo) {
//         var colour = randomColours[currentColour];
//         if (currentColour == randomColours.length - 1) {
//             currentColour = 0;
//         } else {
//             currentColour++;
//         }
//     } else {
//         var colour = randomColours[currentDemoColour];
//         if (currentDemoColour == randomColours.length - 1) {
//             currentDemoColour = 0;
//         } else {
//             currentDemoColour++;
//         }
//     }
//     newLI.css('background-color', '#' + colour);
//     bindNewLI(newLI);
//     container.find('ul').append(newLI);
//     setTimeout(function () {
//         if (!isDemo) {
//             newLI.addClass('show');
//         } else {
//             newLI.addClass('show no-hide');
//         }
//     }, 10);
// }

// function addDemoURL() {
//     var newLI = $('<li></li>');
//     addLI($('#demo'), true);
//     setTimeout(function () {
//         removeDemoItem();
//     }, 10);
// }

// function removeDemoItem() {
//     $('#demo').find('ul li:first-child').addClass('hide');
//     setTimeout(function () {
//         $('#demo').find('ul li:first-child').remove();
//     }, 2000);
// }
