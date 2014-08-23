<?php
/**
 * @file
 * template.php
 */

/**
 * Implements hook_preprocess_html().
 *
 * @param $variables
 */
function designless_preprocess_html(&$variables) {

  // Add Open Sans font.
  $options = array(
    'type' => 'external',
    'group' => CSS_THEME,
    'weight' => -999,
    'every_page' => TRUE,
    'preprocess' => FALSE,
  );
  drupal_add_css('//fonts.googleapis.com/css?family=Open+Sans:400,700', $options);
}


/**
 * Preprocesses variables for theme_username().
 *
 * @see template_process_username()
 */
function designless_preprocess_username(&$variables) {

  // Remove Drupal's rubbish.
  $variables['extra'] = '';
}

/**
 * Implements hook_preprocess_page().
 *
 * @param $vars
 */
//function designless_preprocess_page(&$vars) {
//}

/**
 * Implements hook_preprocess_node().
 *
 * @param $vars
 */
function designless_preprocess_node(&$vars) {

  // Improve 'submitted by' line.
  $vars['submitted'] =  t('!datetime',
    array(
      '!username' => $vars['name'],
      '!datetime' => $vars['date'],
    ));

  // Relate the blog pages with Google+ profile.
  if ($vars['page']) {
    $uid = $vars['uid'];

    $author_info = array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'author',
        'href' => url('user/' . $uid, array('absolute' => TRUE)),
      ),
    );

    drupal_add_html_head($author_info, 'author');
  }
}
