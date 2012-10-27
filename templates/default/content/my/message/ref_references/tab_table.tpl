  <?php if( $ELEMENT->tableReferences ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionReferences.$ELEMENT->tableReferences->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdReferences?>" >

       <input
        type="hidden"
        name="search_wbfsys_message_references[id_message]"
        value="<?php echo $VAR->refIdReferences?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableReferences ?>



  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>