  <div id="wgt-tab-form-wbfsys_entity_file_storage-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_file_storage_details"
        title="<?php echo $I18N->l('Entity File Storage','wbfsys.entity_file_storage.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_file_storage-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_file_storage-default" >
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageVid;?>

          <?php echo $ELEMENT->inputWbfsysEntityFileStorageIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageIdStorage;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_file_storage-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_file_storage-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityFileStorageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
