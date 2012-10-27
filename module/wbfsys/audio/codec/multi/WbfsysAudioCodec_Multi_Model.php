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
class WbfsysAudioCodec_Multi_Model
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
      if( !$listWbfsysAudioCodec = $this->getRegisterd( 'listWbfsysAudioCodec' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAudioCodec was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAudioCodec as $entityWbfsysAudioCodec )
      {
        
        if( $entityWbfsysAudioCodec->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysAudioCodec_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAudioCodec );
            
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
                      'audio codec', 
                      'wbfsys.audio_codec.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysAudioCodec ) )
          {
            $entityText = $entityWbfsysAudioCodec->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create audio codec {@text@}',
                'wbfsys.audio_codec.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysAudioCodec->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysAudioCodec_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAudioCodec );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update audio codec {@text@}',
                  'wbfsys.audio_codec.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysAudioCodec ) )
          {
            $entityText = $entityWbfsysAudioCodec->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save audio codec {@text@}',
                'wbfsys.audio_codec.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysAudioCodec->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved audio codec: {@text@}',
          'wbfsys.audio_codec.message',
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
      if( !$listWbfsysAudioCodec = $this->getRegisterd( 'listWbfsysAudioCodec' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAudioCodec was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAudioCodec as $entityWbfsysAudioCodec )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysAudioCodec_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAudioCodec );
          
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
                    'audio codec', 
                    'wbfsys.audio_codec.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysAudioCodec ) )
        {
          $entityText = $entityWbfsysAudioCodec->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create audio codec {@text@}',
              'wbfsys.audio_codec.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysAudioCodec->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created audio codec: {@text@}',
          'wbfsys.audio_codec.message',
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
      if( !$listWbfsysAudioCodec = $this->getRegisterd( 'listWbfsysAudioCodec' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysAudioCodec was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysAudioCodec as $entityWbfsysAudioCodec )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysAudioCodec_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAudioCodec );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update audio codec {@text@}',
                'wbfsys.audio_codec.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysAudioCodec ) )
        {
          $entityText = $entityWbfsysAudioCodec->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update audio codec {@text@}',
              'wbfsys.audio_codec.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysAudioCodec->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated audio codec: {@text@}',
          'wbfsys.audio_codec.message',
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
   * @param WbfsysAudioCodec_Multi_Access_Delete $access
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
      
      $listWbfsysAudioCodec = $orm->getByIds( 'WbfsysAudioCodec', $deleteIds );

      foreach( $listWbfsysAudioCodec as $entityWbfsysAudioCodec )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysAudioCodec_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysAudioCodec );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete audio codec {@text@}',
                'wbfsys.audio_codec.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysAudioCodec ) )
        {
          $entityText = $entityWbfsysAudioCodec->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete audio codec {@text@}',
              'wbfsys.audio_codec.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysAudioCodec->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted audio codec: {@text@}',
          'wbfsys.audio_codec.message',
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

      if( !$params->fieldsWbfsysAudioCodec )
        $params->fieldsWbfsysAudioCodec  = $orm->getCols( 'WbfsysAudioCodec', $params->categories );

      // if the validation fails report
      $listWbfsysAudioCodec = $httpRequest->validateMultiSave
      (
        'WbfsysAudioCodec',
        'wbfsys_audio_codec',
        $params->fieldsWbfsysAudioCodec
      );

      $this->register( 'listWbfsysAudioCodec', $listWbfsysAudioCodec );
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

      if( $params->fieldsWbfsysAudioCodec )
      {
        $params->fieldsWbfsysAudioCodec = $orm->getCols
        (
          'WbfsysAudioCodec',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysAudioCodec = $httpRequest->validateMultiInsert
      (
        'WbfsysAudioCodec',
        'wbfsys_audio_codec',
        $params->fieldsWbfsysAudioCodec
      );

      $this->register( 'listWbfsysAudioCodec', $listWbfsysAudioCodec );
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

      if( !$params->fieldsWbfsysAudioCodec )
        $params->fieldsWbfsysAudioCodec  = $orm->getCols( 'WbfsysAudioCodec', $params->categories );

      // if the validation fails report
      $listWbfsysAudioCodec = $httpRequest->validateMultiUpdate
      (
        'WbfsysAudioCodec',
        'wbfsys_audio_codec',
        $params->fieldsWbfsysAudioCodec
      );

      $this->register( 'listWbfsysAudioCodec', $listWbfsysAudioCodec );
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

}//end class WbfsysAudioCodec_Multi_Model

