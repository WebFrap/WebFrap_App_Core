<?php 
/*******************************************************************************
*
* @author      : Dominik Bonsch <dominik.bonsch@webfrap.net>
* @date        :
* @copyright   : Webfrap Developer Network <contact@webfrap.net>
* @project     : Webfrap Web Frame Application
* @projectUrl  : http://webfrap.net
*
* @licence     : BSD License see: LICENCE/BSD Licence.txt
* 
* @version: @package_version@  Revision: @package_revision@
*
* Changes:
*
*******************************************************************************/

/**
 *
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class EWbfsysDocuTreeTemplate
{
////////////////////////////////////////////////////////////////////////////////
// Constantes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @var string
   */
  const BLOCKS = 'blocks';
  
  /**
   * @var string
   */
  const TREE = 'tree';
  
  /**
   * @var string
   */
  const DOCUMENT = 'document';
  
  /**
   * @var string
   */
  const PAGE = 'page';
  
  /**
   * @var array
   */
  public static $labels = array
  (
    self::BLOCKS   => 'Blocks',
    self::TREE   => 'Tree',
    self::DOCUMENT   => 'Document',
    self::PAGE   => 'page',
  );
  
  /**
   * @param string $key
   * @param string $def
   * @return string
   */
  public static function label( $key, $def = null )
  {
  
  	if( !is_null( $def )  )
  	{
      return isset( self::$labels[$key] ) 
        ? self::$labels[$key]
        : $def;
  	}
  	else
  	{
      return isset( self::$labels[$key] ) 
        ? self::$labels[$key]
        : 'blocks';
  	}

      
  }//end public static function label */
  
}// end class EWbfsysDocuTreeTemplate

