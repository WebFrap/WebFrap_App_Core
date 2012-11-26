  <div id="wgt-tab-form-wbfsys_process_state-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_process_state_details"
        title="<?php echo $I18N->l('Process State','wbfsys.process_state.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_state-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_process_state-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStateLabel;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateRevision;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateIcon;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateBgColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateIdPhase;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStateAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateBorderColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateTextColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateIdProcess;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_state-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_process_state-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysProcessStateDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_state-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_process_state-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStateMOrder;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStateMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysProcessStateRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
