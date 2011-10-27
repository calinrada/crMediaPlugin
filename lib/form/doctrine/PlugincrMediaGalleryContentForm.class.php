<?php

/**
 * PlugincrMediaGalleryContent form.
 *
 * @package    crEngine
 * @subpackage crMediaPlugin :: crMediaGalleryContent
 * @author     Calin Rada <calin.rada@yahoo.com>
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PlugincrMediaGalleryContentForm extends BasecrMediaGalleryContentForm
{
  public function configure()
  {
    $this->removeFields();
    $this->setUploadField();
  }

  /**
   * We remove uneccessary fields
   */
  protected function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'],
      $this['created_by'], $this['updated_by'],
      $this['old_content']
    );
  }

  /**
   * We set the upload filed and validators
   */
  protected function setUploadField()
  {
    if(null != $this->getObject()->getContent())
    {
      $this->widgetSchema['content'] = new sfWidgetFormInputFileEditable(array(
        'file_src'  => '/uploads/galleries/'.$this->getObject()->getContent(),
        'edit_mode' => !$this->isNew(),
        'template'  => '<div>%input% <a href="%file%" rel="prettyPhoto" title="'.$this->getObject()->getName().'">Vezi</a> <a href="http://www.youtube.com/watch?v=bkGwYb8uY18" id="home-intro-video" rel="prettyPhoto">Watch</a> <br />%delete% %delete_label%</div>',
        'with_delete' => true,
      ));
    }
    else
    {
      $this->widgetSchema['content'] = new sfWidgetFormInputFile();
    }

    $this->validatorSchema['content'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/galleries',
      'mime_types' => 'web_images',
      'max_size' => 1000000,
      'validated_file_class' => 'crValidatedFile',
    ));

    $this->validatorSchema['content_delete'] = new sfValidatorPass();
  }
}
