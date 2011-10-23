<?php

/**
 * PlugincrMediaGallery form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PlugincrMediaGalleryForm extends BasecrMediaGalleryForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'],$this['created_by'],$this['updated_by']);
    //$this->embedForm('content', new crMediaGalleryContentForm());
    //$this->mergeForm(new crMediaGalleryContentForm());
  }
}
