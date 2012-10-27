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
class WbfsysProfile_Ref_Quicklinks_Multi_Model
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
      if(!$listQuicklinks = $this->getRegisterd('listRefQuicklinks'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listQuicklinks was not registered'
        );
      }

      foreach( $listQuicklinks as $entityWbfsysProfile )
      {
        if(!$orm->save( $entityWbfsysProfile) )
        {
          $entityText = $entityWbfsysProfile->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Profiles '.$entityText,
              'wbfsys.profile.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityText = $entityWbfsysProfile->text();
          $this->getResponse()->addMessage
          (
            $view->i18n->l
            (
              'Successfully saved Profiles '.$entityText,
              'wbfsys.profile.message',
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
      if(!$listQuicklinks = $this->getRegisterd('listRefQuicklinks'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listQuicklinks was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listQuicklinks as $entityWbfsysProfile )
      {
        if(!$orm->update( $entityWbfsysProfile) )
        {
          $entityText = $entityWbfsysProfile->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Profiles '.$entityText,
              'wbfsys.profile.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityTexts[] = $entityText = $entityWbfsysProfile->text();
        }
      }

      $textSaved = implode($entityTexts,', ');
      $this->getResponse()->addMessage
      (
        $view->i18n->l
        (
          'Successfully saved Profiles: '.$textSaved,
          'wbfsys.profile.message',
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

      //entity WbfsysProfileQuicklink
      if( !$params->fieldsWbfsysProfileQuicklink )
      {
        if( isset($fields['wbfsys_profile_quicklink']) )
          $params->fieldsWbfsysProfileQuicklink = $fields['wbfsys_profile_quicklink'];
        else
          $params->fieldsWbfsysProfileQuicklink = array();
      }

      // if the validation fails report
      $listWbfsysProfileQuicklink = $httpRequest->validateMultiInsert
      (
        'WbfsysProfileQuicklink',
        'wbfsys_profile_quicklink',
        $params->fieldsWbfsysProfileQuicklink
      );

      $this->register('listRefQuicklinks',$listWbfsysProfileQuicklink);
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

      //entity WbfsysProfileQuicklink
      if( !$params->fieldsWbfsysProfileQuicklink )
      {
        if( isset($fields['wbfsys_profile_quicklink']) )
          $params->fieldsWbfsysProfileQuicklink = $fields['wbfsys_profile_quicklink'];
        else
          $params->fieldsWbfsysProfileQuicklink = array();
      }

      // if the validation fails report
      $listWbfsysProfileQuicklink = $httpRequest->validateMultiUpdate
      (
        'WbfsysProfileQuicklink',
        'wbfsys_profile_quicklink',
        $params->fieldsWbfsysProfileQuicklink
      );

      $this->register('listRefQuicklinks',$listWbfsysProfileQuicklink);
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

      if( !$params->fieldsWbfsysProfile )
        $params->fieldsWbfsysProfile  = $orm->getCols('WbfsysProfile',$params->categories);

      // if the validation fails report
      $listWbfsysProfile = $httpRequest->validateMultiSave
      (
        'WbfsysProfile',
        'wbfsys_profile',
        $params->fieldsWbfsysProfile
      );

      $this->register('listWbfsysProfile',$listWbfsysProfile);
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

}//end class WbfsysProfile_Ref_Quicklinks_Multi_Model

