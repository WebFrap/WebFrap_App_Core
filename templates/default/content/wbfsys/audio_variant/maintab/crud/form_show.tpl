
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Audio Variant','wbfsys.audio_variant.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Audio Variant base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Audio Variant.
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
          <span onclick="$S('#wgt-box-wbfsys_audio_variant-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_audio_variant-default" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantMimetype;?>

          <?php echo $ELEMENT->inputWbfsysAudioVariantFileHash;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantFile;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdLang;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdAudio;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdAudioCodec;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantFileSize;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdLicence;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_variant-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_audio_variant-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_variant-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_audio_variant-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.AudioVariant.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
