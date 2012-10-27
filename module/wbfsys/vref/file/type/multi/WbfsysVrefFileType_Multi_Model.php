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
class WbfsysVrefFileType_Multi_Model
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
      if( !$listWbfsysVrefFileType = $this->getRegisterd( 'listWbfsysVrefFileType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysVrefFileType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysVrefFileType as $entityWbfsysVrefFileType )
      {
        
        if( $entityWbfsysVrefFileType->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysVrefFileType_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysVrefFileType );
            
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
                      'Vref File Type', 
                      'wbfsys.vref_file_type.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysVrefFileType ) )
          {
            $entityText = $entityWbfsysVrefFileType->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Vref File Type {@text@}',
                'wbfsys.vref_file_type.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysVrefFileType->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysVrefFileType_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysVrefFileType );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Vref File Type {@text@}',
                  'wbfsys.vref_file_type.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysVrefFileType ) )
          {
            $entityText = $entityWbfsysVrefFileType->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Vref File Type {@text@}',
                'wbfsys.vref_file_type.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysVrefFileType->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Vref File Type: {@text@}',
          'wbfsys.vref_file_type.message',
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
      if( !$listWbfsysVrefFileType = $this->getRegisterd( 'listWbfsysVrefFileType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysVrefFileType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysVrefFileType as $entityWbfsysVrefFileType )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysVrefFileType_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysVrefFileType );
          
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
                    'Vref File Type', 
                    'wbfsys.vref_file_type.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysVrefFileType ) )
        {
          $entityText = $entityWbfsysVrefFileType->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Vref File Type {@text@}',
              'wbfsys.vref_file_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysVrefFileType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Vref File Type: {@text@}',
          'wbfsys.vref_file_type.message',
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
      if( !$listWbfsysVrefFileType = $this->getRegisterd( 'listWbfsysVrefFileType' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysVrefFileType was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysVrefFileType as $entityWbfsysVrefFileType )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysVrefFileType_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysVrefFileType );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Vref File Type {@text@}',
                'wbfsys.vref_file_type.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysVrefFileType ) )
        {
          $entityText = $entityWbfsysVrefFileType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Vref File Type {@text@}',
              'wbfsys.vref_file_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysVrefFileType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Vref File Type: {@text@}',
          'wbfsys.vref_file_type.message',
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
   * @param WbfsysVrefFileType_Multi_Access_Delete $access
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
      
      $listWbfsysVrefFileType = $orm->getByIds( 'WbfsysVrefFileType', $deleteIds );

      foreach( $listWbfsysVrefFileType as $entityWbfsysVrefFileType )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysVrefFileType_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysVrefFileType );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Vref File Type {@text@}',
                'wbfsys.vref_file_type.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysVrefFileType ) )
        {
          $entityText = $entityWbfsysVrefFileType->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Vref File Type {@text@}',
              'wbfsys.vref_file_type.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysVrefFileType->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Vref File Type: {@text@}',
          'wbfsys.vref_file_type.message',
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

      if( !$params->fieldsWbfsysVrefFileType )
        $params->fieldsWbfsysVrefFileType  = $orm->getCols( 'WbfsysVrefFileType', $params->categories );

      // if the validation fails report
      $listWbfsysVrefFileType = $httpRequest->validateMultiSave
      (
        'WbfsysVrefFileType',
        'wbfsys_vref_file_type',
        $params->fieldsWbfsysVrefFileType
      );

      $this->register( 'listWbfsysVrefFileType', $listWbfsysVrefFileType );
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

      if( $params->fieldsWbfsysVrefFileType )
      {
        $params->fieldsWbfsysVrefFileType = $orm->getCols
        (
          'WbfsysVrefFileType',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysVrefFileType = $httpRequest->validateMultiInsert
      (
        'WbfsysVrefFileType',
        'wbfsys_vref_file_type',
        $params->fieldsWbfsysVrefFileType
      );

      $this->register( 'listWbfsysVrefFileType', $listWbfsysVrefFileType );
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

      if( !$params->fieldsWbfsysVrefFileType )
        $params->fieldsWbfsysVrefFileType  = $orm->getCols( 'WbfsysVrefFileType', $params->categories );

      // if the validation fails report
      $listWbfsysVrefFileType = $httpRequest->validateMultiUpdate
      (
        'WbfsysVrefFileType',
        'wbfsys_vref_file_type',
        $params->fieldsWbfsysVrefFileType
      );

      $this->register( 'listWbfsysVrefFileType', $listWbfsysVrefFileType );
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

}//end class WbfsysVrefFileType_Multi_Model

