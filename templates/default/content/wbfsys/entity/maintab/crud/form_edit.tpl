
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Entity','wbfsys.entity.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysEntityAlias_Entity')
          && $VAR->showTabAliases
      ){
    ?>

      <!-- tab: aliases in management: WbfsysEntityAlias manytoone -->
      <h3>
        <a
          tab="aliases"
          wgt_src="ajax.php?c=Wbfsys.Entity_Ref_Aliases.tab&amp;objid=<?php
              echo $VAR->entityWbfsysEntity->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-aliases&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-aliases" ><?php echo $I18N->l('Alias','wbfsys.entity.label')?></a>
      </h3>
      <div>
        
<label>Entity Alias</label>
<p>Here you can maintain Entity Alias related to the Entity.</p>
<p>To do so click on "Create new Entity Alias".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysEntityAttribute_Entity')
          && $VAR->showTabAttributes
      ){
    ?>

      <!-- tab: attributes in management: WbfsysEntityAttribute manytoone -->
      <h3>
        <a
          tab="attributes"
          wgt_src="ajax.php?c=Wbfsys.Entity_Ref_Attributes.tab&amp;objid=<?php
              echo $VAR->entityWbfsysEntity->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-attributes&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-attributes" ><?php echo $I18N->l('Attribute','wbfsys.entity.label')?></a>
      </h3>
      <div>
        
<label>Entity Attributes</label>
<p>Here you can maintain Entity Attributes related to the Entity.</p>
<p>To do so click on "Create new Entity Attribute".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysEntityCategory_Entity')
          && $VAR->showTabCategories
      ){
    ?>

      <!-- tab: categories in management: WbfsysEntityCategory manytoone -->
      <h3>
        <a
          tab="categories"
          wgt_src="ajax.php?c=Wbfsys.Entity_Ref_Categories.tab&amp;objid=<?php
              echo $VAR->entityWbfsysEntity->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-categories&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-categories" ><?php echo $I18N->l('Category','wbfsys.entity.label')?></a>
      </h3>
      <div>
        
<label>Entity Categorys</label>
<p>Here you can maintain Entity Categorys related to the Entity.</p>
<p>To do so click on "Create new Entity Category".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysEntityReference_Entity')
          && $VAR->showTabReferences
      ){
    ?>

      <!-- tab: references in management: WbfsysEntityReference manytoone -->
      <h3>
        <a
          tab="references"
          wgt_src="ajax.php?c=Wbfsys.Entity_Ref_References.tab&amp;objid=<?php
              echo $VAR->entityWbfsysEntity->getId();
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
            ?>&a_node=mod-wbfsys-cat-core_data-ref-references" ><?php echo $I18N->l('Reference','wbfsys.entity.label')?></a>
      </h3>
      <div>
        
<label>Entity References</label>
<p>Here you can maintain Entity References related to the Entity.</p>
<p>To do so click on "Create new Entity Reference".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysManagement_Entity')
          && $VAR->showTabManagements
      ){
    ?>

      <!-- tab: managements in management: WbfsysManagement manytoone -->
      <h3>
        <a
          tab="managements"
          wgt_src="ajax.php?c=Wbfsys.Entity_Ref_Managements.tab&amp;objid=<?php
              echo $VAR->entityWbfsysEntity->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-managements&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-managements" ><?php echo $I18N->l('Management','wbfsys.entity.label')?></a>
      </h3>
      <div>
        
<label>Management Nodes</label>
<p>Here you can maintain Management Nodes related to the Entity.</p>
<p>To do so click on "Create new Management Node".</p>
      

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
        wgt_src="ajax.php?c=Wbfsys.Entity_Ref_FileType.tab&amp;objid=<?php
            echo $VAR->entityWbfsysEntity->getId();
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
          ?>&a_node=mod-wbfsys-cat-core_data-ref-file_type" ><?php echo $I18N->l('File Type','wbfsys.entity.label.tab_file_type')?></a>
    </h3>
    <div>
      
<label>file Types</label>
<p>Here you can assign file Types to the currently selected Entity.</p>
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
          <span onclick="$S('#wgt-box-wbfsys_entity-default-<?php echo $VAR->entityWbfsysEntity; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity-default-<?php echo $VAR->entityWbfsysEntity; ?>" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityName;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultSelection;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultEdit;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityRevision;?>
          <?php echo $ELEMENT->inputWbfsysEntityRelevance;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysEntityIdSecurityArea;?>
          <?php echo $ELEMENT->inputWbfsysEntityIdModule;?>
          <?php echo $ELEMENT->inputWbfsysEntityFlagIndex;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultList;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultShow;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity-description-<?php echo $VAR->entityWbfsysEntity; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity-description-<?php echo $VAR->entityWbfsysEntity; ?>" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysEntityDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity-meta-<?php echo $VAR->entityWbfsysEntity; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity-meta-<?php echo $VAR->entityWbfsysEntity; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Entity.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-aliases" ></div>

      <div class="container" id="<?php echo $this->id?>-content-attributes" ></div>

      <div class="container" id="<?php echo $this->id?>-content-categories" ></div>

      <div class="container" id="<?php echo $this->id?>-content-references" ></div>

      <div class="container" id="<?php echo $this->id?>-content-managements" ></div>

      <div class="container" id="<?php echo $this->id?>-content-file_type" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
