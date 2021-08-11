<?php
defined('_JEXEC') or  die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
/*
*Cart Ajax Module
*
* @package VirtueMart
* @subpackage modules
*
* www.virtuemart.net
*/



defined('DS') or define('DS', DIRECTORY_SEPARATOR);
if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
VmConfig::loadConfig();

VmConfig::loadJLang('mod_vm_cart', true);
VmConfig::loadJLang('com_virtuemart', true);
vmJsApi::jQuery();
//$data->billTotal = $data->billTotal;
$doc = JFactory::getDocument();

//$doc->addStyleSheet(JURI::base().'/modules/mod_vm_cart/assets/css/style.css');

/*
изображение товара
*/
$doc->addScript(JURI::base().'/modules/mod_vm_cart/assets/js/update_cart.js');

$js = '
jQuery(document).ready(function(){
    jQuery("body").live("updateVirtueMartCartModule", function(e) {
        jQuery("#vmCartModule").updateVirtueMartCartModule();
    });
});
';
vmJsApi::addJScript('vm.CartModule.UpdateModule',$js);

$jsVars  = ' jQuery(document).ready(function(){
	jQuery(".vmCartModule").productUpdate();
});' ;
//vmJsApi::addJScript('vm.CartModule.UpdateProduct',$jsVars);


//This is strange we have the whole thing again in controllers/cart.php public function viewJS()
if(!class_exists('VirtueMartCart')) require(VMPATH_SITE.DS.'helpers'.DS.'cart.php');
    /**
     * @var VirtueMartCart $cart
     */
//    $cart = VirtueMartCart::getCart(true );


    $viewName = vRequest::getString('view' , 0);
    if( $viewName == 'cart' )
    {
        $checkAutomaticPS = true;
    } else
    {
        $checkAutomaticPS = false;
    }

//    $data = $cart->prepareAjaxData(true);

    $data = new stdClass();
    $data->products = [];
    $data->totalProduct = 0;




if (!class_exists('CurrencyDisplay')) require(VMPATH_ADMIN . DS. 'helpers' . DS . 'currencydisplay.php');
$currencyDisplay = CurrencyDisplay::getInstance( );

vmJsApi::cssSite();

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$show_product_list = (bool)$params->get( 'show_product_list', 1 ); // Display the Product Price?

require(JModuleHelper::getLayoutPath('mod_vm_cart'));
echo vmJsApi::writeJS();

