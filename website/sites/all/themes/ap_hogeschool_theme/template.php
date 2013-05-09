<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   ap_hogeschool_theme_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: ap_hogeschool_theme_field()
 *
 *   where ap_hogeschool_theme is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  ap_hogeschool_theme_preprocess_html($variables, $hook);
  ap_hogeschool_theme_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // ap_hogeschool_theme_preprocess_node_page() or ap_hogeschool_theme_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function ap_hogeschool_theme_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

// Dit werkt denk ik niet :/ "Dennis - 19-04-2013"
/*
function ap_hogeschool_theme_form_comment_form_alter(&$form, &$form_state) {
  //dpm($form);  //shows original $form array
  $form['author']['#type'] = 'fieldset';
  $form['author']['#title'] = 'Your Information';
  $form['author']['#collapsible'] = FALSE;

  $form['your_comment'] = array(
    '#type' => 'fieldset',
    '#title' => t('Your Comment'),
    '#collapsible' => FALSE,
    '#weight' => 2,
  );

  //Subject
  $form['your_comment']['subject'] = $form['subject'];
  unset($form['subject']);
  $form['your_comment']['subject']['#weight'] = -10;
  $form['your_comment']['subject']['#size'] = 40;

  //Comment
  $form['your_comment']['comment_body'] = $form['comment_body'];
  unset($form['comment_body']);

  $form['author']['homepage']['#access'] = FALSE;

  $form['author']['mail']['#required'] = TRUE;

  //dpm($form);  //shows $form array after our changes
}
*/

/*
OPMERKING: Dennis: Deze functie's moeten nog getest worden in andere browsers!!
*/
/**
  * Use the HTML5 placeholder attribute to add help text to the search box.
  */
  // Toevoegen van een placeholder in search bar (enkel HTML5)
 
 /*met module aangepast*/
/*function ap_hogeschool_theme_form_search_block_form_alter(&$form, &$form_state) 
{
  $form['search_block_form']['#attributes']['placeholder'] = t('Zoeken...');
}*/



/*
function ap_hogeschool_theme_form_user_login_block_alter(&$form) {
  // For debug
  //drupal_set_message('<pre>' . check_plain(var_export($form, TRUE)) . '</pre>');
 
  // Remove the links provided by Drupal.
  unset($form['links']);
 
  // Set a weight for form actions so other elements can be placed
  // beneath them.
  $form['actions']['#weight'] = 5;
 
  // Shorter, inline request new password link.
  $form['actions']['request_password'] = array(
    '#markup' => l(t('Lost password'), 'user/password', array('attributes' => array('title' => t('Request new password via e-mail.')))),
  );  
 
  // New sign up link, with 'cuter' text.
  if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
    $form['signup'] = array(
      '#markup' => l(t('Register - it’s free!'), 'user/register', array('attributes' => array('class' => 'button', 'id' => 'create-new-account', 'title' => t('Create a new user account.')))),
      '#weight' => 10, 
    );  
  }
}*/


/**
 * Voeg een klasse toe aan elk item van het eerste niveau navigation menu.
 * (Dit doen we om de achtergrond van het tweede nievau te kunnen wijzigen.
 */
function ap_hogeschool_theme_preprocess_menu_block_wrapper(&$variables) {
  $active_trail = menu_get_active_trail();
  foreach ($active_trail as $item) {
    if ((!(bool) ($item['type'] & MENU_IS_LOCAL_TASK)) && !empty($item['mlid'])) {
      $variables['classes_array'][] = 'active-top-level-mlid-' . $item['mlid'];
      break;
    }
  }
}

/*
*
Verander de "Read more" , "Add new comment" in afbeeldingen en schakel de "comment-comments" uit (dat is de 1 comment link).
*
*/

