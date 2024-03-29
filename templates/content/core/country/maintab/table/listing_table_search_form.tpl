  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-core_country-advanced"  style="display:none" >

      <div id="wgt_tab-table-core_country-search" class=""  >
        <div 
        	id="wgt_tab-table-core_country-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-core_country-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-core_country-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-core_country-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-core_country-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-core_country-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-core_country-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCountrySearchName;?>
          <?php echo $ELEMENT->inputCoreCountrySearchIdCurrency;?>
          <?php echo $ELEMENT->inputCoreCountrySearchShort;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCountrySearchKey3;?>
          <?php echo $ELEMENT->inputCoreCountrySearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-core_country-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputCoreCountrySearchMRoleCreate?>
              <?php echo $ELEMENT->inputCoreCountrySearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputCoreCountrySearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreCountrySearchMRoleChange?>
              <?php echo $ELEMENT->inputCoreCountrySearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputCoreCountrySearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreCountrySearchMUuid?>
              <?php echo $ELEMENT->inputCoreCountrySearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

