  <?php if( $ELEMENT->tableGroupProfiles ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionGroupProfiles.$ELEMENT->tableGroupProfiles->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdGroupProfiles?>" >

       <input
        type="hidden"
        name="search_wbfsys_group_profiles[id_group]"
        value="<?php echo $VAR->refIdGroupProfiles?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableGroupProfiles ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdGroupProfiles?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.RoleGroup_Ref_GroupProfiles.connect<?php echo $ELEMENT->tableGroupProfiles->getJsAccessPath();?>',{
            'wbfsys_group_profiles[id_group]':'<?php echo $VAR->refIdGroupProfiles?>',
            'wbfsys_group_profiles[id_profile]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>