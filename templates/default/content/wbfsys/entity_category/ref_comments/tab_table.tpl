  <?php if( $ELEMENT->tableComments ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionComments.$ELEMENT->tableComments->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdComments?>" >

       <input
        type="hidden"
        name="search_wbfsys_entity_comment[vid]"
        value="<?php echo $VAR->refIdComments?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableComments ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdComments?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.EntityCategory_Ref_Comments.connect<?php echo $ELEMENT->tableComments->getJsAccessPath();?>',{
            'wbfsys_entity_comment[vid]':'<?php echo $VAR->refIdComments?>',
            'wbfsys_entity_comment[id_comment]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>