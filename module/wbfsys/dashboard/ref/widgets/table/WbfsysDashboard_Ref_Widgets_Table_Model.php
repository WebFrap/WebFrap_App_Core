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
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class WbfsysDashboard_Ref_Widgets_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDashboardWidget_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysDashboardWidget( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDashboardWidget_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysDashboardWidget(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDashboardWidget_Entity
  */
  public function getEntityWbfsysDashboardWidget( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDashboardWidget = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDashboardWidget = $this->getRegisterd( 'entityWbfsysDashboardWidget' );


    //entity wbfsys_dashboard_widget
    if( !$entityWbfsysDashboardWidget )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDashboardWidget = $orm->get( 'WbfsysDashboardWidget', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdashboardwidget with this id '.$objid,
              'wbfsys.dashboard_widget.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDashboardWidget', $entityWbfsysDashboardWidget );
        $this->register( 'main_entity', $entityWbfsysDashboardWidget );

      }
      else
      {
        $entityWbfsysDashboardWidget   = new WbfsysDashboardWidget_Entity() ;
        $this->register( 'entityWbfsysDashboardWidget', $entityWbfsysDashboardWidget );
        $this->register( 'main_entity', $entityWbfsysDashboardWidget );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDashboardWidget->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDashboardWidget = $orm->get( 'WbfsysDashboardWidget', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdashboardwidget with this id '.$objid,
            'wbfsys.dashboard_widget.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDashboardWidget', $entityWbfsysDashboardWidget );
      $this->register( 'main_entity', $entityWbfsysDashboardWidget );
    }

    return $entityWbfsysDashboardWidget;

  }//end public function getEntityWbfsysDashboardWidget */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDashboardWidget_Entity $entity
  */
  public function setEntityWbfsysDashboardWidget( $entity )
  {

    $this->register( 'entityWbfsysDashboardWidget', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDashboardWidget */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysMenuEntry_Entity
  */
  public function getEntityWbfsysMenuEntry( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysMenuEntry = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysMenuEntry = $this->getRegisterd( 'entityWbfsysMenuEntry' );

    //entity wbfsys_menu_entry
    if( !$entityWbfsysMenuEntry )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysMenuEntry = $orm->get( 'WbfsysMenuEntry', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmenuentry with this id '.$objid,
              'wbfsys.menu_entry.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
        $this->register( 'main_entity', $entityWbfsysMenuEntry );

      }
      else
      {
        $entityWbfsysMenuEntry   = new WbfsysMenuEntry_Entity() ;
        $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
        $this->register( 'main_entity', $entityWbfsysMenuEntry );
      }

    }
    elseif( $objid && $objid != $entityWbfsysMenuEntry->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysMenuEntry = $orm->get( 'WbfsysMenuEntry', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmenuentry with this id '.$objid,
            'wbfsys.menu_entry.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysMenuEntry', $entityWbfsysMenuEntry );
      $this->register( 'main_entity', $entityWbfsysMenuEntry );
    }

    return $entityWbfsysMenuEntry;

  }//end public function getEntityWbfsysMenuEntry */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysMenuEntry_Entity $entity
  */
  public function setEntityWbfsysMenuEntry( $entity )
  {

    $this->register( 'entityWbfsysMenuEntry', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysMenuEntry */

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryData( $params )
  {

    $orm   = $this->getOrm();
    $data  = array();

    $data['wbfsys_dashboard_widget']  = $this->getEntityWbfsysDashboardWidget();
    $data['wbfsys_menu_entry']  = $this->getEntityWbfsysMenuEntry( $data['wbfsys_dashboard_widget']->id_widget );


    $tabData = array();

    foreach( $data as $tabName => $ent )
    {
      // prüfen ob etwas gefunden wurde
      if( !$ent )
      {
        Debug::console( "Missing Entity for Reference: ".$tabName );
        continue;
      }

      $tabData = array_merge( $tabData , $ent->getAllData( $tabName ) );
    }



    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysDashboard
   *
   * @param int $idWbfsysDashboard the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysDashboard, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysMenuEntry_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_menu_entry with the expected source wbfsys_menu_entry'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();
    
		$extendedConditions = array();

    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysDashboardWidget = $this->getRegisterd( 'search_fields_wbfsys_dashboard_widget' ) )
    {
       $fieldsWbfsysDashboardWidget   = $orm->getSearchCols( 'WbfsysDashboardWidget' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_dashboard_widget' ) )
    {
      $fieldsWbfsysDashboardWidget = array_unique( array_merge
      (
        $fieldsWbfsysDashboardWidget,
        $refs
      ));
    }

    $filterWbfsysDashboardWidget     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysDashboardWidget', $fieldsWbfsysDashboardWidget ),
      $orm->getErrorMessages( 'WbfsysDashboardWidget'  ),
      'search_wbfsys_dashboard_widget'
    );
    $condition['wbfsys_dashboard_widget'] = $filterWbfsysDashboardWidget->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysDashboard_Ref_Widgets_Table' );
    /* @var $query WbfsysDashboard_Ref_Widgets_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_dashboard_widget.id_dashboard = '.$idWbfsysDashboard );
    
    $validKeys  = $access->fetchListIds
    ( 
      $user->getProfileName(), 
      $query, 
      'table',  
      $condition, 
      $params 
    );

    $query->fetchInAcls
    (
      $validKeys,
      $params
    );



    return $query;

  }//end public public search */

}//end class WbfsysDashboard_Ref_Widgets_Table_Model

