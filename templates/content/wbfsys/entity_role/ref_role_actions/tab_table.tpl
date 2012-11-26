  <?php if( $ELEMENT->tableRoleActions ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionRoleActions.$ELEMENT->tableRoleActions->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdRoleActions?>" >

       <input
        type="hidden"
        name="search_wbfsys_entity_role_actions[id_role]"
        value="<?php echo $VAR->refIdRoleActions?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableRoleActions ?>



  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>