
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Color Scheme','wbfsys.color_scheme.label')?></a></h3>
        <div>
                
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<p>Be aware that you first have to create a new Color Scheme by clicking on "Create"
before you can add references to other data or assign user / roles.</p>



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
          <span onclick="$S('#wgt-box-wbfsys_color_scheme-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_color_scheme-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeName;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBgHover;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBorderActive;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBorderDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeFontDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeFontHover;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBorderHover;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeFontActive;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBgActive;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeBgDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeDisplayColor;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_scheme-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_color_scheme-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_scheme-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_color_scheme-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorSchemeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysColorSchemeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
