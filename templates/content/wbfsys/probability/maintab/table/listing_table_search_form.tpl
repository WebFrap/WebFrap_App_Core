  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_probability-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_probability-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_probability-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_probability-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_probability-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_probability-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_probability-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_probability-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_probability-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProbabilitySearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProbabilitySearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_probability-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysProbabilitySearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

