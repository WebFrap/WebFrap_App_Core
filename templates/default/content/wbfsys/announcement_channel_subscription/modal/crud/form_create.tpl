  <div id="wgt-tab-form-wbfsys_announcement_channel_subscription-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_announcement_channel_subscription_details"
        title="<?php echo $I18N->l('Announcement Subscription','wbfsys.announcement_channel_subscription.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement_channel_subscription-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_announcement_channel_subscription-default" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionVid;?>

          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionIdChannel;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionDateEnd;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionIdRole;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionDateStart;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement_channel_subscription-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_announcement_channel_subscription-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelSubscriptionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
