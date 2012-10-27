  <div id="wgt-tab-form-wbfsys_message_log-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_log_details"
        title="<?php echo $I18N->l('Message Log','wbfsys.message_log.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_log-contact').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Contact
        </legend>
        <div id="wgt-box-wbfsys_message_log-contact" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageLogEmail;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_log-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_message_log-default" >
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMessageLogTitle;?>
        </div>
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_log-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message_log-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageLogRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageLogMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageLogMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
