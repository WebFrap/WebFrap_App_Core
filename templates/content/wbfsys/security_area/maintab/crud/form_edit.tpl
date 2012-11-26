
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Security Area','wbfsys.security_area.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysSecurityAccess_Entity')
          && $VAR->showTabAccess
      ){
    ?>

      <!-- tab: access in management: WbfsysSecurityAccess manytoone -->
      <h3>
        <a
          tab="access"
          wgt_src="ajax.php?c=Wbfsys.SecurityArea_Ref_Access.tab&amp;objid=<?php
              echo $VAR->entityWbfsysSecurityArea->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-access&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mgmt-wbfsys_security_area-ref-access" ><?php echo $I18N->l('Access','wbfsys.security_area.label')?></a>
      </h3>
      <div>
        
<label>Access</label>
<p>Here you can maintain Access related to the Security Area.</p>
<p>To do so click on "Create new Access".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_security_area-default-<?php echo $VAR->entityWbfsysSecurityArea; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_security_area-default-<?php echo $VAR->entityWbfsysSecurityArea; ?>" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaVid;?>

          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelDelete;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdSource;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaFlagSystem;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelUpdate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelListing;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefAccess;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefInsert;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefAdmin;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMParent;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdType;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaSourceKey;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaLabel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdTarget;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaParentPath;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaRevision;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelAdmin;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelInsert;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefUpdate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefDelete;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdLevelAccess;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaIdRefListing;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaParentKey;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaTypeKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area-description-<?php echo $VAR->entityWbfsysSecurityArea; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_security_area-description-<?php echo $VAR->entityWbfsysSecurityArea; ?>" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_area-meta-<?php echo $VAR->entityWbfsysSecurityArea; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_security_area-meta-<?php echo $VAR->entityWbfsysSecurityArea; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.SecurityArea.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMUuid;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMVersion;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAreaMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-access" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
