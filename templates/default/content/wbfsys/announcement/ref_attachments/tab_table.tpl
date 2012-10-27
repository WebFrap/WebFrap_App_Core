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


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdAttachments?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.Announcement_Ref_Attachments.connect<?php echo $ELEMENT->tableAttachments->getJsAccessPath();?>',{
            'wbfsys_entity_attachment[vid]':'<?php echo $VAR->refIdAttachments?>',
            'wbfsys_entity_attachment[id_file]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>