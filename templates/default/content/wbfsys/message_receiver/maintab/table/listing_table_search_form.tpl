  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_message_receiver-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_message_receiver-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_message_receiver-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_message_receiver-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_message_receiver-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_message_receiver-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_message_receiver-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_message_receiver-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_message_receiver-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchIdStatus;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_message_receiver-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysMessageReceiverSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

