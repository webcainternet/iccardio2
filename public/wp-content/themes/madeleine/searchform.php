<?php
/**
 * The template for displaying search form.
 *
 * @package __Tm
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <div class="search-form_input_wr">
        <label>
            <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'madeleine') ?></span>
            <input id="s" type="search" class="search-form__field"
                   placeholder="<?php echo esc_attr_x('Digite sua busca ', 'placeholder', 'madeleine') ?>"
                   value="<?php echo get_search_query() ?>" name="s"
                   title="<?php echo esc_attr_x('Search for:', 'label', 'madeleine') ?>"/>
        </label>
    </div>
    <div class="search-form_btn_wr">
        <button type="submit" class="search-form__submit btn"><i class="material-icons">Buscar</i></button>
    </div>
</form>