
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_audio_codec-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_audio_codec-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_audio_codec-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_audio_codec-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_audio_codec-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_audio_codec-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_audio_codec-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_audio_codec-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-selection-wbfsys_audio_codec-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioCodecSearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioCodecSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-selection-wbfsys_audio_codec-search-content-description"
          title="Description"
          wgt_key="description" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAudioCodecSearchDescription;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-selection-wbfsys_audio_codec-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysAudioCodecSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a audio codec press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysAudioCodec?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysAudioCodec->searchForm}', null, {search:true});
});

JS
); ?>
    
