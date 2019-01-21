/*
* Free product if total cart weight is more than 1000 g.
*/
function aapc_add_product_to_cart() {
	global $woocommerce;
	
	$cart_contents_weight	= 1000;	
	if ( $woocommerce->cart->cart_contents_weight >= $cart_contents_weight ) {
		if ( ! is_admin() ) {
	        $free_product_id = 5136;  // free product_id
	        $found 		= false;
			
	        //Check if product is in the cart
	        if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
	            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
	                $_product = $values['data'];
	                if ( $_product->get_id() == $free_product_id )
	                	$found = true;	                
	            }
	            // if product not found, add it
	            if ( ! $found )
	                WC()->cart->add_to_cart( $free_product_id );
	        } else {
	            // if no products in cart, add it
	            WC()->cart->add_to_cart( $free_product_id );
	        }        
	    }
	}      
	
}
add_action( 'template_redirect', 'aapc_add_product_to_cart' );
