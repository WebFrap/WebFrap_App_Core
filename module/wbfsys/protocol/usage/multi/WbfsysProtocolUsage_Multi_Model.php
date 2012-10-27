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
class WbfsysProtocolUsage_Multi_Model
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
      if( !$listWbfsysProtocolUsage = $this->getRegisterd( 'listWbfsysProtocolUsage' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProtocolUsage was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProtocolUsage as $entityWbfsysProtocolUsage )
      {
        
        if( $entityWbfsysProtocolUsage->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysProtocolUsage_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProtocolUsage );
            
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
                      'Protocol Usage', 
                      'wbfsys.protocol_usage.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysProtocolUsage ) )
          {
            $entityText = $entityWbfsysProtocolUsage->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Protocol Usage {@text@}',
                'wbfsys.protocol_usage.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysProtocolUsage->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysProtocolUsage_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProtocolUsage );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Protocol Usage {@text@}',
                  'wbfsys.protocol_usage.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysProtocolUsage ) )
          {
            $entityText = $entityWbfsysProtocolUsage->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Protocol Usage {@text@}',
                'wbfsys.protocol_usage.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysProtocolUsage->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Protocol Usage: {@text@}',
          'wbfsys.protocol_usage.message',
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
      if( !$listWbfsysProtocolUsage = $this->getRegisterd( 'listWbfsysProtocolUsage' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProtocolUsage was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProtocolUsage as $entityWbfsysProtocolUsage )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysProtocolUsage_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProtocolUsage );
          
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
                    'Protocol Usage', 
                    'wbfsys.protocol_usage.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysProtocolUsage ) )
        {
          $entityText = $entityWbfsysProtocolUsage->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Protocol Usage {@text@}',
              'wbfsys.protocol_usage.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysProtocolUsage->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Protocol Usage: {@text@}',
          'wbfsys.protocol_usage.message',
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
      if( !$listWbfsysProtocolUsage = $this->getRegisterd( 'listWbfsysProtocolUsage' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProtocolUsage was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProtocolUsage as $entityWbfsysProtocolUsage )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysProtocolUsage_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProtocolUsage );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Protocol Usage {@text@}',
                'wbfsys.protocol_usage.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysProtocolUsage ) )
        {
          $entityText = $entityWbfsysProtocolUsage->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Protocol Usage {@text@}',
              'wbfsys.protocol_usage.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysProtocolUsage->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Protocol Usage: {@text@}',
          'wbfsys.protocol_usage.message',
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
   * @param WbfsysProtocolUsage_Multi_Access_Delete $access
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
      
      $listWbfsysProtocolUsage = $orm->getByIds( 'WbfsysProtocolUsage', $deleteIds );

      foreach( $listWbfsysProtocolUsage as $entityWbfsysProtocolUsage )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysProtocolUsage_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProtocolUsage );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Protocol Usage {@text@}',
                'wbfsys.protocol_usage.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysProtocolUsage ) )
        {
          $entityText = $entityWbfsysProtocolUsage->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Protocol Usage {@text@}',
              'wbfsys.protocol_usage.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysProtocolUsage->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Protocol Usage: {@text@}',
          'wbfsys.protocol_usage.message',
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

      if( !$params->fieldsWbfsysProtocolUsage )
        $params->fieldsWbfsysProtocolUsage  = $orm->getCols( 'WbfsysProtocolUsage', $params->categories );

      // if the validation fails report
      $listWbfsysProtocolUsage = $httpRequest->validateMultiSave
      (
        'WbfsysProtocolUsage',
        'wbfsys_protocol_usage',
        $params->fieldsWbfsysProtocolUsage
      );

      $this->register( 'listWbfsysProtocolUsage', $listWbfsysProtocolUsage );
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

      if( $params->fieldsWbfsysProtocolUsage )
      {
        $params->fieldsWbfsysProtocolUsage = $orm->getCols
        (
          'WbfsysProtocolUsage',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysProtocolUsage = $httpRequest->validateMultiInsert
      (
        'WbfsysProtocolUsage',
        'wbfsys_protocol_usage',
        $params->fieldsWbfsysProtocolUsage
      );

      $this->register( 'listWbfsysProtocolUsage', $listWbfsysProtocolUsage );
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

      if( !$params->fieldsWbfsysProtocolUsage )
        $params->fieldsWbfsysProtocolUsage  = $orm->getCols( 'WbfsysProtocolUsage', $params->categories );

      // if the validation fails report
      $listWbfsysProtocolUsage = $httpRequest->validateMultiUpdate
      (
        'WbfsysProtocolUsage',
        'wbfsys_protocol_usage',
        $params->fieldsWbfsysProtocolUsage
      );

      $this->register( 'listWbfsysProtocolUsage', $listWbfsysProtocolUsage );
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

}//end class WbfsysProtocolUsage_Multi_Model

