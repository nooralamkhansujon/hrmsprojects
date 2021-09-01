window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// window.Jquery = window.$ = require('jquery');

window.colors = {
    solid: {
      primary: '#7367F0',
      secondary: '#82868b',
      success: '#28C76F',
      info: '#00cfe8',
      warning: '#FF9F43',
      danger: '#EA5455',
      dark: '#4b4b4b',
      black: '#000',
      white: '#fff',
      body: '#f8f8f8'
    },
    light: {
      primary: '#7367F01a',
      secondary: '#82868b1a',
      success: '#28C76F1a',
      info: '#00cfe81a',
      warning: '#FF9F431a',
      danger: '#EA54551a',
      dark: '#4b4b4b1a'
    }
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
