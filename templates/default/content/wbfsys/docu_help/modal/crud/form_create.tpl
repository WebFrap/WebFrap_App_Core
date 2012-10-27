  <div id="wgt-tab-form-wbfsys_docu_help-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_docu_help_details"
        title="<?php echo $I18N->l('Help','wbfsys.docu_help.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_docu_help-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_docu_help-default" >
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocuHelpTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuHelpIdMask;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuHelpAccessKey;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocuHelpContent;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_docu_help-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_docu_help-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuHelpMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDocuHelpMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDocuHelpRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuHelpMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDocuHelpMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDocuHelpMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDocuHelpMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