function ap_hogeschool_theme_preprocess_node(&$variables){
	$variables['content']['links']['comment']['#links']['comment-comments'] = FALSE; 
	
	if($variables['is_front'])
	{	
		$variables['content']['links']['node']['#links']['node-readmore']['title'] ='<div class="custom-add-read-more"> </div>';
		$variables['content']['links']['node']['#links']['node-readmore']['html'] = TRUE;
		//$variables['content']['links']['comment']['#links']['comment-add']['title'] = '<span class="element-invisible">Add comment</span>';
		$variables['content']['links']['comment']['#links']['comment-add']['title'] = '<div class="custom-add-comment"> </div>';
		$variables['content']['links']['comment']['#links']['comment-add']['html'] = TRUE;
    } 
	if($variables['type'] == 'docs' || $variables['type'] == 'applicatie_formulier')
	{	
		$variables['content']['links']['node']['#links']['node-readmore']['title'] ='<div class="custom-add-read-more"> </div>';
		$variables['content']['links']['node']['#links']['node-readmore']['html'] = TRUE;
		$variables['content']['links']['comment']['#links']['comment-add']['title'] = '<div class="custom-add-comment"> </div>';
		$variables['content']['links']['comment']['#links']['comment-add']['html'] = TRUE;
    } 

	if( $variables['type'] == 'wie_zijn_we_')
	{
		if($variables['view_mode'] == 'teaser' && $variables['is_front'] == false )
		{	
			$variables['content']['links']['node']['#links']['node-readmore']['title'] ='<div class="read-more-wie-zijn-we"> </div>';
			$variables['content']['links']['node']['#links']['node-readmore']['html'] = TRUE;
			$variables['content']['links']['comment']['#links']['comment-add']['title'] = '<div class="add-comment-wie-zijn-we"> </div>';
			$variables['content']['links']['comment']['#links']['comment-add']['html'] = TRUE;
		}
    } 
}


//function ap_hogeschool_theme_email_field_formatter_view($object_type, $object, $field, $instance, $langcode, $items, $display) {
//  $element = array();
//  switch ($display['type']) { 
//   
//    case 'email_contact':
//      $ids = entity_extract_ids($object_type, $object);
//      foreach ($items as $delta => $item) {
//        $element[$delta] = array('#markup' => l(t('Contact '), 'email/' . $object_type . '/' . $ids[0] . '/' . $instance['field_name']));
//        break;
//      	}  
//  	}
//}




// Toevoegen van een placeholders aan login form (enkel HTML5)
function ap_hogeschool_theme_form_alter( &$form, &$form_state, $form_id )
{
    if (in_array( $form_id, array( 'user_login', 'user_login_block')))
    {
        $form['name']['#attributes']['placeholder'] = t( 'E-mailadres' );
		$form['name']['#size'] = 30;
		$form['name']['#weight'] = 1;
        $form['pass']['#attributes']['placeholder'] = t( 'Wachtwoord' );
		$form['pass']['#size'] = 30;
		$form['pass']['#weight'] = 2;

		// geen value for login button, vervangen door image 
		$form['actions']['submit']['#value'] = t("");
		$form['actions']['submit']['#weight'] = 5; 
		   
}
}

function ap_hogeschool_theme_form_user_login_block_alter(&$form) {
  // For debug
  //drupal_set_message('<pre>' . check_plain(var_export($form, TRUE)) . '</pre>');

  // huidige teksten unsetten
  unset($form['links']);

   /*incomment gezet!!*/
  // tekst nieuw wachtwoord aanpassen
/* $form['actions']['request_password'] = array(
    '#markup' => l(t('Wachtwoord vergeten?'), 'user/password', array('attributes' => array('title' => t('Wachtwoord vergeten?')))),
	'#weight' => 3, 
  ); 

  
  // tekst nieuwe account aanpassen
  $form['actions']['user_register'] = array(
  '#markup' => l(t('Registratie'), 'user/register', array('attributes' => array('title' => t('Registratie')))),
'#weight' => 4, );  */

}


/*TEST LOGINBLOCK*/

function ap_hogeschool_theme_theme(&$existing, $type, $theme, $path) {
  $hooks['user_login_block'] = array(
    'template' => 'templates/user-login-block',
    'render element' => 'form',
  );
  return $hooks;
}
 
function ap_hogeschool_theme_preprocess_user_login_block(&$vars) {
  // For debug only
  //print '<pre>';
  //print_r($vars['form']);
  //print '</pre>';
  //exit;
  $vars['name'] = render($vars['form']['name']);
  $vars['pass'] = render($vars['form']['pass']);
  $vars['submit'] = render($vars['form']['actions']['submit']);
  $vars['rendered'] = drupal_render_children($vars['form']);
}


?>