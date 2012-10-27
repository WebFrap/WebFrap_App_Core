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
class WbfsysKnowHowNode_Multi_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// persist methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiSave( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listWbfsysKnowHowNode = $this->getRegisterd( 'listWbfsysKnowHowNode' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysKnowHowNode was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysKnowHowNode as $entityWbfsysKnowHowNode )
      {
        
        if( $entityWbfsysKnowHowNode->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysKnowHowNode_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysKnowHowNode );
            
            if( !$accessDataset->insert )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to insert new entries in {@resource@}',
                  'wbf.message',
                  array
                  (
                    'resource'  => $response->i18n->l
                    ( 
                      'Know How Node', 
                      'wbfsys.know_how_node.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysKnowHowNode ) )
          {
            $entityText = $entityWbfsysKnowHowNode->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Know How Node {@text@}',
                'wbfsys.know_how_node.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysKnowHowNode->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysKnowHowNode_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysKnowHowNode );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Know How Node {@text@}',
                  'wbfsys.know_how_node.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysKnowHowNode ) )
          {
            $entityText = $entityWbfsysKnowHowNode->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Know How Node {@text@}',
                'wbfsys.know_how_node.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysKnowHowNode->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Know How Node: {@text@}',
          'wbfsys.know_how_node.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {


      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {


      return $e;
    }



    
    // check if there were any errors, if not fine
    return null;

  }//end public function multiSave */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiInsert( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listWbfsysKnowHowNode = $this->getRegisterd( 'listWbfsysKnowHowNode' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysKnowHowNode was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysKnowHowNode as $entityWbfsysKnowHowNode )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysKnowHowNode_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysKnowHowNode );
          
          if( !$accessDataset->insert )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to insert new entries in {@resource@}',
                'wbf.message',
                array
                (
                  'resource'  => $response->i18n->l
                  ( 
                    'Know How Node', 
                    'wbfsys.know_how_node.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysKnowHowNode ) )
        {
          $entityText = $entityWbfsysKnowHowNode->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Know How Node {@text@}',
              'wbfsys.know_how_node.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysKnowHowNode->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Know How Node: {@text@}',
          'wbfsys.know_how_node.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {
      return $e;
    }

    // check if there were any errors, if not fine
    return null;

  }//end public function multiInsert */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiUpdate( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listWbfsysKnowHowNode = $this->getRegisterd( 'listWbfsysKnowHowNode' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysKnowHowNode was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysKnowHowNode as $entityWbfsysKnowHowNode )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysKnowHowNode_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysKnowHowNode );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Know How Node {@text@}',
                'wbfsys.know_how_node.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysKnowHowNode ) )
        {
          $entityText = $entityWbfsysKnowHowNode->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Know How Node {@text@}',
              'wbfsys.know_how_node.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysKnowHowNode->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Know How Node: {@text@}',
          'wbfsys.know_how_node.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {
      return $e;
    }

    // check if there were any errors, if not fine
    return null;

  }//end public function multiUpdate */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param WbfsysKnowHowNode_Multi_Access_Delete $access
   * @param array $deleteIds
   * @param TFlag $params named parameters
   *
   * @return boolean
   */
  public function multiDelete( $access, $deleteIds, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();


      $entityTexts = array();
      
      $listWbfsysKnowHowNode = $orm->getByIds( 'WbfsysKnowHowNode', $deleteIds );

      foreach( $listWbfsysKnowHowNode as $entityWbfsysKnowHowNode )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysKnowHowNode_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysKnowHowNode );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Know How Node {@text@}',
                'wbfsys.know_how_node.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysKnowHowNode ) )
        {
          $entityText = $entityWbfsysKnowHowNode->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Know How Node {@text@}',
              'wbfsys.know_how_node.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysKnowHowNode->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Know How Node: {@text@}',
          'wbfsys.know_how_node.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {


      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {


      return $e;
    }



    // check if there were any errors, if not fine
    return null;

  }//end public function multiDelete */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiSaveData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsWbfsysKnowHowNode )
        $params->fieldsWbfsysKnowHowNode  = $orm->getCols( 'WbfsysKnowHowNode', $params->categories );

      // if the validation fails report
      $listWbfsysKnowHowNode = $httpRequest->validateMultiSave
      (
        'WbfsysKnowHowNode',
        'wbfsys_know_how_node',
        $params->fieldsWbfsysKnowHowNode
      );

      $this->register( 'listWbfsysKnowHowNode', $listWbfsysKnowHowNode );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiSaveData */

  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiInsertData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( $params->fieldsWbfsysKnowHowNode )
      {
        $params->fieldsWbfsysKnowHowNode = $orm->getCols
        (
          'WbfsysKnowHowNode',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysKnowHowNode = $httpRequest->validateMultiInsert
      (
        'WbfsysKnowHowNode',
        'wbfsys_know_how_node',
        $params->fieldsWbfsysKnowHowNode
      );

      $this->register( 'listWbfsysKnowHowNode', $listWbfsysKnowHowNode );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiInsertData */

  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiUpdateData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsWbfsysKnowHowNode )
        $params->fieldsWbfsysKnowHowNode  = $orm->getCols( 'WbfsysKnowHowNode', $params->categories );

      // if the validation fails report
      $listWbfsysKnowHowNode = $httpRequest->validateMultiUpdate
      (
        'WbfsysKnowHowNode',
        'wbfsys_know_how_node',
        $params->fieldsWbfsysKnowHowNode
      );

      $this->register( 'listWbfsysKnowHowNode', $listWbfsysKnowHowNode );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiUpdateData */

  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiDelete( $params  )
  {

    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $deleteIds = $request->data( 'delid', Validator::INT );
    
    return $deleteIds;

  }//end public function fetchMultiDelete */

}//end class WbfsysKnowHowNode_Multi_Model

