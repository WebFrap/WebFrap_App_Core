
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Layout Themes','wbfsys.theme_layout.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Layout Themes base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Layout Themes.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_theme_layout-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_theme_layout-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutPath;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_theme_layout-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_theme_layout-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_theme_layout-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_theme_layout-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.ThemeLayout.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMUuid;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMVersion;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysThemeLayoutMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>