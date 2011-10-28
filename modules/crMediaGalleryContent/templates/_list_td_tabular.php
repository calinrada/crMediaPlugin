<td class="sf_admin_foreignkey sf_admin_list_td_name">
  <?php echo $cr_media_gallery_content->getName() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_gallery_id">
  <?php echo $cr_media_gallery_content->getCrMediaGallery() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_type">
  <?php
    $type = $cr_media_gallery_content->getType();
    switch($type)
    {
      case "image": $src = "/crMediaPlugin/images/icons/image.png"; break;
      case "video": $src = "/crMediaPlugin/images/icons/video.png"; break;
      case "audio": $src = "/crMediaPlugin/images/icons/audio.png"; break;
    }
  ?>
  <a href="<?php echo '/uploads/galleries/'.$cr_media_gallery_content->getGalleryId().'/'.$cr_media_gallery_content->getType().'/'.$cr_media_gallery_content->getContent() ?>" rel="prettyPhoto[gallery]">
  <img src="<?php echo $src ?>" width="24" height="24" title="<?php echo ucfirst(__($type)) ?>" />
  </a>
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
