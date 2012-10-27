  <?php if( $ELEMENT->tableGroupUsers ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionGroupUsers.$ELEMENT->tableGroupUsers->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdGroupUsers?>" >

       <input
        type="hidden"
        name="search_wbfsys_group_users[id_group]"
        value="<?php echo $VAR->refIdGroupUsers?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableGroupUsers ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdGroupUsers?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.RoleGroup_Ref_GroupUsers.connect<?php echo $ELEMENT->tableGroupUsers->getJsAccessPath();?>',{
            'wbfsys_group_users[id_group]':'<?php echo $VAR->refIdGroupUsers?>',
            'wbfsys_group_users[id_user]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>