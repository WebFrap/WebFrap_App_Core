  <div id="wgt-tab-form-wbfsys_help_page-create" class="wcm wcm_ui_tab" >
    <div class="wgt_tab_body" >

    <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
    <form
      method="post"
      accept-charset="utf-8"
      class="<?php echo $VAR->formClass?>"
      id="<?php echo $VAR->formId?>"
      action="<?php echo $VAR->formAction?>" ></form>

      <!-- Tab Details -->
      <div  
        id="<?php echo $this->id?>_tab_wbfsys_help_page_details"
        title="<?php echo $I18N->l('Help Page','wbfsys.help_page.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_help_page-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_help_page-default" >
          <?php echo $ELEMENT->inputWbfsysHelpPageVid;?>

          <?php echo $ELEMENT->inputWbfsysHelpPageIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysHelpPageTitle;?>
        </div>
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_help_page-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_help_page-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysHelpPageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysHelpPageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysHelpPageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysHelpPageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysHelpPageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysHelpPageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysHelpPageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
