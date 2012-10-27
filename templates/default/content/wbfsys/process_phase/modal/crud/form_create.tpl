  <div id="wgt-tab-form-wbfsys_process_phase-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_process_phase_details"
        title="<?php echo $I18N->l('Process Phase','wbfsys.process_phase.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_phase-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_process_phase-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessPhaseLabel;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseRevision;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseIcon;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessPhaseAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseIdProcess;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_phase-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_process_phase-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysProcessPhaseDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_phase-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_process_phase-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMOrder;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysProcessPhaseRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
