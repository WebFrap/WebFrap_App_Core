
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Track Session','wbfsys.track_session.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Track Session base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Track Session.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_track_session-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_track_session-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionOsVersion;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionIdPerson;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionIdSession;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionOs;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionSession;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionRefer;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionService;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionBrowser;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionBrowserVersion;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_track_session-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_track_session-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.TrackSession.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionTrackId;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTrackSessionMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysTrackSessionRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
