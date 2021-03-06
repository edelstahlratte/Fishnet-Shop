<?php
require_once('mcp_service.php');
define('MODULE_PAYMENT_MCP_DEBIT_TEXT_DESCRIPTION', 'micropayment&trade; debit module');
define('MODULE_PAYMENT_MCP_DEBIT_TEXT_TITLE', 'micropayment&trade; debit<br /><img src="http://www.micropayment.de/resources/?what=img&group=dbt&show=type-h.4" />');
define('MODULE_PAYMENT_MCP_DEBIT_TEXT_TITLE_EXTERN', 'Debit');
define('MODULE_PAYMENT_MCP_DEBIT_TEXT_INFO', '
<div style="margin:10px;">
<div style="float:right;"><img src="./images/micropayment/logo_small.png" width="150"/></div><div style="float:left;">
Vos avantages:<br />
- Fournisseur de paiement certifié<br />
- Transfert de données sécurisé (128-Bit SSL)<br />
- Aucune inscription requise<br /><br />
</div>
<div style="clear:both;"></div>
Vous êtes redirigé vers micropayment&trade;. Votre commande sera traitée immédiatement après que le processus de paiement a été complété avec succès !
</div>
');

define('MODULE_PAYMENT_MCP_DEBIT_STATUS_TITLE','débit');
define('MODULE_PAYMENT_MCP_DEBIT_STATUS_DESC','Module de débit by micropayment&trade;');
define('MODULE_PAYMENT_MCP_DEBIT_MINIMUM_AMOUNT_TITLE','Montant minimum');
define('MODULE_PAYMENT_MCP_DEBIT_MINIMUM_AMOUNT_DESC','montant minimum pour ce mode de paiement');
define('MODULE_PAYMENT_MCP_DEBIT_MAXIMUM_AMOUNT_TITLE','Montant maximum');
define('MODULE_PAYMENT_MCP_DEBIT_MAXIMUM_AMOUNT_DESC','Montant maximum pour ce mode de paiement');
define('MODULE_PAYMENT_MCP_DEBIT_SORT_ORDER_TITLE','Positionnement');
define('MODULE_PAYMENT_MCP_DEBIT_SORT_ORDER_DESC','Positionnement dans la sélection du mode de paiement');
define('MODULE_PAYMENT_MCP_DEBIT_ALLOWED_TITLE','Sélection du pays');
define('MODULE_PAYMENT_MCP_DEBIT_ALLOWED_DESC','N&apos;autoriser que les commandes en provenance de ces pays (liste séparée par des virgules DE,EN).');

?>
