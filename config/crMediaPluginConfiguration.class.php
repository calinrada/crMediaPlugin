<?php

/**
 * crMediaPlugin configuration.
 *
 * @package     crMediaPlugin
 * @subpackage  config
 * @author      Calin Rada [calin.rada@yahoo.com]
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class crMediaPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    if (sfConfig::get('app_cr_media_plugin_routes_register', true) && in_array('crMediaGallery', sfConfig::get('sf_enabled_modules', array())))
    {
      $this->dispatcher->connect('routing.load_configuration', array('crMediaRouting', 'listenToRoutingLoadConfigurationEvent'));
    }

    foreach (array('crMediaGallery','crMediaGalleryContent') as $module)
    {
      if (in_array($module, sfConfig::get('sf_enabled_modules', array())))
      {
        $this->dispatcher->connect('routing.load_configuration', array('crMediaRouting', 'addRouteFor'.str_replace('crMedia', '', $module)));
      }
    }
  }
}
