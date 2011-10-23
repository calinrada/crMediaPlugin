<td class="sf_admin_foreignkey sf_admin_list_td_name">
  <?php echo $cr_media_gallery_content->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_content">
  <a href="<?php echo '/uploads/galleries/'.$cr_media_gallery_content->getContent() ?>" rel="prettyPhoto[gallery]"><img title="<?php echo $cr_media_gallery_content->getName() ?>" src="<?php echo '/uploads/galleries/'.$cr_media_gallery_content->getContent() ?>" height="35" width="35" /></a>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_gallery_id">
  <?php echo $cr_media_gallery_content->getGalleryId() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_type">
  <?php echo $cr_media_gallery_content->getType() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_published">
  <?php echo get_partial('crMediaGalleryContent/list_field_boolean', array('value' => $cr_media_gallery_content->getIsPublished())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_allow_comments">
  <?php echo get_partial('crMediaGalleryContent/list_field_boolean', array('value' => $cr_media_gallery_content->getAllowComments())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_allow_votes">
  <?php echo get_partial('crMediaGalleryContent/list_field_boolean', array('value' => $cr_media_gallery_content->getAllowVotes())) ?>
</td>
