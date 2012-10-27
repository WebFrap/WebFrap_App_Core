

  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-core_skill_requirement-advanced"  style="display:none" >

      <div id="wgt_tab-table-core_skill_requirement-search" class=""  >
        <div 
        	id="wgt_tab-table-core_skill_requirement-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-core_skill_requirement-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-core_skill_requirement-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-core_skill_requirement-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-core_skill_requirement-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-core_skill_requirement-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-table-core_skill_requirement-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMRoleCreate?>
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMRoleChange?>
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMUuid?>
              <?php echo $ELEMENT->inputCoreSkillRequirementSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->tableCoreSkillRequirement; ?>

  <div class="wgt-clear xsmall">&nbsp;</div>


<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
