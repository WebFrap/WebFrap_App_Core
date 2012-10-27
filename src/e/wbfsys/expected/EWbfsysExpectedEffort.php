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
class EWbfsysExpectedEffort
{
////////////////////////////////////////////////////////////////////////////////
// Constantes
////////////////////////////////////////////////////////////////////////////////

  /**
   * @var int
   */
  const VERY_LOW = 1;
  
  /**
   * @var int
   */
  const LOW = 2;
  
  /**
   * @var int
   */
  const MODERATE = 3;
  
  /**
   * @var int
   */
  const HIGH = 4;
  
  /**
   * @var int
   */
  const VERY_HIGH = 5;
  
  /**
   * @var array
   */
  public static $labels = array
  (
    self::VERY_LOW   => 'Very Low',
    self::LOW   => 'Low',
    self::MODERATE   => 'Moderat',
    self::HIGH   => 'High',
    self::VERY_HIGH   => 'Very High',
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
  
}// end class EWbfsysExpectedEffort

