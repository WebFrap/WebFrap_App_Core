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
class EWbfsysMandantType
{
////////////////////////////////////////////////////////////////////////////////
// Constantes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @var int
   */
  const CUSTOMER = 1;
  
  /**
   * @var int
   */
  const PARTNER = 2;
  
  /**
   * @var array
   */
  public static $labels = array
  (
    self::CUSTOMER   => 'customer',
    self::PARTNER   => 'partner',
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
  
}// end class EWbfsysMandantType

