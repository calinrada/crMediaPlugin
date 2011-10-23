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
    $request = sfContext::getInstance()->getRequest();
    unset(
            $this['created_at'],
            $this['updated_at'],
            $this['created_by'],
            $this['updated_by'],
            $this['old_content']
            );

    $this->widgetSchema['content'] = new sfWidgetFormInputFile();
    $this->validatorSchema['content'] = new sfValidatorFile(array(
      'required'   => true,
      'path'       => sfConfig::get('sf_upload_dir').'/galleries',
      'mime_types' => 'web_images',
      'max_size' => 1000000,
      'validated_file_class' => 'crValidatedFile',
    ));

    if(!$this->isNew())
    {
      unset($this['content']);
    }

    //$this->widgetSchema['old_content'] = new sfWidgetFormInput(array(),array('value'=>'xxx'));
  }
}
