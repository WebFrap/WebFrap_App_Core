  <div id="wgt-tab-form-wbfsys_data_index-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_data_index_details"
        title="<?php echo $I18N->l('Data Index','wbfsys.data_index.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_data_index-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_data_index-default" >
          <?php echo $ELEMENT->inputWbfsysDataIndexVid;?>

          <?php echo $ELEMENT->inputWbfsysDataIndexIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDataIndexTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDataIndexName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDataIndexAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysDataIndexIndexContent;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_data_index-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_data_index-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDataIndexDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_data_index-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_data_index-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDataIndexMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDataIndexMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDataIndexRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDataIndexMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDataIndexMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDataIndexMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDataIndexMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
