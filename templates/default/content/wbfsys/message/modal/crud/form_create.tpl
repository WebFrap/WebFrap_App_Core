  <div id="wgt-tab-form-wbfsys_message-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_details"
        title="<?php echo $I18N->l('Message','wbfsys.message.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_message-default" >
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMessageTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageIdReceiverStatus;?>
          <?php echo $ELEMENT->inputWbfsysMessageIdSenderStatus;?>
          <?php echo $ELEMENT->inputWbfsysMessageIdRefer;?>
          <?php echo $ELEMENT->inputWbfsysMessageMessageId;?>
          <?php echo $ELEMENT->inputWbfsysMessageIdSender;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageFlagSenderDeleted;?>
          <?php echo $ELEMENT->inputWbfsysMessageFlagReceiverDeleted;?>
          <?php echo $ELEMENT->inputWbfsysMessageDeliverDate;?>
          <?php echo $ELEMENT->inputWbfsysMessagePriority;?>
          <?php echo $ELEMENT->inputWbfsysMessageIdAnswerTo;?>
          <?php echo $ELEMENT->inputWbfsysMessageIdReceiver;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMessageMessage;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMessageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMessageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMessageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMessageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
