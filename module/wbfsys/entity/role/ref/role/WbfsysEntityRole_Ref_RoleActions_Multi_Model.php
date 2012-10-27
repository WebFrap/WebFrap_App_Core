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
class WbfsysEntityRole_Ref_RoleActions_Multi_Model
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
      if(!$listRoleActions = $this->getRegisterd('listRefRoleActions'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listRoleActions was not registered'
        );
      }

      foreach( $listRoleActions as $entityWbfsysEntityRole )
      {
        if(!$orm->save( $entityWbfsysEntityRole) )
        {
          $entityText = $entityWbfsysEntityRole->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Entity Role '.$entityText,
              'wbfsys.entity_role.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityText = $entityWbfsysEntityRole->text();
          $this->getResponse()->addMessage
          (
            $view->i18n->l
            (
              'Successfully saved Entity Role '.$entityText,
              'wbfsys.entity_role.message',
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
      $this->getResponse()->addError($e->getMessage());
      $db->rollback();
    }
    catch( Model_Exception $e )
    {
      $this->getResponse()->addError($e->getMessage());
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
      if(!$listRoleActions = $this->getRegisterd('listRefRoleActions'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listRoleActions was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listRoleActions as $entityWbfsysEntityRole )
      {
        if(!$orm->update( $entityWbfsysEntityRole) )
        {
          $entityText = $entityWbfsysEntityRole->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Entity Role '.$entityText,
              'wbfsys.entity_role.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityTexts[] = $entityWbfsysEntityRole->text();
        }
      }

      $textSaved = implode($entityTexts,', ');
      $this->getResponse()->addMessage
      (
        $view->i18n->l
        (
          'Successfully saved Entity Role: '.$textSaved,
          'wbfsys.entity_role.message',
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

      //entity WbfsysEntityRoleActions
      if( !$params->fieldsWbfsysEntityRoleActions )
      {
        if( isset($fields['wbfsys_entity_role_actions']) )
          $params->fieldsWbfsysEntityRoleActions = $fields['wbfsys_entity_role_actions'];
        else
          $params->fieldsWbfsysEntityRoleActions = array();
      }

      // if the validation fails report
      $listWbfsysEntityRoleActions = $httpRequest->validateMultiInsert
      (
        'WbfsysEntityRoleActions',
        'wbfsys_entity_role_actions',
        $params->fieldsWbfsysEntityRoleActions
      );

      $this->register('listRefRoleActions',$listWbfsysEntityRoleActions);
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

      //entity WbfsysEntityRoleActions
      if( !$params->fieldsWbfsysEntityRoleActions )
      {
        if( isset($fields['wbfsys_entity_role_actions']) )
          $params->fieldsWbfsysEntityRoleActions = $fields['wbfsys_entity_role_actions'];
        else
          $params->fieldsWbfsysEntityRoleActions = array();
      }

      // if the validation fails report
      $listWbfsysEntityRoleActions = $httpRequest->validateMultiUpdate
      (
        'WbfsysEntityRoleActions',
        'wbfsys_entity_role_actions',
        $params->fieldsWbfsysEntityRoleActions
      );

      $this->register('listRefRoleActions',$listWbfsysEntityRoleActions);
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

      if( !$params->fieldsWbfsysEntityRole )
        $params->fieldsWbfsysEntityRole  = $orm->getCols('WbfsysEntityRole',$params->categories);

      // if the validation fails report
      $listWbfsysEntityRole = $httpRequest->validateMultiSave
      (
        'WbfsysEntityRole',
        'wbfsys_entity_role',
        $params->fieldsWbfsysEntityRole
      );

      $this->register('listWbfsysEntityRole',$listWbfsysEntityRole);
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

}//end class WbfsysEntityRole_Ref_RoleActions_Multi_Model

