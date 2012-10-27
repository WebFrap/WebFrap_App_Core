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
class WbfsysEntity_Ref_Managements_Multi_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// crud methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param TFlag $params named parameters
   * @return void
   */
  public function save( $params   )
  {

    $orm = $this->getOrm();
    $db  = $this->getDb();
    $view = $this->getView();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if(!$listManagements = $this->getRegisterd('listRefManagements'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listManagements was not registered'
        );
      }

      foreach( $listManagements as $entityWbfsysEntity )
      {
        if(!$orm->save( $entityWbfsysEntity) )
        {
          $entityText = $entityWbfsysEntity->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Entity '.$entityText,
              'wbfsys.entity.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityText = $entityWbfsysEntity->text();
          $this->getResponse()->addMessage
          (
            $view->i18n->l
            (
              'Successfully saved Entity '.$entityText,
              'wbfsys.entity.message',
              array($entityText)
            )
          );
        }
      }

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $this->getResponse()->addError( $e->getMessage() );
      $db->rollback();
    }
    catch( Model_Exception $e )
    {
      $this->getResponse()->addError( $e->getMessage() );
    }

    // check if there were any errors, if not fine
    return !$this->getResponse()->hasErrors();

  }//end public function save */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param TFlag $params named parameters
   * @return void
   */
  public function update( $params   )
  {

    $orm = $this->getOrm();
    $db  = $this->getDb();
    $view = $this->getView();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if(!$listManagements = $this->getRegisterd('listRefManagements'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listManagements was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listManagements as $entityWbfsysEntity )
      {
        if(!$orm->update( $entityWbfsysEntity) )
        {
          $entityText = $entityWbfsysEntity->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Entity '.$entityText,
              'wbfsys.entity.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityTexts[] = $entityText = $entityWbfsysEntity->text();
        }
      }

      $textSaved = implode($entityTexts,', ');
      $this->getResponse()->addMessage
      (
        $view->i18n->l
        (
          'Successfully saved Entity: '.$textSaved,
          'wbfsys.entity.message',
          array($textSaved)
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $this->getResponse()->addError( $e->getMessage() );
      $db->rollback();
    }
    catch( Model_Exception $e )
    {
      $this->getResponse()->addError( $e->getMessage() );
    }

    // check if there were any errors, if not fine
    return !$this->getResponse()->hasErrors();

  }//end public function update */

  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchInsertData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view = $this->getView();

    try
    {

      $fields = $this->getFields();

      //entity WbfsysManagement
      if( !$params->fieldsWbfsysManagement )
      {
        if( isset($fields['wbfsys_management']) )
          $params->fieldsWbfsysManagement = $fields['wbfsys_management'];
        else
          $params->fieldsWbfsysManagement = array();
      }

      // if the validation fails report
      $listWbfsysManagement = $httpRequest->validateMultiInsert
      (
        'WbfsysManagement',
        'wbfsys_management',
        $params->fieldsWbfsysManagement
      );

      $this->register('listRefManagements',$listWbfsysManagement);
      return true;

    }
    catch( InvalidInput_Exception $e )
    {
      return false;
    }

  }//end public function fetchInsertData */

  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchUpdateData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      $fields = $this->getFields();

      //entity WbfsysManagement
      if( !$params->fieldsWbfsysManagement )
      {
        if( isset($fields['wbfsys_management']) )
          $params->fieldsWbfsysManagement = $fields['wbfsys_management'];
        else
          $params->fieldsWbfsysManagement = array();
      }

      // if the validation fails report
      $listWbfsysManagement = $httpRequest->validateMultiUpdate
      (
        'WbfsysManagement',
        'wbfsys_management',
        $params->fieldsWbfsysManagement
      );

      $this->register('listRefManagements',$listWbfsysManagement);
      return true;

    }
    catch( InvalidInput_Exception $e )
    {
      return false;
    }

  }//end public function fetchUpdateData */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchSaveData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsWbfsysEntity )
        $params->fieldsWbfsysEntity  = $orm->getCols('WbfsysEntity',$params->categories);

      // if the validation fails report
      $listWbfsysEntity = $httpRequest->validateMultiSave
      (
        'WbfsysEntity',
        'wbfsys_entity',
        $params->fieldsWbfsysEntity
      );

      $this->register('listWbfsysEntity',$listWbfsysEntity);
      return true;

    }
    catch( InvalidInput_Exception $e )
    {
      return false;
    }

  }//end public function fetchSaveData */

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getFields()
  {

    return array
    (

    );

  }//end public function getFields */

}//end class WbfsysEntity_Ref_Managements_Multi_Model

