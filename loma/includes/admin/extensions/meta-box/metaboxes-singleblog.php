<?php

/* ========================================================= */
/* Single Blog Metaboxes                                     */
/* ========================================================= */
$category_in        = '';
$terms_in           = get_terms('category', 'hide_empty=0');

if (is_array($terms_in) && ( count($terms_in) > 0 )) {
    foreach ($terms_in as $k => $v) {
        $category_in[$v->slug] = $v->name;
    }
}

$meta_boxes[] = array(
    'title' => _x('Single Post Settings', 'backend metabox', 'backend_dahztheme'),
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',
    'autosave' => true,
    'fields' => array(
 
        array(
            'name' => _x('List Post Layout', 'backend metabox', 'backend_dahztheme'),
            'id' => "{$prefix}_list_post_lay",
            'type' => 'select',
            'options' => array(
                            'normal_lay' => _x('Normal Post', 'backend metabox', 'backend_dahztheme'),
                            'left_lay' => _x('Left Post', 'backend metabox', 'backend_dahztheme'),
                            'right_lay' => _x('Right Post', 'backend metabox', 'backend_dahztheme')
                ),
            'std' => 'normal_lay',
            'desc'  => _x('Active when you choose list post layout', 'backend metabox', 'backend_dahztheme')
        ),
        array(
            'name' => _x('Enable Big Post', 'backend metabox', 'backend_dahztheme'),
            'id' => "{$prefix}_enable_big_post_grid",
            'type' => 'checkbox',
            'std' => 0,
            'desc' => _x('Active when you choose grid post layout', 'backend metabox', 'backend_dahztheme')
        ),
        array(
            'name' => _x('Enable You May Also Like', 'backend metabox', 'backend_dahztheme'),
            'id' => "{$prefix}_enable_ymal",
            'type' => 'checkbox',
            'std' => 0
        ),
        array(
            'name' => _x('Category Include You May Also Like', 'backend metabox', 'backend_dahztheme'),
            'id' => "{$prefix}_select_category_include_ymai",
            'type' => 'checkbox_list',
            'options' => $category_in,
            'desc' => _x('Leave It Empty To Use Tags Instead', 'backend metabox', 'backend_dahztheme')

        )
    ),
);

$meta_boxes[] = array(
    'id' => 'df_review',
    'title' => _x('Review System', 'backend metabox', 'dahztheme'),
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',
    // 'autosave' => true,
    'fields' => array(
        //Enable Review
        array(
            'name' => _x('Include Review Box','backend metabox', 'dahztheme'),
            'id' => "{$prefix}_review_checkbox",
            'type' => 'checkbox',
            'desc'  => _x('Enable Review On This Post','backend metabox', 'dahztheme'),
            'std' => 0,
        )
    ),
);