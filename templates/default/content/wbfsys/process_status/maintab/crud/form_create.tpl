
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Process Status','wbfsys.process_status.label')?></a></h3>
        <div>
                
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<p>Be aware that you first have to create a new Process Status by clicking on "Create"
before you can add references to other data or assign user / roles.</p>



<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_status-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_process_status-default" >
          <?php echo $ELEMENT->inputWbfsysProcessStatusVid;?>

          <?php echo $ELEMENT->inputWbfsysProcessStatusIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdEndNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusValueHighestNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdLastNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdStartNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdUser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdActualNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdPhase;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusIdProcess;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusActualNodeKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_status-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_process_status-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStatusMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStatusMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysProcessStatusMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
