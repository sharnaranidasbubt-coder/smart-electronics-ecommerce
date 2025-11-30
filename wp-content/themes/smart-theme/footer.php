<?php
/**
 * The footer template
 *
 * @package SmartElectronics
 */
?>

    </main><!-- #primary -->

    <!-- Footer -->
    <footer id="colophon" class="site-footer bg-smart-dark text-white">
        
        <!-- Footer Widgets -->
        <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || 
                   is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
            <div class="footer-widgets py-12">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
                            <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
                                <div class="footer-column">
                                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Footer Bottom -->
        <div class="footer-bottom border-t border-gray-700 py-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="footer-copyright text-sm text-gray-400">
                        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'smart-electronics' ); ?></p>
                        <p><?php esc_html_e( 'Official Sony Distributor in Bangladesh', 'smart-electronics' ); ?></p>
                    </div>

                    <!-- Footer Menu -->
                    <?php if ( has_nav_menu( 'footer' ) ) : ?>
                        <nav class="footer-navigation">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'flex gap-4 text-sm',
                                'container'      => false,
                                'depth'          => 1,
                            ) );
                            ?>
                        </nav>
                    <?php endif; ?>

                    <!-- Social Media -->
                    <div class="footer-social flex gap-4">
                        <a href="#" class="text-white hover:text-smart-secondary transition" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white hover:text-smart-secondary transition" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white hover:text-smart-secondary transition" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="text-white hover:text-smart-secondary transition" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scroll-to-top" class="fixed bottom-8 right-8 bg-smart-primary text-white p-4 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-smart-secondary" aria-label="<?php esc_attr_e( 'Scroll to top', 'smart-electronics' ); ?>">
        <i class="fas fa-arrow-up"></i>
    </button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>