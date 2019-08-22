import Raven, { configureRaven } from './lib/Raven';
import { addExternalLinks } from './menu';
import { portalId } from './constants/leadinConfig';
import { initInterframe } from './lib/Interframe';
import { startPortalIdPolling } from './api/wordpressApi';
import './handlers';
import loginThroughPopup from './utils/loginThroughPopup';
import { getAuth } from './api/hubspotPluginApi';

function main() {
  initInterframe();

  // Enable App Navigation only when viewing the plugin
  if (window.location.search.indexOf('page=leadin') !== -1) {
    if (!portalId) {
      startPortalIdPolling();
    }
  }

  jQuery(document).ready(() => {
    addExternalLinks();
    jQuery('#loginLink').click(() => {
      loginThroughPopup(() => {
        window.location.href = './admin.php?page=leadin';
      });
    });
  });

  getAuth(isAuthenticated => {
    if (isAuthenticated) {
      jQuery('#hubspot-dashboard-banner-connect').show();
    } else {
      jQuery('#hubspot-dashboard-banner-login').show();
    }
    jQuery('#disconnectedBanner').show();
  });
}

configureRaven();
Raven.context(main);
