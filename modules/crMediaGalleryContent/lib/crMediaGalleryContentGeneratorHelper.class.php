<?php

/**
 * cr_media_gallery_content module helper.
 *
 * @package    crEngine
 * @subpackage cr_media_gallery_content
 * @author     Calin Rada <calin.rada@yahoo.com>
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class crMediaGalleryContentGeneratorHelper extends crModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'cr_media_gallery_content' : 'cr_media_gallery_content_'.$action;
  }
}
