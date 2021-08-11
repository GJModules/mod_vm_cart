<?php // no direct access
defined('_JEXEC') or die('Restricted access');






//dump ($cart,'mod cart');
// Ajax is displayed in vm_cart_products
// ALL THE DISPLAY IS Done by Ajax using "hiddencontainer" ?>

<!-- Virtuemart 2 Ajax Card -->
<div class="vmCartModule <?php echo $params->get('moduleclass_sfx'); ?> dropdown" id="vmCartModule">
	<a href="index.php?option=com_virtuemart&view=cart" rel="nofollow" data-toggle="dropdown">

	<i class="fa fa-shopping-basket cart-icon" aria-hidden="true"></i>
    <div class="total_products label label-danger">
    <?php
        echo  $data->totalProduct;
    ?>
    </div>
	</a>
	<div class="dropdown-menu dropdown-menu-right">
	    <div class="cart_content">

	    <div id="hiddencontainer" style=" display: none; ">
	        <div class="vmcontainer">
	            <div class="product_row">
                    <span class="image"></span>
                    <div class="product_name_block">
                        <span class="quantity">
                            <?php /*echo  $product['quantity'] */?>
                        </span>&nbsp;x&nbsp;
                        <span class="product_name">
                           <?php /*echo  $product['product_name']*/ ?>
                        </span>
                    </div>
                    <div class="product-info">
                        <span class="subtotal_with_tax">
                        <?php /*echo $product['subtotal_with_tax']*/ ?>
                        </span>
                    </div>
	            <div class="customProductData"></div>
	            <div class="clearfix"></div>
	            </div>
	        </div>
	    </div>
	    <div class="vm_cart_products">
	        <div class="vmcontainer">
	        <?php
	            foreach ($data->products as $product){
	                ?><div class="product_row">
                            <span class="image"><?php echo $product['image']; ?></span>
	                       <div class="product_name_block">
                                <span class="quantity"><?php echo  $product['quantity'] ?></span>&nbsp;x&nbsp;
                                <span class="product_name">
                                   <?php echo  $product['product_name'] ?>
                                </span>
                            </div>
	                        <div class="product-info">
	                            <span class="subtotal_with_tax">
	                            <?php echo $product['subtotal_with_tax'] ?>
	                            </span>
	                        </div>
	                        <?php if ( !empty($product['customProductData']) ) { ?>
	                        <div class="customProductData"><?php echo $product['customProductData'] ?></div>
	                        <?php } ?>
	                        <div class="clearfix"></div>
	            </div>
	        <?php }
	        ?>
	        </div>
	    </div>
	    <div class="total">
	        <?php if($data->totalProduct > 0){
	            echo $data->billTotal;
	        } ?>
	    </div>

	    <div class="cart_info">
	    <?php
	    if($data->totalProduct < 1){
	    echo vmText::_('MOD_VM_CART_EMPTY');
	    }
	     ?>
	    </div>
	    <div class="show_cart">
	    <?php if ($data->totalProduct) echo  $data->cart_show; ?>
	    </div>
	    <div style="clear:both;"></div>
	    <div class="payments_signin_button" ></div>
	    <noscript>
	    <?php echo vmText::_('MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT') ?>
	    </noscript>
	    </div>
	</div>
</div>
<script>
jQuery(document).ready(function($){
    $('#vmCartModule .show_cart a').addClass('btn btn-primary btn-sm');
    $('.product_row .image img').addClass('img-rounded');
    $('input[name="addtocart"]').click(function(){
       setTimeout(function(){
          $('#vmCartModule .show_cart a').addClass('btn btn-primary btn-sm');
           $('.product_row .image img').addClass('img-rounded');
       },1000);
    });
    $('#vmCartModule').click(function(){
        $('#vmCartModule .show_cart a').addClass('btn btn-primary btn-sm');
        $('.product_row .image img').addClass('img-rounded');
    });
});
</script>
