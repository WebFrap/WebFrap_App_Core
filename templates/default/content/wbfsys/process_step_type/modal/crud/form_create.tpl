  <div id="wgt-tab-form-wbfsys_process_step_type-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_process_step_type_details"
        title="<?php echo $I18N->l('process step Type','wbfsys.process_step_type.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_step_type-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_process_step_type-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_step_type-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_process_step_type-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_step_type-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_process_step_type-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysProcessStepTypeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
