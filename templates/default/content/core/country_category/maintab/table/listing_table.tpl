

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-core_country_category-advanced"  style="display:none" >

      <div id="wgt_tab-table-core_country_category-search" class=""  >
        <div 
        	id="wgt_tab-table-core_country_category-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-core_country_category-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-core_country_category-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-core_country_category-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-core_country_category-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-core_country_category-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-core_country_category-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputCoreCountryCategorySearchTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCountryCategorySearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCountryCategorySearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-core_country_category-search-content-description"
          title="Description"
          wgt_key="description" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreCountryCategorySearchDescription;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-core_country_category-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMRoleCreate?>
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMRoleChange?>
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMUuid?>
              <?php echo $ELEMENT->inputCoreCountryCategorySearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableCoreCountryCategory; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
