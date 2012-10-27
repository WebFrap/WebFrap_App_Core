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
class EWbfsysUserType
{
////////////////////////////////////////////////////////////////////////////////
// Constantes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @var int
   */
  const USER = 1;
  
  /**
   * @var int
   */
  const ORGANIZATION = 2;
  
  /**
   * @var int
   */
  const WBF_NODE = 3;
  
  /**
   * @var int
   */
  const BOT = 4;
  
  /**
   * @var int
   */
  const SPIDER = 5;
  
  /**
   * @var int
   */
  const SYSTEM = 6;
  
  /**
   * @var array
   */
  public static $labels = array
  (
    self::USER   => 'User',
    self::ORGANIZATION   => 'Organisation',
    self::WBF_NODE   => 'WebFrap Node',
    self::BOT   => 'Bot',
    self::SPIDER   => 'Spider',
    self::SYSTEM   => 'System',
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
        : '1';
  	}

      
  }//end public static function label */
  
}// end class EWbfsysUserType

