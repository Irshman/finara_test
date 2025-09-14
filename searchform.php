<?php 
use Thm\Finara\ThemeFunctions;
?>
<form role="search" method="get" class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search__wrap">
        <input type="search" class="search__field" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search__submit">
            <?php echo ThemeFunctions::getInlineSvg('search'); ?>
        </button>
    </div>
</form>