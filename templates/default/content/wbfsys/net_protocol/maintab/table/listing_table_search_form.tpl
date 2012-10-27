  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_net_protocol-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_net_protocol-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_net_protocol-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_net_protocol-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_net_protocol-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_net_protocol-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_net_protocol-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_net_protocol-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_net_protocol-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolSearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_net_protocol-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysNetProtocolSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

