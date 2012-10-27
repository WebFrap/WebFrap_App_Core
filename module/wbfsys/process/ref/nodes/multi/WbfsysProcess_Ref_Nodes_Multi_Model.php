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
class WbfsysProcess_Ref_Nodes_Multi_Model
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
      if(!$listNodes = $this->getRegisterd('listRefNodes'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listNodes was not registered'
        );
      }

      foreach( $listNodes as $entityWbfsysProcess )
      {
        if(!$orm->save( $entityWbfsysProcess) )
        {
          $entityText = $entityWbfsysProcess->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Process '.$entityText,
              'wbfsys.process.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityText = $entityWbfsysProcess->text();
          $this->getResponse()->addMessage
          (
            $view->i18n->l
            (
              'Successfully saved Process '.$entityText,
              'wbfsys.process.message',
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
      if(!$listNodes = $this->getRegisterd('listRefNodes'))
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listNodes was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listNodes as $entityWbfsysProcess )
      {
        if(!$orm->update( $entityWbfsysProcess) )
        {
          $entityText = $entityWbfsysProcess->text();
          $this->getResponse()->addError
          (
            $view->i18n->l
            (
              'Failed to save Process '.$entityText,
              'wbfsys.process.message',
              array($entityText)
            )
          );
        }
        else
        {
          $entityTexts[] = $entityText = $entityWbfsysProcess->text();
        }
      }

      $textSaved = implode($entityTexts,', ');
      $this->getResponse()->addMessage
      (
        $view->i18n->l
        (
          'Successfully saved Process: '.$textSaved,
          'wbfsys.process.message',
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

      //entity WbfsysProcessNode
      if( !$params->fieldsWbfsysProcessNode )
      {
        if( isset($fields['wbfsys_process_node']) )
          $params->fieldsWbfsysProcessNode = $fields['wbfsys_process_node'];
        else
          $params->fieldsWbfsysProcessNode = array();
      }

      // if the validation fails report
      $listWbfsysProcessNode = $httpRequest->validateMultiInsert
      (
        'WbfsysProcessNode',
        'wbfsys_process_node',
        $params->fieldsWbfsysProcessNode
      );

      $this->register('listRefNodes',$listWbfsysProcessNode);
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

      //entity WbfsysProcessNode
      if( !$params->fieldsWbfsysProcessNode )
      {
        if( isset($fields['wbfsys_process_node']) )
          $params->fieldsWbfsysProcessNode = $fields['wbfsys_process_node'];
        else
          $params->fieldsWbfsysProcessNode = array();
      }

      // if the validation fails report
      $listWbfsysProcessNode = $httpRequest->validateMultiUpdate
      (
        'WbfsysProcessNode',
        'wbfsys_process_node',
        $params->fieldsWbfsysProcessNode
      );

      $this->register('listRefNodes',$listWbfsysProcessNode);
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

      if( !$params->fieldsWbfsysProcess )
        $params->fieldsWbfsysProcess  = $orm->getCols('WbfsysProcess',$params->categories);

      // if the validation fails report
      $listWbfsysProcess = $httpRequest->validateMultiSave
      (
        'WbfsysProcess',
        'wbfsys_process',
        $params->fieldsWbfsysProcess
      );

      $this->register('listWbfsysProcess',$listWbfsysProcess);
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

}//end class WbfsysProcess_Ref_Nodes_Multi_Model

