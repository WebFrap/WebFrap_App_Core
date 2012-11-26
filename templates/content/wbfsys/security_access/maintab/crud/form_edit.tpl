
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Access','wbfsys.security_access.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_access-default-<?php echo $VAR->entityWbfsysSecurityAccess; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_security_access-default-<?php echo $VAR->entityWbfsysSecurityAccess; ?>" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessRefAccessLevel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessIdGroup;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessDateStart;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessPartial;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessAccessLevel;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessIdArea;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessDateEnd;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_access-description-<?php echo $VAR->entityWbfsysSecurityAccess; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_security_access-description-<?php echo $VAR->entityWbfsysSecurityAccess; ?>" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_security_access-meta-<?php echo $VAR->entityWbfsysSecurityAccess; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_security_access-meta-<?php echo $VAR->entityWbfsysSecurityAccess; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.SecurityAccess.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMUuid;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMVersion;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysSecurityAccessMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
