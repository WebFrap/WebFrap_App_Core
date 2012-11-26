
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Management Node','wbfsys.management.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Management Node base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Management Node.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysManagementReference_Entity')
          && $VAR->showTabReference
      ){
    ?>

      <!-- tab: reference in management: WbfsysManagementReference manytoone -->
      <h3>
        <a
          tab="reference"
          wgt_src="ajax.php?c=Wbfsys.Management_Ref_Reference.tab&amp;objid=<?php
              echo $VAR->entityWbfsysManagement->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-reference&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-reference" ><?php echo $I18N->l('References','wbfsys.management.label')?></a>
      </h3>
      <div>
        
<label>Management References</label>
<p>Here you can maintain Management References related to the Management Node.</p>
<p>To do so click on "Create new Management Reference".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysMask_Entity')
          && $VAR->showTabMask
      ){
    ?>

      <!-- tab: mask in management: WbfsysMask manytoone -->
      <h3>
        <a
          tab="mask"
          wgt_src="ajax.php?c=Wbfsys.Management_Ref_Mask.tab&amp;objid=<?php
              echo $VAR->entityWbfsysManagement->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-mask&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-mask" ><?php echo $I18N->l('Mask','wbfsys.management.label')?></a>
      </h3>
      <div>
        
<label>Masks</label>
<p>Here you can maintain Masks related to the Management Node.</p>
<p>To do so click on "Create new Mask".</p>
      

      </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysEntityComment_Entity')
        && Webfrap::classLoadable('WbfsysComment_Entity')
        && $VAR->showTabComments
    ){
    ?>

    <!-- tab: comments in management: WbfsysComment manytomany -->
    <h3>
      <a
        tab="comments"
        wgt_src="ajax.php?c=Wbfsys.Management_Ref_Comments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysManagement->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-comments&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-comments" ><?php echo $I18N->l('Comments','wbfsys.management.label.tab_comments')?></a>
    </h3>
    <div>
      
<label>Comments</label>
<p>Here you can assign Comments to the currently selected Management Node.</p>
<p>To do so click on "Append new Comment", search for the designated Comment
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysVrefFileType_Entity')
        && Webfrap::classLoadable('WbfsysFileType_Entity')
        && $VAR->showTabFileType
    ){
    ?>

    <!-- tab: file_type in management: WbfsysFileType manytomany -->
    <h3>
      <a
        tab="file_type"
        wgt_src="ajax.php?c=Wbfsys.Management_Ref_FileType.tab&amp;objid=<?php
            echo $VAR->entityWbfsysManagement->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-file_type&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-file_type" ><?php echo $I18N->l('File Type','wbfsys.management.label.tab_file_type')?></a>
    </h3>
    <div>
      
<label>file Types</label>
<p>Here you can assign file Types to the currently selected Management Node.</p>
<p>To do so click on "Append new file Type", search for the designated file Type
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
          <span onclick="$S('#wgt-box-wbfsys_management-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_management-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementName;?>
          <?php echo $ELEMENT->inputWbfsysManagementIdSecurityArea;?>
          <?php echo $ELEMENT->inputWbfsysManagementIdModule;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysManagementRevision;?>
          <?php echo $ELEMENT->inputWbfsysManagementIdEntity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_management-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_management-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysManagementDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_management-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_management-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Management.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysManagementMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysManagementRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysManagementMUuid;?>
          <?php echo $ELEMENT->inputWbfsysManagementMVersion;?>
          <?php echo $ELEMENT->inputWbfsysManagementMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysManagementMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-reference" ></div>

      <div class="container" id="<?php echo $this->id?>-content-mask" ></div>

      <div class="container" id="<?php echo $this->id?>-content-comments" ></div>

      <div class="container" id="<?php echo $this->id?>-content-file_type" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
