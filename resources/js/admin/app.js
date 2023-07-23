import.meta.glob([
    '../fonts/** ',
    '../fonts/boxicons/** ',
]);
import './scripts/run-jquery.js'
import './ui-modals.js';
import './vendor/helpers.js';
import './vendor/menu.js';
import './ui-popover.js';
import './ui-toasts.js';
import './config.js';
import './../../libs/popper/popper.js';
import './vendor/bootstrap.js';
import './../../libs/perfect-scrollbar/perfect-scrollbar.js';
import './main.js';

import './scripts/images-preview.js'
import './scripts/image-action.js'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
