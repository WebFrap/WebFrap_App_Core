
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Process Node','wbfsys.process_node.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Process Node base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Process Node.
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
          <span onclick="$S('#wgt-box-wbfsys_process_node-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_process_node-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeLabel;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeRevision;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeTextColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeBgColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIsEndNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIsStartNode;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodePhaseKey;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIcon;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeBorderColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIdPhase;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIdProcess;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_node-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_process_node-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_node-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_process_node-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.ProcessNode.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
