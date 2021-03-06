<?php
defined('ABSPATH') || die('Access Denied');

class EcommercewdModelLabels extends EcommercewdModel {
  public function get_row($id = 0) {
    $limit = WDFSession::get_pagination_limit();
    $limitstart = WDFSession::get_pagination_start();
    $offset = ($limitstart - 1) * $limit;
    $args = array(
      'orderby'           => WDFSession::get('sort_by', 'name'),
      'order'             => WDFSession::get('sort_order', 'ASC'),
      'hide_empty'        => FALSE,
      'exclude'           => array(),
      'exclude_tree'      => array(),
      'include'           => array(),
      'number'            => WDFSession::get_pagination_limit(),
      'fields'            => 'all',
      'slug'              => '',
      'parent'            => '',
      'hierarchical'      => TRUE,
      'child_of'          => 0,
      'childless'         => FALSE,
      'get'               => '',
      'name__like'        => WDFSession::get('search_name', ''),
      'description__like' => '',
      'pad_counts'        => FALSE,
      'offset'            => $offset,
      'search'            => '',
      'cache_domain'      => 'core'
    );
    $rows = get_terms('wde_labels', $args);

    foreach ($rows as $row) {
      $row->id = $row->term_id;
      $term_meta = get_option("wde_labels_" . $row->term_id);
      $row->thumb = $term_meta['thumb'];
      if (!$row->thumb) {
        $row->thumb = WDFJson::encode(array());
      }
      $thumbs = WDFJson::decode(stripslashes($row->thumb));
      $row->thumb = ($thumbs == null) || (empty($thumbs) == TRUE) ? '' : $thumbs[0];
      $row->thumb_position = $term_meta['thumb_position'];
    }
    return $row;
  }

  public function get_rows() {
    $limit = WDFSession::get_pagination_limit();
    $limitstart = WDFSession::get_pagination_start();
    $offset = ($limitstart - 1) * $limit;
    $args = array(
      'orderby'           => WDFSession::get('sort_by', 'name'),
      'order'             => WDFSession::get('sort_order', 'ASC'),
      'hide_empty'        => FALSE,
      'exclude'           => array(),
      'exclude_tree'      => array(),
      'include'           => array(),
      'number'            => WDFSession::get_pagination_limit(),
      'fields'            => 'all',
      'slug'              => '',
      'parent'            => '',
      'hierarchical'      => TRUE,
      'child_of'          => 0,
      'childless'         => FALSE,
      'get'               => '',
      'name__like'        => WDFSession::get('search_name', ''),
      'description__like' => '',
      'pad_counts'        => FALSE,
      'offset'            => $offset,
      'search'            => '',
      'cache_domain'      => 'core'
    );
    $rows = get_terms('wde_labels', $args);

    foreach ($rows as $row) {
      $row->id = $row->term_id;
      $term_meta = get_option("wde_labels_" . $row->term_id);
      $row->thumb = $term_meta['thumb'];
      $row->thumb_position = $term_meta['thumb_position'];
    }
    return $rows;
  }

  protected function init_rows_filters() {
    $filter_items = array();
    $filter_item = new stdClass();
    $filter_item->type = 'string';
    $filter_item->name = 'name';
    $filter_item->default_value = null;
    $filter_item->operator = 'like';
    $filter_item->input_type = 'text';
    $filter_item->input_label = __('Name', 'wde');
    $filter_item->input_name = 'search_name';
    $filter_items[$filter_item->name] = $filter_item;
    $this->rows_filter_items = $filter_items;
    parent::init_rows_filters();
  }
}