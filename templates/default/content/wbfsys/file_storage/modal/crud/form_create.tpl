  <div id="wgt-tab-form-wbfsys_file_storage-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_file_storage_details"
        title="<?php echo $I18N->l('File Storage','wbfsys.file_storage.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_storage-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_file_storage-default" >
          <?php echo $ELEMENT->inputWbfsysFileStorageVid;?>

          <?php echo $ELEMENT->inputWbfsysFileStorageIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysFileStorageName;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageIdConfidentiality;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageLink;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysFileStorageAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageIdType;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_storage-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_file_storage-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysFileStorageDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_file_storage-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_file_storage-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysFileStorageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysFileStorageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysFileStorageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
