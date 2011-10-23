<?php

/**
 * crMediaGallery module helper.
 *
 * @package    crEngine
 * @subpackage crMediaPlugin : crMediaGallery
 * @author     Calin Rada <calin.rada@yahoo.com>
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class crMediaGalleryGeneratorHelper extends crModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'cr_media_gallery' : 'cr_media_gallery_'.$action;
  }
}
