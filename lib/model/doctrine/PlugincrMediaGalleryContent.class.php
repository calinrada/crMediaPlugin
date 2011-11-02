<?php

/**
 * PlugincrMediaGalleryContent
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    crEngine
 * @subpackage crMediaPlugin :: crMediaGalleryContent
 * @author     Calin Rada <calin.rada@yahoo.com>
 * @version    1.0.1 201110101714
 */
abstract class PlugincrMediaGalleryContent extends BasecrMediaGalleryContent
{
  /**
   * Resize image after upload or delete files id content_delete
   * is checked
   * @param object $event
   */
  public function postSave($event)
  {
    $this->resizeImage();
  }

  public function preSave($event)
  {
    if(!$this->isNew())
    {
      $request = sfContext::getInstance()->getRequest();
      $form = $request->getParameter('cr_media_gallery_content');
      if(isset($form['content_delete']))
      {
        $this->deleteContent();
      }
    }
  }

  public function preDelete($event)
  {
    $this->deleteContent();
  }
  /**
   * Simple image resizing method
   */
  protected function resizeImage()
  {
    $request = sfContext::getInstance()->getRequest();

    $form = $request->getParameter('cr_media_gallery_content');
    $gaid = $form['gallery_id'];
    $type = $form['type'];

    if('image'==$type)
    {
      $full_dir = sfConfig::get('sf_upload_dir').DS.'galleries'.DS.$gaid.DS.$type;
      $full_dir_thumb = $full_dir.DS.'thumbnail';
      $image = $full_dir.DS.$this->getContent();
      $thumb = $full_dir_thumb.DS.$this->getContent();

      if(file_exists($image)&&!is_dir($image))
      {
        $size = $this->getResizeOptions($form['resize_size']['choiceA'],$form['resize_size']['choiceB']);

        $thumbnail = new sfThumbnail($size[0], $size[1]);
        $thumbnail->loadFile($image);
        $thumbnail->save($thumb, 'image/jpeg');
      }
    }
  }

  /**
   * A list of possible resize for photos. We use this method to avoid
   * resizing with unusual values
   *
   * @return array
   */
  public function getResizeOptions($w=0,$h=0)
  {
    for ($i=30;$i<=800;$i++)
    {
      $out[] = $i;
    }
    if($w>0&&$h>0)
    {
      return array($out[$w],$out[$h]);
    }
    return $out;
  }

  /**
   * Delete files from gallery.
   */
  protected function deleteContent()
  {
    $type = $this->getType();
    $gaid = $this->getGalleryId();
    $cont = $this->getContent();

    $full_dir = sfConfig::get('sf_upload_dir').DS.'galleries'.DS.$gaid.DS.$type.DS;
    $full_dir_thumb = $full_dir.DS.'thumbnail'.DS;

    if(file_exists($full_dir.$cont) && !is_dir($full_dir.$cont))
    {
      if(!unlink($full_dir.$cont))
      {
        throw new sfException('Can\'t delete file: '.$full_dir.$cont);
      }
    }

    if('image'==$type && file_exists($full_dir_thumb.$cont) && !is_dir($full_dir_thumb.$cont))
    {
      if(!unlink($full_dir_thumb.$cont))
      {
        throw new sfException('Can\'t delete file: '.$full_dir_thumb.$cont);
      }
    }
  }
}