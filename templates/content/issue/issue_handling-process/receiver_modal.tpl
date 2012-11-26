<?php

$iconResponsible = $this->icon( 'control/receiver.png', 'Responsible' );
$iconCreateMsg = $this->icon( 'message/create.png', 'Create' );

?>  

<?php if( $VAR->responsibles ){ ?>
<div>
<table class="wgt_table bw4"  >
  <thead>
    <tr>
      <th class="pos" >Pos:</th>
      <th>User</th>
      <th>Name</th>
      <th>Menu</th>
    </tr>
  </thead>
  <tbody>
<?php 


$pos = 1;
foreach( $VAR->responsibles as $reponsible )
{
  
  echo <<<HTML
  <tr>
    <td class="pos" >{$pos}</td>
    <td>{$reponsible->nickname}</td>
    <td>{$reponsible->lastname}</td>
    <td>{$reponsible->firstname}</td>
    <td><button class="wgtac_send_message wgt-button" wgt_id="{$reponsible->id}" >{$iconCreateMsg}</button></td>
  </tr>
HTML;

  ++$pos;
}

?>
  </tbody>
</table>
</div>
<?php }else{ ?>
<p>Found no Users</p>
<?php } ?>

<div class="wgt-clear" ></div>

<?php $this->addJsCode( <<<JS

self.find('.wgtac_send_message').each(function(){
  \$S(this).click(function(){
    \$S.modal.close();
  	\$R.get( 'modal.php?c=Webfrap.ContactForm.formUser&user_id='+\$S(this).attr('wgt_id') );
  });
});

JS
); ?>
    
