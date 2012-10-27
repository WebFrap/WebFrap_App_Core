  <?php if( $ELEMENT->tableFileType ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionFileType.$ELEMENT->tableFileType->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdFileType?>" >

       <input
        type="hidden"
        name="search_wbfsys_vref_file_type[vid]"
        value="<?php echo $VAR->refIdFileType?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableFileType ?>


    <script type="text/javascript" >
      $S('#<?php echo $VAR->searchFormIdFileType?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.Management_Ref_FileType.connect<?php echo $ELEMENT->tableFileType->getJsAccessPath();?>',{
            'wbfsys_vref_file_type[vid]':'<?php echo $VAR->refIdFileType?>',
            'wbfsys_vref_file_type[id_type]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>