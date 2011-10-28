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
    $this->setContentField();

    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
  }

  /**
   * We remove uneccessary fields
   */
  protected function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'],
      $this['created_by'], $this['updated_by']
    );
  }

  /**
   * We set the content field and validators. We need to determine if it is
   * an embeded content or user is uploading something.
   */
  protected function setContentField()
  {
    $gaid = $this->getObject()->getGalleryId();
    $type = $this->getObject()->getType();
    $i18n = sfContext::getInstance()->getI18N();

    if(null != $this->getObject()->getContent() && ('image'==$type || 'audio'==$type || 'video'==$type) )
    {
      $this->widgetSchema['content'] = new sfWidgetFormInputFileEditable(array(
        'file_src'  => '/uploads/galleries/'.$gaid.'/'.$type.'/'.$this->getObject()->getContent(),
        'edit_mode' => !$this->isNew(),
        'template'  => '<div>%input% <a href="%file%" rel="prettyPhoto" title="'.$this->getObject()->getName().'">'.$i18n->__('Preview').'</a> | '.$i18n->__('Delete file on save').' %delete% </div>',
        'with_delete' => true,
      ));
    }
    else
    {
      $this->widgetSchema['content'] = new sfWidgetFormInputFile();
    }

    $this->validatorSchema['content'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => $this->checkUploadDir($gaid,$type),
      'mime_types' => 'web_images',
      'max_size' => 1000000,
      'validated_file_class' => 'crValidatedFile',
    ));

    $this->validatorSchema['content_delete'] = new sfValidatorPass();
  }

  /**
   * We check if upload dir is ready for this gallery. If not, we try to
   * create it.
   * @param string $gaid
   * @param string $type
   * @return string
   */
  protected function checkUploadDir($gaid,$type)
  {
    $full_dir = sfConfig::get('sf_upload_dir').'/galleries/'.$gaid.'/'.$type;
    $gall_dir = sfConfig::get('sf_upload_dir').'/galleries/'.$gaid;

    if(!is_readable($gall_dir))
    {
      if(!mkdir($gall_dir))
      {
        throw new sfException($gall_dir.' does not exists and i can\'t create it.');
      }
    }

    if(!is_readable($full_dir))
    {
      if(!mkdir($full_dir))
      {
        throw new sfException($full_dir.' does not exists and i can\'t create it.');
      }
    }

    return $full_dir;
  }
}
