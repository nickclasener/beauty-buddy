/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// Slow loading big pages
// Turbolinks.start();
// require('jquery');

require('./bootstrap');

import {Application} from "stimulus";
import {definitionsFromContext} from "stimulus/webpack-helpers";

const application = Application.start();
const context = require.context("./controllers", true, /\.js$/);
application.load(definitionsFromContext(context));

Turbolinks.start();

