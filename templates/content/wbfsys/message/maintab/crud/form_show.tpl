
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Message','wbfsys.message.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Message base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Message.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysEntityTag_Entity')
        && Webfrap::classLoadable('WbfsysTag_Entity')
        && $VAR->showTabTags
    ){
    ?>

    <!-- tab: tags in management: WbfsysTag manytomany -->
    <h3>
      <a
        tab="tags"
        wgt_src="ajax.php?c=Wbfsys.Message_Ref_Tags.tab&amp;objid=<?php
            echo $VAR->entityWbfsysMessage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-tags&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_message-ref-tags" ><?php echo $I18N->l('Tags','wbfsys.message.label.tab_tags')?></a>
    </h3>
    <div>
      
<label>Tags</label>
<p>Here you can assign Tags to the currently selected Message.</p>
<p>To do so click on "Append new Tag", search for the designated Tag
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysMessageSendway_Entity')
        && Webfrap::classLoadable('WbfsysMessageRepository_Entity')
        && $VAR->showTabSendWay
    ){
    ?>

    <!-- tab: send_way in management: WbfsysMessageRepository manytomany -->
    <h3>
      <a
        tab="send_way"
        wgt_src="ajax.php?c=Wbfsys.Message_Ref_SendWay.tab&amp;objid=<?php
            echo $VAR->entityWbfsysMessage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-send_way&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_message-ref-send_way" ><?php echo $I18N->l('Send Way','wbfsys.message.label.tab_send_way')?></a>
    </h3>
    <div>
      
<label>Message Repositorys</label>
<p>Here you can assign Message Repositorys to the currently selected Message.</p>
<p>To do so click on "Append new Message Repository", search for the designated Message Repository
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysDataLink_Entity')
        && Webfrap::classLoadable('WbfsysDataIndex_Entity')
        && $VAR->showTabLink
    ){
    ?>

    <!-- tab: link in management: WbfsysDataIndex manytomany -->
    <h3>
      <a
        tab="link"
        wgt_src="ajax.php?c=Wbfsys.Message_Ref_Link.tab&amp;objid=<?php
            echo $VAR->entityWbfsysMessage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-link&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_message-ref-link" ><?php echo $I18N->l('Data Link','wbfsys.message.label.tab_link')?></a>
    </h3>
    <div>
      
<label>Data Indexs</label>
<p>Here you can assign Data Indexs to the currently selected Message.</p>
<p>To do so click on "Append new Data Index", search for the designated Data Index
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysMessageReferences_Entity')
        && Webfrap::classLoadable('WbfsysMessage_Entity')
        && $VAR->showTabReferences
    ){
    ?>

    <!-- tab: references in management: WbfsysMessage manytomany -->
    <h3>
      <a
        tab="references"
        wgt_src="ajax.php?c=Wbfsys.Message_Ref_References.tab&amp;objid=<?php
            echo $VAR->entityWbfsysMessage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-references&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_message-ref-references" ><?php echo $I18N->l('References','wbfsys.message.label.tab_references')?></a>
    </h3>
    <div>
      
<label>Messages</label>
<p>Here you can assign Messages to the currently selected Message.</p>
<p>To do so click on "Append new Message", search for the designated Message
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysEntityAttachment_Entity')
        && Webfrap::classLoadable('WbfsysFile_Entity')
        && $VAR->showTabAttachments
    ){
    ?>

    <!-- tab: attachments in management: WbfsysFile manytomany -->
    <h3>
      <a
        tab="attachments"
        wgt_src="ajax.php?c=Wbfsys.Message_Ref_Attachments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysMessage->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-attachments&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_message-ref-attachments" ><?php echo $I18N->l('Attachments','wbfsys.message.label.tab_attachments')?></a>
    </h3>
    <div>
      
<label>Files</label>
<p>Here you can assign Files to the currently selected Message.</p>
<p>To do so click on "Append new File", search for the designated File
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
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Message.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
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
      
      
      <div class="container" id="<?php echo $this->id?>-content-tags" ></div>

      <div class="container" id="<?php echo $this->id?>-content-send_way" ></div>

      <div class="container" id="<?php echo $this->id?>-content-link" ></div>

      <div class="container" id="<?php echo $this->id?>-content-references" ></div>

      <div class="container" id="<?php echo $this->id?>-content-attachments" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
