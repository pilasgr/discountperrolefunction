// Δώσε έκπτωση 15% σε όσους χρήστες έχουν τον ρόλο custom_role
function apply_discount_for_specific_user_role($cart) {
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        if (in_array('custom_role_id_here', $user->roles)) { // Αντικαταστήστε 'custom_role_id_here' με το όνομα του συγκεκριμένου ρόλου
            foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
                $price = $cart_item['data']->get_price(); // Πάρε την τιμή του προϊόντος
                $discounted_price = $price / 1.15; // Εφαρμογή έκπτωσης 15%
                $cart_item['data']->set_price($discounted_price); // Ορισμός της νέας τιμής με έκπτωση
            }
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'apply_discount_for_specific_user_role');
