<?php
function show_posts_nav() {
  global $wp_query;
  return ($wp_query->max_num_pages > 1);
};

global $wp_rewrite;

$paginate_base = get_pagenum_link(1);

if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
	$paginate_format = '';
	$paginate_base = add_query_arg('paged', '%#%');
} else {
	$paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
	user_trailingslashit('page/%#%/', 'paged');
	$paginate_base .= '%_%';
}

if (show_posts_nav()) {

echo '<div class="page_navi clearfix gothic_font">'. "\n";
echo paginate_links( array(
	'base' => $paginate_base,
	'format' => $paginate_format,
	'total' => $wp_query->max_num_pages,
  'show_all' => true,
  'prev_next' => true,
	'current' => ($paged ? $paged : 1),
	'type' => 'list',
  'prev_text' => '<span>&laquo;</span>',
  'next_text' => '<span>&raquo;</span>'
));
echo "\n</div>\n";

};

?>