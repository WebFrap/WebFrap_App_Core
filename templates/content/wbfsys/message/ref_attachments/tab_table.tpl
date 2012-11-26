  <?php if( $ELEMENT->tableAttachments ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionAttachments.$ELEMENT->tableAttachments->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdAttachments?>" >

       <input
        type="hidden"
        name="search_wbfsys_entity_attachment[vid]"
        value="<?php echo $VAR->refIdAttachments?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableAttachments ?>



  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>