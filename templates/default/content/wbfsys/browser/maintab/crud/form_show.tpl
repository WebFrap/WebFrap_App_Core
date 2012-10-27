
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Browser','wbfsys.browser.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Browser base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Browser.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysBrowserVersion_Entity')
          && $VAR->showTabVersion
      ){
    ?>

      <!-- tab: version in management: WbfsysBrowserVersion manytoone -->
      <h3>
        <a
          tab="version"
          wgt_src="ajax.php?c=Wbfsys.Browser_Ref_Version.tab&amp;objid=<?php
              echo $VAR->entityWbfsysBrowser->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-version&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-version" ><?php echo $I18N->l('Version','wbfsys.browser.label')?></a>
      </h3>
      <div>
        
<label>Browser Versions</label>
<p>Here you can maintain Browser Versions related to the Browser.</p>
<p>To do so click on "Create new Browser Version".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_browser-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_browser-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_browser-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_browser-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysBrowserDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_browser-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_browser-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Browser.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserMOrder;?>
          <?php echo $ELEMENT->inputWbfsysBrowserMUuid;?>
          <?php echo $ELEMENT->inputWbfsysBrowserMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysBrowserMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysBrowserMVersion;?>
          <?php echo $ELEMENT->inputWbfsysBrowserMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysBrowserMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysBrowserRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-version" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
