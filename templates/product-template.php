<div class="product-card">
    <img src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr($atts['name']); ?>" class="img-fluid">
    <h3><?php echo esc_html($atts['name']); ?></h3>
    <p>Price: $<?php echo esc_html($atts['price']); ?></p>
    <button class="btn btn-primary add-to-cart" data-id="<?php echo esc_attr($atts['id']); ?>">Add to Cart</button>
</div>