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
class WbfsysCommentRating_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysCommentRating_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCommentRating( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysCommentRating_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCommentRating( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCommentRating_Entity
  */
  public function getEntityWbfsysCommentRating( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysCommentRating = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCommentRating = $this->getRegisterd( 'entityWbfsysCommentRating' );

    //entity wbfsys_comment_rating
    if( !$entityWbfsysCommentRating )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCommentRating = $orm->get( 'WbfsysCommentRating', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscommentrating with this id '.$objid,
              'wbfsys.comment_rating.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );
        $this->register( 'main_entity', $entityWbfsysCommentRating);

      }
      else
      {
        $entityWbfsysCommentRating   = new WbfsysCommentRating_Entity() ;
        $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating );
        $this->register( 'main_entity', $entityWbfsysCommentRating);
      }

    }
    elseif( $objid && $objid != $entityWbfsysCommentRating->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCommentRating = $orm->get( 'WbfsysCommentRating', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscommentrating with this id '.$objid,
            'wbfsys.comment_rating.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCommentRating', $entityWbfsysCommentRating);
      $this->register( 'main_entity', $entityWbfsysCommentRating);
    }

    return $entityWbfsysCommentRating;

  }//end public function getEntityWbfsysCommentRating */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCommentRating_Entity $entity
  */
  public function setEntityWbfsysCommentRating( $entity )
  {

    $this->register( 'entityWbfsysCommentRating', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCommentRating */

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

    $data['wbfsys_comment_rating']  = $this->getEntityWbfsysCommentRating();


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


    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_comment_rating']->id_type )
    {
      $valWbfsysCommentRatingType = $orm->getField
      (
        'WbfsysCommentRatingType',
        'rowid = '.$data['wbfsys_comment_rating']->id_type,
        'name'
      );
      $tabData['wbfsys_comment_rating_type_name'] = $valWbfsysCommentRatingType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_comment_rating_type_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// context: table
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Suchfunktion für das Listen Element
   *
   * Wenn Suchparameter übergeben werden, werden diese automatisch in die
   * Query eingebaut, ansonsten wird eine plain query ausgeführt
   *
   * Berechtigungen werden bei Bedarf berücksichtigt
   *
   * Am Ende wird ein geladenes Query Objekt zurückgegeben, über welches
   * ( wie über einen Array ) itteriert werden kann
   *
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   * @param array $condition Übergabe möglicher such Parameter
   *
   * @return LibSqlQuery
   *
   * @throws LibDb_Exception
   *    wenn die Query fehlschlägt
   *    Datenbank Verbindungsfehler... etc ( siehe meldung )
   */
  public function search( $access, $params, $condition = array() )
  {

    // laden der benötigten resourcen
    $view         = $this->getView();
    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $user        = $this->getUser();
    
    $extendedConditions = array();
    


    // freitext suche
    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $db->addSlashes( trim( $free ) );




      if( !$fieldsWbfsysCommentRating = $this->getRegisterd( 'search_fields_wbfsys_comment_rating' ) )
      {
         $fieldsWbfsysCommentRating   = $orm->getSearchCols( 'WbfsysCommentRating' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_comment_rating' ) )
      {
        $fieldsWbfsysCommentRating = array_unique( array_merge
        (
          $fieldsWbfsysCommentRating,
          $refs
        ));
      }

      $filterWbfsysCommentRating     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysCommentRating', $fieldsWbfsysCommentRating ),
        $orm->getErrorMessages( 'WbfsysCommentRating'  ),
        'search_wbfsys_comment_rating'
      );
      $condition['wbfsys_comment_rating'] = $filterWbfsysCommentRating->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_comment_rating']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_comment_rating']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_comment_rating']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_comment_rating']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_comment_rating']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_comment_rating}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_comment_rating']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_comment_rating']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_comment_rating', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_comment_rating']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysCommentRating_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysCommentRating_Table_'.SParserString::subToCamelCase( $dynFilter )
          );

          if( $filter )
            $query->inject( $filter, $params );
        }
        catch( LibDb_Exception $e )
        {
          $response->addError( "Requested nonexisting filter ".$dynFilter );
        }

      }
    }


    // per exclude können regeln übergeben werden um bestimmte datensätze
    // auszublenden
    // wird häufig verwendet um bereits zugewiesenen datensätze aus zu blenden
    if( $params->exclude )
    {

      $tmp = explode( '-', $params->exclude );

      $conName   = $tmp[0];
      $srcId     = $tmp[1];
      $targetId  = $tmp[2];

      $excludeCond = ' wbfsys_comment_rating.rowid NOT IN '
      .'( select '.$targetId .' from '.$conName.' where '.$srcId.' = '.$params->objid.' and not '.$srcId.' is null ) ';

      $query->setCondition( $excludeCond );

    }

    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

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
      
    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }





    return $query;

  }//end public function search */

  /**
   * fill the elements in a search form
   *
   * @param LibTemplateWindow $view
   * @return boolean
   */
  public function searchForm( $view )
  {

    $searchFields = $this->getSearchFields();


    //entity wbfsys_comment_rating
    if( !$entityWbfsysCommentRating = $this->getRegisterd( 'entityWbfsysCommentRating' ) )
    {
      $entityWbfsysCommentRating   = new WbfsysCommentRating_Entity() ;
    }

    $formWbfsysCommentRating    = $view->newForm( 'WbfsysCommentRating' );
    $formWbfsysCommentRating->setNamespace( 'WbfsysCommentRating' );
    $formWbfsysCommentRating->setPrefix( 'WbfsysCommentRating' );
    $formWbfsysCommentRating->createSearchForm
    (
      $entityWbfsysCommentRating,
      ( isset($searchFields['wbfsys_comment_rating'])?$searchFields['wbfsys_comment_rating']:array() )
    );


  }//end public function searchForm */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSearchFields()
  {

    return array
    (
      'wbfsys_comment_rating' => array
      (
        'id_type',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysCommentRating_Table_Model

