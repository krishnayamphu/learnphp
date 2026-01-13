<footer>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col">
                <?php
                if (is_active_sidebar('footer-1')) {
                    dynamic_sidebar('footer-1');
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<?php wp_footer();
?>
</body>

</html>