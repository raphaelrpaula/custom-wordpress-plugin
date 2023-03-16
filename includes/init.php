<?php
function plugin_init()
{
  register_post_type('postType', array(
    'label' => 'Post Type',
    'description' => 'Custom Post Type',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'postType', 'with_front' => true),
    'query_var' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'post-formats', 'author', 'excerpt'),
    'menu_icon' => 'dashicons-category',

    'labels' => array(
      'name' => 'Post Type',
      'singular_name' => 'Post Type',
      'menu_name' => 'Post Type',
      'add_new' => 'Adicionar Novo',
      'add_new_item' => 'Adicionar Novo',
      'edit' => 'Editar',
      'edit_item' => 'Editar Post Type',
      'new_item' => 'Novo Post Type',
      'view' => 'Ver Post Type',
      'view_item' => 'Ver Post Type',
      'search_items' => 'Procurar Post Type',
      'not_found' => 'Nenhum Post Type Encontrado',
      'not_found_in_trash' => 'Nenhum Post Type Encontrado no Lixo',
    )
  ));

  register_taxonomy('custom-taxonomy', 'postType', array(
    'rewrite' => array('slug' => 'custom-taxonomy'),
    'hierarchical' => true,
    'show_admin_column' => true,
    'labels' => array(
      'name' => 'Custom Taxonomy',
      'singular_name' => 'Custom Taxonomy',
      'search_items' => 'Pesquisar',
      'add_new_item' => 'Adicionar novo',
      'edit_item' => 'Editar',
    ),
  ));
}

// Plugin Columns - Admin
function handle_admin_columns($columns)
{
  $columns = array(
    'cb' => $columns['cb'],
    'image' => __('Imagem'),
    'title' => __('Nome', 'customPlugin'),
    'taxonomy' => __('Custom Taxonomy', 'customPlugin'),
  );
  return $columns;
}

function handle_admin_custom_columns($column, $post_id)
{
  $terms = get_the_terms($post_id, 'custom-taxonomy');
  $taxonomy = $terms[0]->name;

  switch ($column) {
    case 'image':
      echo "<a href=" . get_edit_post_link($post_id) . ">" . get_the_post_thumbnail($post_id, array(150, 150)) . "</a>";
      break;
    case 'taxonomy':
      echo $taxonomy;
      break;
  }
}
