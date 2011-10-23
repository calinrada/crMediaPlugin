<?php

/**
 * PlugincrMediaGalleryContent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PlugincrMediaGalleryContentForm extends BasecrMediaGalleryContentForm
{
  public function configure()
  {
    $request = sfContext::getInstance()->getRequest();
    unset($this['created_at'],$this['updated_at'],$this['created_by'],$this['updated_by']);
    $this->widgetSchema['content'] = new sfWidgetFormInputFile();
    $this->validatorSchema['content'] = new sfValidatorFile(array(
      'required'   => true,
      'path'       => sfConfig::get('sf_upload_dir').'/galleries/'.$request->getPostParameter('gallery_id',1),
      'mime_types' => 'web_images',
      'max_size' => 500000,
      'validated_file_class' => 'crValidatedFile',
    ));

    $this->widgetSchema['old_content'] = new sfWidgetFormInput(array(),array('value'=>'xxx'));


  }
}
