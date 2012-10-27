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
class WbfsysManagement_Ref_Mask_Multi_Model
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
      if(!$listMask = $this->getRegisterd('listRefMask'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMask was not registered'
        );
      }

      foreach( $listMask as $entityWbfsysManagement )
      {
        if(!$orm->save( $entityWbfsysManagement) )
        {
          $entityText = $entityWbfsysManagement->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Management Node '.$entityText,
              'wbfsys.management.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityText = $entityWbfsysManagement->text();
          $this->getResponse()->addMessage
          (
            $view->i18n->l
            (
              'Successfully saved Management Node '.$entityText,
              'wbfsys.management.message',
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
      if(!$listMask = $this->getRegisterd('listRefMask'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMask was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMask as $entityWbfsysManagement )
      {
        if(!$orm->update( $entityWbfsysManagement) )
        {
          $entityText = $entityWbfsysManagement->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Management Node '.$entityText,
              'wbfsys.management.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityTexts[] = $entityText = $entityWbfsysManagement->text();
        }
      }

      $textSaved = implode($entityTexts,', ');
      $this->getResponse()->addMessage
      (
        $view->i18n->l
        (
          'Successfully saved Management Node: '.$textSaved,
          'wbfsys.management.message',
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

      //entity WbfsysMask
      if( !$params->fieldsWbfsysMask )
      {
        if( isset($fields['wbfsys_mask']) )
          $params->fieldsWbfsysMask = $fields['wbfsys_mask'];
        else
          $params->fieldsWbfsysMask = array();
      }

      // if the validation fails report
      $listWbfsysMask = $httpRequest->validateMultiInsert
      (
        'WbfsysMask',
        'wbfsys_mask',
        $params->fieldsWbfsysMask
      );

      $this->register('listRefMask',$listWbfsysMask);
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

      //entity WbfsysMask
      if( !$params->fieldsWbfsysMask )
      {
        if( isset($fields['wbfsys_mask']) )
          $params->fieldsWbfsysMask = $fields['wbfsys_mask'];
        else
          $params->fieldsWbfsysMask = array();
      }

      // if the validation fails report
      $listWbfsysMask = $httpRequest->validateMultiUpdate
      (
        'WbfsysMask',
        'wbfsys_mask',
        $params->fieldsWbfsysMask
      );

      $this->register('listRefMask',$listWbfsysMask);
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

      if( !$params->fieldsWbfsysManagement )
        $params->fieldsWbfsysManagement  = $orm->getCols('WbfsysManagement',$params->categories);

      // if the validation fails report
      $listWbfsysManagement = $httpRequest->validateMultiSave
      (
        'WbfsysManagement',
        'wbfsys_management',
        $params->fieldsWbfsysManagement
      );

      $this->register('listWbfsysManagement',$listWbfsysManagement);
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

}//end class WbfsysManagement_Ref_Mask_Multi_Model

