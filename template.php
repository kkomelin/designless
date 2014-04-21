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
function designless_preprocess_page(&$vars) {

  // This is my hardcoded language switcher for RU and EN languages only.
  // Feel free to comment it out or adapt to your reality.
  $vars['simple_language_switcher'] =  _designless_simple_language_switcher();
}

/**
 * Implements hook_preprocess_node().
 *
 * @param $vars
 */
function designless_preprocess_node(&$vars) {

  // Improve 'submitted by' line.
  $vars['submitted'] =  t('!username | !datetime',
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

  // Add special region to put Ad inside the node.tpl.php.
  if (!drupal_is_front_page()) {
    if ($node_above_content = block_get_blocks_by_region('node_above_content')) {
      $vars['node_above_content'] = $node_above_content;
      $vars['node_below_content'] = '';
    }

    if ($node_below_content = block_get_blocks_by_region('node_below_content')) {
      $vars['node_above_content'] = '';
      $vars['node_below_content'] = $node_below_content;
    }
  }
}

/**
 * Creates link to another language.
 *
 * @return array
 */
function _designless_simple_language_switcher() {
  global $language;
  $another_language = ($language->language == 'en') ? 'ru' : 'en';
  $languages = language_list();

  $options = array(
    'attributes' => array(
      'class' => array('another-language'),
      'title' => strtoupper($another_language),
    ),
  );
  $url = url('<front>', array('absolute' => TRUE, 'language' => $languages[$another_language]));

  return l(strtoupper($another_language), $url, $options);
}
