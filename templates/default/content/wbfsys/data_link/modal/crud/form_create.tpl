  <div id="wgt-tab-form-wbfsys_data_link-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_data_link_details"
        title="<?php echo $I18N->l('Data Link','wbfsys.data_link.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_data_link-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_data_link-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDataLinkIdMessage;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDataLinkIdLink;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_data_link-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_data_link-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDataLinkMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDataLinkMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDataLinkRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDataLinkMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDataLinkMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDataLinkMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDataLinkMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
