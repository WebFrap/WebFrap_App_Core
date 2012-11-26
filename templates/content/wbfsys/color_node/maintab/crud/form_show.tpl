
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Color Node','wbfsys.color_node.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Color Node base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Color Node.
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
          <span onclick="$S('#wgt-box-wbfsys_color_node-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_color_node-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeName;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderActive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderInactive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontActive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontHover;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgHover;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeDisplayColor;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgInactive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontInactive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBgActive;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderHover;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeFontDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeBorderDefault;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeIdScheme;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_node-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_color_node-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysColorNodeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_color_node-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_color_node-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.ColorNode.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysColorNodeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysColorNodeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
