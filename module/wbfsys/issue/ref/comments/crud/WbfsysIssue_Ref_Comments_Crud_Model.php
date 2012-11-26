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
class WbfsysIssue_Ref_Comments_Crud_Model
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

////////////////////////////////////////////////////////////////////////////////
// crud methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * insert an entity
   * this method fetchs the activ entity from the registry an tries to
   * insert it at the database
   * all connected entities will be added too
   *
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function insert( $params )
  {

    $orm       = $this->getOrm();
    $view      = $this->getView();
    $response  = $this->getResponse();

    try
    {
      if( !$entityWbfsysEntityComment = $this->getEntityWbfsysEntityComment() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysEntityComment was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysEntityComment ) )
      {

        $entityText = $entityWbfsysEntityComment->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Entity Comment {@label@}',
            'wbfsys.issue.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysEntityComment->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Entity Comment {@label@}',
            'wbfsys.issue.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Entity Comment: '.$entityText,
          'create',
          $entityWbfsysEntityComment
        );


      }

    }
    catch( LibDb_Exception $e )
    {

      $response->addError($e->getMessage());
    }
    catch( Model_Exception $e )
    {

      $response->addError($e->getMessage());
    }

    return !$this->getResponse()->hasErrors();

  }//end public function insert */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchConnectData( $params )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      //management  wbfsys_entity_comment source wbfsys_entity_comment
      $entityWbfsysEntityComment = $orm->newEntity( 'WbfsysEntityComment' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysEntityComment,
        'wbfsys_entity_comment',
        array( 'id_comment', 'vid' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysEntityComment', $entityWbfsysEntityComment );


      return !$this->getResponse()->hasErrors();
    }
    catch( InvalidInput_Exception $e )
    {
      return null;
    }

  }//end public function fetchConnectData */

////////////////////////////////////////////////////////////////////////////////
// check methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * check if the reference allready exists
   * @param Entity $entity
   * @return boolean
   */
  public function checkUnique( $entity = null )
  {

    $orm = $this->getOrm();

    if(!$entity)
      $entity =  $this->getRegisterd('entityWbfsysEntityComment');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_comment', 'vid' )
    );

  }//end public function checkUnique */

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'wbfsys_entity_comment' => array
      (
        'm_version',
        'vid',
        'id_comment',
      ),
      'wbfsys_comment' => array
      (
      ),
      'embed_comment' => array
      (
        'title',
        'content',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysIssue_Ref_Comments_Crud_Model

