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
class WbfsysTask_Ref_Comments_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityComment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityComment( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityComment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityComment(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityComment_Entity
  */
  public function getEntityWbfsysEntityComment( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityComment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityComment = $this->getRegisterd( 'entityWbfsysEntityComment' );


    //entity wbfsys_entity_comment
    if( !$entityWbfsysEntityComment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityComment = $orm->get( 'WbfsysEntityComment', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitycomment with this id '.$objid,
              'wbfsys.entity_comment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityComment', $entityWbfsysEntityComment );
        $this->register( 'main_entity', $entityWbfsysEntityComment );

      }
      else
      {
        $entityWbfsysEntityComment   = new WbfsysEntityComment_Entity() ;
        $this->register( 'entityWbfsysEntityComment', $entityWbfsysEntityComment );
        $this->register( 'main_entity', $entityWbfsysEntityComment );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityComment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityComment = $orm->get( 'WbfsysEntityComment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitycomment with this id '.$objid,
            'wbfsys.entity_comment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityComment', $entityWbfsysEntityComment );
      $this->register( 'main_entity', $entityWbfsysEntityComment );
    }

    return $entityWbfsysEntityComment;

  }//end public function getEntityWbfsysEntityComment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityComment_Entity $entity
  */
  public function setEntityWbfsysEntityComment( $entity )
  {

    $this->register( 'entityWbfsysEntityComment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityComment */

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

    //entity wbfsys_entity_comment
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
              'wbfsys.entity_comment.message'
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
            'wbfsys.entity_comment.message'
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
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysComment_Entity
  */
  public function getEntityWbfsysComment( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysComment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysComment = $this->getRegisterd( 'entityWbfsysComment' );

    //entity wbfsys_comment
    if( !$entityWbfsysComment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysComment = $orm->get( 'WbfsysComment', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsyscomment with this id '.$objid,
              'wbfsys.comment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysComment', $entityWbfsysComment );
        $this->register( 'main_entity', $entityWbfsysComment );

      }
      else
      {
        $entityWbfsysComment   = new WbfsysComment_Entity() ;
        $this->register( 'entityWbfsysComment', $entityWbfsysComment );
        $this->register( 'main_entity', $entityWbfsysComment );
      }

    }
    elseif( $objid && $objid != $entityWbfsysComment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysComment = $orm->get( 'WbfsysComment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsyscomment with this id '.$objid,
            'wbfsys.comment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysComment', $entityWbfsysComment );
      $this->register( 'main_entity', $entityWbfsysComment );
    }

    return $entityWbfsysComment;

  }//end public function getEntityWbfsysComment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysComment_Entity $entity
  */
  public function setEntityWbfsysComment( $entity )
  {

    $this->register( 'entityWbfsysComment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysComment */

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

    $data['wbfsys_entity_comment']  = $this->getEntityWbfsysEntityComment();
    $data['embed_comment'] = $this->getEntityEmbedComment( $data['wbfsys_entity_comment'] );
    $data['wbfsys_comment']  = $this->getEntityWbfsysComment( $data['wbfsys_entity_comment']->id_comment );


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
   * table to list all connected WbfsysTask
   *
   * @param int $idWbfsysTask the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysTask, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysComment_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_comment with the expected source wbfsys_comment'
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

    if( !$fieldsWbfsysEntityComment = $this->getRegisterd( 'search_fields_wbfsys_entity_comment' ) )
    {
       $fieldsWbfsysEntityComment   = $orm->getSearchCols( 'WbfsysEntityComment' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_comment' ) )
    {
      $fieldsWbfsysEntityComment = array_unique( array_merge
      (
        $fieldsWbfsysEntityComment,
        $refs
      ));
    }

    $filterWbfsysEntityComment     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityComment', $fieldsWbfsysEntityComment ),
      $orm->getErrorMessages( 'WbfsysEntityComment'  ),
      'search_wbfsys_entity_comment'
    );
    $condition['wbfsys_entity_comment'] = $filterWbfsysEntityComment->getData();

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




    // create a new query object
    $query = $db->newQuery( 'WbfsysTask_Ref_Comments_Table' );
    /* @var $query WbfsysTask_Ref_Comments_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_entity_comment.vid = '.$idWbfsysTask );
    
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

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysTask_Ref_Comments_Table_Model

