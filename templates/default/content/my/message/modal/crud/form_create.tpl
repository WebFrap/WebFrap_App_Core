  <div id="wgt-tab-form-my_message-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_my_message_details"
        title="<?php echo $I18N->l('My Messages','my.message.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-my_message-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-my_message-default" >
        <div class="full" >
          <?php echo $ELEMENT->inputMyMessageTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputMyMessageIdReceiverStatus;?>
          <?php echo $ELEMENT->inputMyMessageIdSenderStatus;?>
          <?php echo $ELEMENT->inputMyMessageIdRefer;?>
          <?php echo $ELEMENT->inputMyMessageMessageId;?>
          <?php echo $ELEMENT->inputMyMessageIdSender;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputMyMessageFlagSenderDeleted;?>
          <?php echo $ELEMENT->inputMyMessageFlagReceiverDeleted;?>
          <?php echo $ELEMENT->inputMyMessageDeliverDate;?>
          <?php echo $ELEMENT->inputMyMessagePriority;?>
          <?php echo $ELEMENT->inputMyMessageIdAnswerTo;?>
          <?php echo $ELEMENT->inputMyMessageIdReceiver;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputMyMessageMessage;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-my_message-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-my_message-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputMyMessageMRoleChange;?>
          <?php echo $ELEMENT->inputMyMessageMTimeChanged;?>
          <?php echo $ELEMENT->inputMyMessageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputMyMessageMUuid;?>
          <?php echo $ELEMENT->inputMyMessageMVersion;?>
          <?php echo $ELEMENT->inputMyMessageMRoleCreate;?>
          <?php echo $ELEMENT->inputMyMessageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
