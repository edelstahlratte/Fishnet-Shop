<?php
/* -----------------------------------------------------------------------------------------
   $Id: moneybookers_sft.php 3598 2012-09-06 06:22:36Z dokuman $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TEXT_TITLE', 'Sofortueberweisung');
$_var = 'Sofortueberweisung via Moneybookers';
if (_PAYMENT_MONEYBOOKERS_EMAILID=='') {
  $_var.='<br /><br /><b><font color="red">Please setup moneybookers.com configuration first! (Adv. Configuration -> Partner -> Moneybookers.com)!</font></b>';
}
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TEXT_DESCRIPTION', $_var);
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_NOCURRENCY_ERROR', 'There\'s no Moneybookers accepted currency installed!');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ERRORTEXT1', 'payment_error=');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TEXT_INFO','');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ERRORTEXT2', '&error=There was an error during your payment at Moneybookers!');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ORDER_TEXT', 'Date of the order: ');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TEXT_ERROR', 'Payment error!');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_CONFIRMATION_TEXT', 'Thank you for your order!');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TRANSACTION_FAILED_TEXT', 'Your payment transaction at Moneybookers has failed. Please try again, or select an other payment option!');

define('MODULE_PAYMENT_MONEYBOOKERS_SFT_STATUS_TITLE', 'Enable Moneybookers');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_STATUS_DESC', 'Do you want to accept payments through Moneybookers?');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_SORT_ORDER_TITLE', 'Sort order of display.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_SORT_ORDER_DESC', 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ZONE_TITLE', 'Payment Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ZONE_DESC', 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');

// BOF - Hendrik - 2010-08-11 - exlusion config for shipping modules
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_NEG_SHIPPING_TITLE', 'Exclusion in case of shipping');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_NEG_SHIPPING_DESC', 'deactivate this payment if one of these shippingtypes are selected (list separated by comma)');
// EOF - Hendrik - 2010-08-11 - exlusion config for shipping modules
?>