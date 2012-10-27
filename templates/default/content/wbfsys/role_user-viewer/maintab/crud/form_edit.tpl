
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

        
  <div id="<?php echo $this->id?>" style="position:relative;height:100%;overflow-y:hidden;" class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div 
      style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head"  >
      
    <!-- tab name:default -->
    <h3>
      <a 
        tab="default"
        class=""
        
      
       >Defaults</a>
    </h3>
    <div>
      
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
    </div>      
      </div><!-- End accordion head -->
    </div><!-- End accordion container -->
    
    <!-- Content Main Container -->
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
     <div class="container" id="<?php echo $this->id ?>-content-default" >
<fieldset class="wgt-space bw61">
<legend>Default</legend>
<div class="left wgt-space bw3">
<?php // did not find field empl_number ?>
          <?php echo $ELEMENT->inputEmbedPersonFirstname;?>
          <?php echo $ELEMENT->inputEmbedPersonLastname;?>
          <?php echo $ELEMENT->inputEmbedPersonAcademicTitle;?>
          <?php echo $ELEMENT->inputEmbedPersonNoblesseTitle;?>
 </div>
<div class="inline wgt-space bw3">
          <?php echo $ELEMENT->inputEmbedPersonPhoto;?>
 </div>
 </fieldset>
<?php //group data is empty  ?>
      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_user-viewer-meta-<?php echo $VAR->entityWbfsysRoleUser_Viewer; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_user-viewer-meta-<?php echo $VAR->entityWbfsysRoleUser_Viewer; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.RoleUser_Viewer.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedPersonMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedPersonMVersion;?>
          <?php echo $ELEMENT->inputEmbedPersonMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedPersonRowid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedPersonMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedPersonMUuid;?>
          <?php echo $ELEMENT->inputEmbedPersonMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>
     </div>
      
    </div>
    

<div class="wgt-clear xxsmall">&nbsp;</div>
