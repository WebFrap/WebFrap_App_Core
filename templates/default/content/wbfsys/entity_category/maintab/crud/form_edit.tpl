
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Entity Category','wbfsys.entity_category.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
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
        wgt_src="ajax.php?c=Wbfsys.EntityCategory_Ref_Comments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysEntityCategory->getId();
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
          ?>&a_node=mod-wbfsys-cat-core_data-ref-comments" ><?php echo $I18N->l('Comments','wbfsys.entity_category.label.tab_comments')?></a>
    </h3>
    <div>
      
<label>Comments</label>
<p>Here you can assign Comments to the currently selected Entity Category.</p>
<p>To do so click on "Append new Comment", search for the designated Comment
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
          <span onclick="$S('#wgt-box-wbfsys_entity_category-default-<?php echo $VAR->entityWbfsysEntityCategory; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_category-default-<?php echo $VAR->entityWbfsysEntityCategory; ?>" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCategoryName;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryRevision;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCategoryAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryIdEntity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_category-description-<?php echo $VAR->entityWbfsysEntityCategory; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity_category-description-<?php echo $VAR->entityWbfsysEntityCategory; ?>" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysEntityCategoryDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_category-meta-<?php echo $VAR->entityWbfsysEntityCategory; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_category-meta-<?php echo $VAR->entityWbfsysEntityCategory; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.EntityCategory.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCategoryMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityCategoryMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityCategoryMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-comments" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
