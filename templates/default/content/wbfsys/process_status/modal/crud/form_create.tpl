  <div id="wgt-tab-form-wbfsys_process_status-create" class="wcm wcm_ui_tab" >
    <div class="wgt_tab_body" >

    <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
    <form
      method="post"
      accept-charset="utf-8"
      class="<?php echo $VAR->formClass?>"
      id="<?php echo $VAR->formId?>"
      action="<?php echo $VAR->formAction?>" ></form>

      <!-- Tab Details -->
      <div  
        id="<?php echo $this->id?>_tab_wbfsys_process_status_details"
        title="<?php echo $I18N->l('Process Status','wbfsys.process_status.label')?>"  >
        
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



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
