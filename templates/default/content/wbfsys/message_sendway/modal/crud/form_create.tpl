  <div id="wgt-tab-form-wbfsys_message_sendway-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_sendway_details"
        title="<?php echo $I18N->l('Message Sendway','wbfsys.message_sendway.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_sendway-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_message_sendway-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageSendwayIdMessage;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageSendwayIdRepository;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_sendway-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message_sendway-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageSendwayMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMessageSendwayMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMessageSendwayRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageSendwayMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMessageSendwayMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMessageSendwayMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageSendwayMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
