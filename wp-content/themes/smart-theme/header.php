<?php
/**
 * The header template
 *
 * @package SmartElectronics
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e( 'Skip to content', 'smart-electronics' ); ?>
    </a>

    <!-- Top Bar -->
    <div class="top-bar bg-smart-dark text-white py-2">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center text-sm">
                <div class="top-bar-left">
                    <span><?php esc_html_e( 'G5 Guarantee: Genuine Product, Price, Service, Care, Passion', 'smart-electronics' ); ?></span>
                </div>
                <div class="top-bar-right flex gap-4">
                    <a href="tel:+8801234567890" class="hover:text-smart-secondary">
                        <i class="fas fa-phone"></i> <?php esc_html_e( 'Call: +880 1234 567890', 'smart-electronics' ); ?>
                    </a>
                    <?php if ( is_user_logged_in() ) : ?>
                        <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">
                            <?php esc_html_e( 'Logout', 'smart-electronics' ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
                            <?php esc_html_e( 'Login / Register', 'smart-electronics' ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header id="masthead" class="site-header bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="header-inner flex justify-between items-center py-4">
                
                <!-- Logo -->
                <div class="site-branding">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl font-bold text-smart-primary">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Primary Navigation -->
                <nav id="site-navigation" class="main-navigation hidden lg:block">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex gap-6',
                        'container'      => false,
                    ) );
                    ?>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions flex items-center gap-4">
                    <!-- Search -->
                    <button class="search-toggle" aria-label="<?php esc_attr_e( 'Search', 'smart-electronics' ); ?>">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Cart -->
                    <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon relative">
                            <i class="fas fa-shopping-cart"></i>
                            <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
                                <span class="cart-count absolute -top-2 -right-2 bg-smart-secondary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle lg:hidden" aria-label="<?php esc_attr_e( 'Menu', 'smart-electronics' ); ?>">
                        <span class="hamburger"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu lg:hidden">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'mobile',
                'menu_class'     => 'mobile-menu-list',
                'container'      => 'div',
                'container_class' => 'container mx-auto px-4 py-4',
            ) );
            ?>
        </div>

        <!-- Search Modal -->
        <div class="search-modal hidden">
            <div class="container mx-auto px-4 py-8">
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>

    <main id="primary" class="site-main">