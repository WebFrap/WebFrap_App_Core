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
class WbfsysRoleUser_Ref_UserProfiles_Multi_Model
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
      if(!$listUserProfiles = $this->getRegisterd('listRefUserProfiles'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listUserProfiles was not registered'
        );
      }

      foreach( $listUserProfiles as $entityWbfsysRoleUser )
      {
        if(!$orm->save( $entityWbfsysRoleUser) )
        {
          $entityText = $entityWbfsysRoleUser->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save System User '.$entityText,
              'wbfsys.role_user.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityText = $entityWbfsysRoleUser->text();
          $this->getResponse()->addMessage
          (
            $view->i18n->l
            (
              'Successfully saved System User '.$entityText,
              'wbfsys.role_user.message',
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
      if(!$listUserProfiles = $this->getRegisterd('listRefUserProfiles'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listUserProfiles was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listUserProfiles as $entityWbfsysRoleUser )
      {
        if(!$orm->update( $entityWbfsysRoleUser) )
        {
          $entityText = $entityWbfsysRoleUser->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save System User '.$entityText,
              'wbfsys.role_user.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityTexts[] = $entityWbfsysRoleUser->text();
        }
      }

      $textSaved = implode($entityTexts,', ');
      $this->getResponse()->addMessage
      (
        $view->i18n->l
        (
          'Successfully saved System User: '.$textSaved,
          'wbfsys.role_user.message',
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

      //entity WbfsysUserProfiles
      if( !$params->fieldsWbfsysUserProfiles )
      {
        if( isset($fields['wbfsys_user_profiles']) )
          $params->fieldsWbfsysUserProfiles = $fields['wbfsys_user_profiles'];
        else
          $params->fieldsWbfsysUserProfiles = array();
      }

      // if the validation fails report
      $listWbfsysUserProfiles = $httpRequest->validateMultiInsert
      (
        'WbfsysUserProfiles',
        'wbfsys_user_profiles',
        $params->fieldsWbfsysUserProfiles
      );

      $this->register('listRefUserProfiles',$listWbfsysUserProfiles);
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

      //entity WbfsysUserProfiles
      if( !$params->fieldsWbfsysUserProfiles )
      {
        if( isset($fields['wbfsys_user_profiles']) )
          $params->fieldsWbfsysUserProfiles = $fields['wbfsys_user_profiles'];
        else
          $params->fieldsWbfsysUserProfiles = array();
      }

      // if the validation fails report
      $listWbfsysUserProfiles = $httpRequest->validateMultiUpdate
      (
        'WbfsysUserProfiles',
        'wbfsys_user_profiles',
        $params->fieldsWbfsysUserProfiles
      );

      $this->register('listRefUserProfiles',$listWbfsysUserProfiles);
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

      if( !$params->fieldsWbfsysRoleUser )
        $params->fieldsWbfsysRoleUser  = $orm->getCols('WbfsysRoleUser',$params->categories);

      // if the validation fails report
      $listWbfsysRoleUser = $httpRequest->validateMultiSave
      (
        'WbfsysRoleUser',
        'wbfsys_role_user',
        $params->fieldsWbfsysRoleUser
      );

      $this->register('listWbfsysRoleUser',$listWbfsysRoleUser);
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

}//end class WbfsysRoleUser_Ref_UserProfiles_Multi_Model

