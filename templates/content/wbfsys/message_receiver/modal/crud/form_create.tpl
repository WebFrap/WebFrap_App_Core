  <div id="wgt-tab-form-wbfsys_message_receiver-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_receiver_details"
        title="<?php echo $I18N->l('Empfänger','wbfsys.message_receiver.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_receiver-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_message_receiver-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageReceiverIdStatus;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverIdReceiver;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverIdMessage;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageReceiverOpened;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverVisible;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_receiver-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message_receiver-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageReceiverMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageReceiverMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageReceiverMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
