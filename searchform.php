<?php
/**
 * Шаблон формы поиска (searchform.php)
 * @package WordPress
 * @subpackage rocket
 */
?>
<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="" id="search-field" placeholder="поиск" value="<?php echo get_search_query() ?>" name="s">
	<button type="submit" class="s"><i class="fas fa-search"></i></button>
</form>