
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Profiles','wbfsys.profile.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Profiles base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Profiles.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysProfileQuicklink_Entity')
          && $VAR->showTabQuicklinks
      ){
    ?>

      <!-- tab: quicklinks in management: WbfsysProfileQuicklink manytoone -->
      <h3>
        <a
          tab="quicklinks"
          wgt_src="ajax.php?c=Wbfsys.Profile_Ref_Quicklinks.tab&amp;objid=<?php
              echo $VAR->entityWbfsysProfile->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-quicklinks&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mgmt-wbfsys_profile-ref-quicklinks" ><?php echo $I18N->l('Quicklink','wbfsys.profile.label')?></a>
      </h3>
      <div>
        
<label>Profile Quicklinks</label>
<p>Here you can maintain Profile Quicklinks related to the Profiles.</p>
<p>To do so click on "Create new Profile Quicklink".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_profile-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_profile-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileRevision;?>
          <?php echo $ELEMENT->inputWbfsysProfileFlagCore;?>
          <?php echo $ELEMENT->inputWbfsysProfileMParent;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileName;?>
          <?php echo $ELEMENT->inputWbfsysProfileAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_profile-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_profile-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysProfileDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_profile-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_profile-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Profile.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProfileMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProfileRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProfileMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProfileMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysProfileMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-quicklinks" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
