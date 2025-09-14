<?php
?>
    <footer class="site-footer">
        <div class="footer-content container">
            <div class="footer-wrapper">
                <div class="menu-container">
                    <?php if (is_active_sidebar('footer-menu-1')) {
                        dynamic_sidebar('footer-menu-1');
                    } ?>
                    <?php if (is_active_sidebar('footer-menu-2')) {
                        dynamic_sidebar('footer-menu-2');
                    } ?>
                </div>

                <?php if (is_active_sidebar('footer-menu-3')) {
                    dynamic_sidebar('footer-menu-3');
                } ?>
            </div>

            <div class="footer-description">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
