  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_process_state-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_process_state-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_process_state-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_process_state-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_process_state-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_process_state-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_process_state-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_process_state-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_process_state-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStateSearchLabel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessStateSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_process_state-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysProcessStateSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

