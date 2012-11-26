
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Dashboard','wbfsys.dashboard.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Dashboard base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Dashboard.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysDashboardWidget_Entity')
        && Webfrap::classLoadable('WbfsysMenuEntry_Entity')
        && $VAR->showTabWidgets
    ){
    ?>

    <!-- tab: widgets in management: WbfsysMenuEntry manytomany -->
    <h3>
      <a
        tab="widgets"
        wgt_src="ajax.php?c=Wbfsys.Dashboard_Ref_Widgets.tab&amp;objid=<?php
            echo $VAR->entityWbfsysDashboard->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-widgets&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-widgets" ><?php echo $I18N->l('Widgets','wbfsys.dashboard.label.tab_widgets')?></a>
    </h3>
    <div>
      
<label>Menu Entrys</label>
<p>Here you can assign Menu Entrys to the currently selected Dashboard.</p>
<p>To do so click on "Append new Menu Entry", search for the designated Menu Entry
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
          <span onclick="$S('#wgt-box-wbfsys_dashboard-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_dashboard-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardIdUser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardLayout;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_dashboard-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_dashboard-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Dashboard.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDashboardMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDashboardRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDashboardMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDashboardMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDashboardMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDashboardMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-widgets" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
