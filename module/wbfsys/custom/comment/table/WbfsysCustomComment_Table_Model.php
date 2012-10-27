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
class WbfsysCustomComment_Table_Model
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
  * @return WbfsysCustomComment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysCustomComment( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysCustomComment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysCustomComment( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysCustomComment_Entity
  */
  public function getEntityWbfsysCustomComment( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysCustomComment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysCustomComment = $this->getRegisterd( 'entityWbfsysCustomComment' );

    //entity wbfsys_custom_comment
    if( !$entityWbfsysCustomComment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysCustomComment = $orm->get( 'WbfsysCustomComment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscustomcomment with this id '.$objid,
              'wbfsys.custom_comment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysCustomComment', $entityWbfsysCustomComment );
        $this->register( 'main_entity', $entityWbfsysCustomComment);

      }
      else
      {
        $entityWbfsysCustomComment   = new WbfsysCustomComment_Entity() ;
        $this->register( 'entityWbfsysCustomComment', $entityWbfsysCustomComment );
        $this->register( 'main_entity', $entityWbfsysCustomComment);
      }

    }
    elseif( $objid && $objid != $entityWbfsysCustomComment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysCustomComment = $orm->get( 'WbfsysCustomComment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscustomcomment with this id '.$objid,
            'wbfsys.custom_comment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysCustomComment', $entityWbfsysCustomComment);
      $this->register( 'main_entity', $entityWbfsysCustomComment);
    }

    return $entityWbfsysCustomComment;

  }//end public function getEntityWbfsysCustomComment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysCustomComment_Entity $entity
  */
  public function setEntityWbfsysCustomComment( $entity )
  {

    $this->register( 'entityWbfsysCustomComment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysCustomComment */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedComment_Entity
  */
  public function getEntityEmbedComment( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_comment;

    $entityEmbedComment = $this->getRegisterd( 'entityEmbedComment' );

    //entity wbfsys_custom_comment
    if( !$entityEmbedComment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedComment = $orm->get( 'WbfsysComment', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsyscomment with the id '.$objid,
              'wbfsys.custom_comment.message'
            )
          );

          $entityEmbedComment = new WbfsysComment_Entity;

          $entityEmbedComment->title = ' ';
          $entityEmbedComment->content = ' ';
          $entityEmbedComment->setId( $objid, true );
          $orm->insert( $entityEmbedComment, array(), false );

        }
        $this->register( 'entityEmbedComment', $entityEmbedComment );
      }
      else
      {
        $entityEmbedComment   = new WbfsysComment_Entity() ;
        $this->register( 'entityEmbedComment', $entityEmbedComment );
      }

    }
    elseif( $objid  && $objid != $entityEmbedComment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedComment = $orm->get( 'WbfsysComment', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsyscomment with the id '.$objid,
            'wbfsys.custom_comment.message'
          )
        );

        $entityEmbedComment = new WbfsysComment_Entity;

          $entityEmbedComment->title = ' ';
          $entityEmbedComment->content = ' ';
        $entityEmbedComment->setId( $objid, true );
        $orm->insert( $entityEmbedComment );
      }

      $this->register( 'entityEmbedComment', $entityEmbedComment );
    }

    return $entityEmbedComment;

  }//end public function getEntityEmbedComment */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedComment $entity
  */
  public function setEntityEmbedComment( $entity )
  {

    $this->register( 'entityEmbedComment', $entity );

  }//end public function setEntityEmbedComment */

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

    $data['wbfsys_custom_comment']  = $this->getEntityWbfsysCustomComment();
    $data['embed_comment'] = $this->getEntityEmbedComment( $data['wbfsys_custom_comment'] );


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




      if( !$fieldsWbfsysCustomComment = $this->getRegisterd( 'search_fields_wbfsys_custom_comment' ) )
      {
         $fieldsWbfsysCustomComment   = $orm->getSearchCols( 'WbfsysCustomComment' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_custom_comment' ) )
      {
        $fieldsWbfsysCustomComment = array_unique( array_merge
        (
          $fieldsWbfsysCustomComment,
          $refs
        ));
      }

      $filterWbfsysCustomComment     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysCustomComment', $fieldsWbfsysCustomComment ),
        $orm->getErrorMessages( 'WbfsysCustomComment'  ),
        'search_wbfsys_custom_comment'
      );
      $condition['wbfsys_custom_comment'] = $filterWbfsysCustomComment->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_custom_comment']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_custom_comment']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_custom_comment']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_custom_comment']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_custom_comment']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_custom_comment}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_custom_comment']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_custom_comment']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_custom_comment', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_custom_comment']['m_uuid'] = $mUuid;

      if
      (
        !$fieldsWbfsysComment
          = $this->getRegisterd( 'search_fields_wbfsys_comment' )
      )
      {
        $fieldsWbfsysComment    = $orm->getSearchCols( 'WbfsysComment' );
      }

      $filterWbfsysComment      = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysComment', $fieldsWbfsysComment ),
        $orm->getErrorMessages ( 'WbfsysComment' ),
        'search_wbfsys_comment'
      );
      $condition['wbfsys_comment'] = $filterWbfsysComment->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_comment', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_comment']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_comment', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_comment']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_comment', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_comment']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_comment', Validator::DATE , 'm_time_created_after' ) )
        $condition['wbfsys_comment']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_comment', Validator::DATE, 'm_time_changed_before'  ) )
        $condition['wbfsys_comment']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_comment', Validator::DATE, 'm_time_changed_after'  ) )
        $condition['wbfsys_comment']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_comment', Validator::EID, 'm_rowid' ) )
        $condition['wbfsys_comment']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_comment', Validator::TEXT, 'm_uuid' ) )
        $condition['wbfsys_comment']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysCustomComment_Table' );
    $query->extendedConditions = $extendedConditions;


    if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysCustomComment_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_custom_comment.rowid NOT IN '
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


    //entity wbfsys_custom_comment
    if( !$entityWbfsysCustomComment = $this->getRegisterd( 'entityWbfsysCustomComment' ) )
    {
      $entityWbfsysCustomComment   = new WbfsysCustomComment_Entity() ;
    }

    $formWbfsysCustomComment    = $view->newForm( 'WbfsysCustomComment' );
    $formWbfsysCustomComment->setNamespace( 'WbfsysCustomComment' );
    $formWbfsysCustomComment->setPrefix( 'WbfsysCustomComment' );
    $formWbfsysCustomComment->createSearchForm
    (
      $entityWbfsysCustomComment,
      ( isset($searchFields['wbfsys_custom_comment'])?$searchFields['wbfsys_custom_comment']:array() )
    );

    // management wbfsys_comment source wbfsys_comment
    if(!$entityWbfsysComment = $this->getRegisterd( 'entityWbfsysComment' ) )
    {
      $entityWbfsysComment   =  new WbfsysComment_Entity() ;
    }

    $formWbfsysComment    = $view->newForm( 'WbfsysComment' );
    $formWbfsysComment->setNamespace( 'WbfsysCustomComment' );
    $formWbfsysComment->setPrefix( 'WbfsysComment' );
    $formWbfsysComment->createSearchForm
    (
      $entityWbfsysComment,
      ( isset($searchFields['wbfsys_comment'])?$searchFields['wbfsys_comment']:array() )
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
      'wbfsys_comment' => array
      (
        'title',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysCustomComment_Table_Model

