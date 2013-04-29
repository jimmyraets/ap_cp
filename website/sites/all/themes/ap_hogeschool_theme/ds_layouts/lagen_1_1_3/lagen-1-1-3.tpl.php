<div class="<?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  
  <?php if ($titel): ?>
    <div class="ds-titel<?php print $titel_classes; ?>">
      <?php print $titel; ?>
    </div>
  <?php endif; ?>

  <?php if ($body): ?>
    <div class="ds-body<?php print $body_classes; ?>">
      <?php print $body; ?>
    </div>
  <?php endif; ?>
  
  <div class="Wrapper-links-midden-rechts">
  
   <?php if ($links): ?>
    <div class="ds-links<?php print $links_classes; ?>">
      <?php print $links; ?>
    </div>
  <?php endif; ?>
  
   <?php if ($midden): ?>
    <div class="ds-midden<?php print $midden_classes; ?>">
      <?php print $midden; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($rechts): ?>
    <div class="ds-rechts<?php print $rechts_classes; ?>">
      <?php print $rechts; ?>
    </div>
  <?php endif; ?>
  
  </div>
</div>