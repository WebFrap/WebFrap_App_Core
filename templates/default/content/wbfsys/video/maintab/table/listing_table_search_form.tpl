  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_video-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_video-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_video-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_video-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_video-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_video-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_video-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_video-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_video-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputWbfsysVideoSearchTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoSearchAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoSearchIdAudioCodec;?>
          <?php echo $ELEMENT->inputWbfsysVideoSearchIdVideoCodec;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_video-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysVideoSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysVideoSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysVideoSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysVideoSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysVideoSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysVideoSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysVideoSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysVideoSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

