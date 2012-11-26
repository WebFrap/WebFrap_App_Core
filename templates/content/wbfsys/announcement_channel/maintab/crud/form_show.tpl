
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Announcement Channel','wbfsys.announcement_channel.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Announcement Channel base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Announcement Channel.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysAnnouncementChannelSubscription_Entity')
        && Webfrap::classLoadable('WbfsysRoleUser_Entity')
        && $VAR->showTabUserSubscriptions
    ){
    ?>

    <!-- tab: user_subscriptions in management: WbfsysRoleUser manytomany -->
    <h3>
      <a
        tab="user_subscriptions"
        wgt_src="ajax.php?c=Wbfsys.AnnouncementChannel_Ref_UserSubscriptions.tab&amp;objid=<?php
            echo $VAR->entityWbfsysAnnouncementChannel->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-user_subscriptions&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-user_subscriptions" ><?php echo $I18N->l('User Subscriptions','wbfsys.announcement_channel.label.tab_user_subscriptions')?></a>
    </h3>
    <div>
      
<label>System Users</label>
<p>Here you can assign System Users to the currently selected Announcement Channel.</p>
<p>To do so click on "Append new System User", search for the designated System User
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysAnnouncementChannelSubscription_Entity')
        && Webfrap::classLoadable('WbfsysRoleGroup_Entity')
        && $VAR->showTabGroupSubscriptions
    ){
    ?>

    <!-- tab: group_subscriptions in management: WbfsysRoleGroup manytomany -->
    <h3>
      <a
        tab="group_subscriptions"
        wgt_src="ajax.php?c=Wbfsys.AnnouncementChannel_Ref_GroupSubscriptions.tab&amp;objid=<?php
            echo $VAR->entityWbfsysAnnouncementChannel->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-group_subscriptions&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-group_subscriptions" ><?php echo $I18N->l('Group Subscriptions','wbfsys.announcement_channel.label.tab_group_subscriptions')?></a>
    </h3>
    <div>
      
<label>User Roles</label>
<p>Here you can assign User Roles to the currently selected Announcement Channel.</p>
<p>To do so click on "Append new User Roles", search for the designated User Roles
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement_channel-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_announcement_channel-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelFlagPublic;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement_channel-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_announcement_channel-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement_channel-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_announcement_channel-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.AnnouncementChannel.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementChannelMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-user_subscriptions" ></div>

      <div class="container" id="<?php echo $this->id?>-content-group_subscriptions" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
