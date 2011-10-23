<?php

/**
 *
 * @package    crEngine
 * @subpackage crMediaPlugin
 * @author     Calin Rada <calin.rada@yahoo.com>
 * @version    1.0.1
 */
class crMediaRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   * @static
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    //$r = $event->getSubject();

    // preprend our routes
    //$r->prependRoute('sf_guard_signin', new sfRoute('/guard/login', array('module' => 'sfGuardAuth', 'action' => 'signin')));
   	//$r->prependRoute('sf_guard_signout', new sfRoute('/guard/logout', array('module' => 'sfGuardAuth', 'action' => 'signout')));
  }

  /**
   * Adds an sfDoctrineRouteCollection collection to manage galleries.
   *
   * @param sfEvent $event
   * @static
   */
  static public function addRouteForGallery(sfEvent $event)
  {
    $event->getSubject()->prependRoute('cr_media_gallery', new sfDoctrineRouteCollection(array(
      'name'                => 'cr_media_gallery',
      'model'               => 'crMediaGallery',
      'module'              => 'crMediaGallery',
      'prefix_path'         => '/:sf_culture/media/gallery',
      'with_wildcard_routes' => true,
      'collection_actions'  => array('filter' => 'post', 'batch' => 'post'),
      'requirements'        => array(),
    )));
  }

  /**
   * Adds an sfDoctrineRouteCollection collection to manage gallery content.
   *
   * @param sfEvent $event
   * @static
   */
  static public function addRouteForGalleryContent(sfEvent $event)
  {
    $event->getSubject()->prependRoute('cr_media_gallery_content', new sfDoctrineRouteCollection(array(
      'name'                => 'cr_media_gallery_content',
      'model'               => 'crMediaGalleryContent',
      'module'              => 'crMediaGalleryContent',
      'prefix_path'         => '/:sf_culture/media/gallery/content',
      'with_wildcard_routes' => true,
      'collection_actions'  => array('filter' => 'post', 'batch' => 'post'),
      'requirements'        => array(),
    )));
  }
}