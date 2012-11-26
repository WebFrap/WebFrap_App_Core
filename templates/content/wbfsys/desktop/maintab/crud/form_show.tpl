
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Desktop','wbfsys.desktop.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Desktop base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Desktop.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysMenuEntry_Entity')
          && $VAR->showTabMainMenu
      ){
    ?>

      <!-- tab: main_menu in management: WbfsysMenuEntry manytoone -->
      <h3>
        <a
          tab="main_menu"
          wgt_src="ajax.php?c=Wbfsys.Desktop_Ref_MainMenu.tab&amp;ltype=treetable&amp;objid=<?php
              echo $VAR->entityWbfsysDesktop->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-main_menu&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-main_menu" ><?php echo $I18N->l('Main Menu','wbfsys.desktop.label')?></a>
      </h3>
      <div>
        
<label>Menu Entrys</label>
<p>Here you can maintain Menu Entrys related to the Desktop.</p>
<p>To do so click on "Create new Menu Entry".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysMenuEntry_Entity')
          && $VAR->showTabMainTree
      ){
    ?>

      <!-- tab: main_tree in management: WbfsysMenuEntry manytoone -->
      <h3>
        <a
          tab="main_tree"
          wgt_src="ajax.php?c=Wbfsys.Desktop_Ref_MainTree.tab&amp;ltype=treetable&amp;objid=<?php
              echo $VAR->entityWbfsysDesktop->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-main_tree&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-main_tree" ><?php echo $I18N->l('Main Tree','wbfsys.desktop.label')?></a>
      </h3>
      <div>
        
<label>Menu Entrys</label>
<p>Here you can maintain Menu Entrys related to the Desktop.</p>
<p>To do so click on "Create new Menu Entry".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_desktop-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_desktop-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopName;?>
          <?php echo $ELEMENT->inputWbfsysDesktopIdMainTree;?>
          <?php echo $ELEMENT->inputWbfsysDesktopIdMainMenu;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysDesktopRevision;?>
          <?php echo $ELEMENT->inputWbfsysDesktopIdApp;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_desktop-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_desktop-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDesktopDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_desktop-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_desktop-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Desktop.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDesktopRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDesktopMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDesktopMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-main_menu" ></div>

      <div class="container" id="<?php echo $this->id?>-content-main_tree" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
