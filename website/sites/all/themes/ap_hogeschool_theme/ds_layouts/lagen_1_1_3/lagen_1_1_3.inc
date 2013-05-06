<?php
function ds_lagen_1_1_3() {
  return array(
    'label' => t('3 lagen'),
    'regions' => array(
      'titel' => t('Titel'),
      'body' => t('Body'),
	  'links' => t('Links'),
	  'midden' => t('Midden'),
	  'rechts' => t('Rechts'),
    ),
    // Add this line if there is a default css file.
    'css' => TRUE,
    // Add this line if you're using DS 2.x for icon preview
    'image' => TRUE,
  );
}
?>