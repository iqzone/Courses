<?php
/* @var $this CoursesController */
/* @var $model Courses */


$this->widget('application.components.CCBreadcrumbs', array(
                                      'links' => array(
                                                	'Courses'=>array('index'),
                                                        $model->name,
                                      ),
)); 

?>


<div class="row">
    <div class="grid-8">
        <div class="well">
            <fieldset>
                <legend><b><?php echo CHtml::encode( $model->name ); ?></b></legend>
                <h5>Objetivo</h5>
                <p><?php echo $model->target ?></p>

                <h5>Descripción</h5>
                <p><?php echo $model->description ?></p>
                <fieldset>
                    <legend>Acerca del instructor</legend>
                </fieldset>
            </fieldset>
        </div>
    </div>
    <div class="grid-3 right-sidebar">
        <div class="well">
            <fieldset>
                <legend style="font-size: 14px;">Formas de pago</legend>
                <?php foreach( $model->getPayforms( 'infoByCriteria' ) as $payform ): ?>
                    <a href="" class="btn btn-warning payforms"><i class="icon-shopping-cart icon-large"></i>&nbsp;&nbsp;<?php echo $payform->name ?></a>
                <?php endforeach; ?>
            </fieldset>
        </div>
        <div class="clear"><br /></div>
        <div class="well">
            <fieldset>
                <legend style="font-size: 14px;">Descargas</legend>
            </fieldset>
        </div>
    </div>
</div>
<!--form name='formTpv' method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr'>

	<input type='hidden' name='cmd' value='_xclick'>
	<input type='hidden' name='business' value='mi_cuenta_sandbox@mi_pagina.com'>
	<input type='hidden' name='item_name' value='Nueva compra en mi web'>
	<input type='hidden' name='item_number' value='VENTA-X2561'>
	<input type='hidden' name='amount' value='10.15'>
	<input type='hidden' name='page_style' value='primary'>
	<input type='hidden' name='no_shipping' value='1'>
	<input type='hidden' name='return' value='http://mi_pagina/exito.html'>
	<input type='hidden' name='rm' value='2'>
	<input type='hidden' name='cancel_return' value='http://mi_pagina/cancelada.html'>
	<input type='hidden' name='no_note' value='1'>
	<input type='hidden' name='currency_code' value='EUR'>
	<input type='hidden' name='cn' value='PP-BuyNowBF'>
	<input type='hidden' name='custom' value=''>
	<input type='hidden' name='first_name' value='NOMBRE'>
	<input type='hidden' name='last_name' value='APELLIDOS'>
	<input type='hidden' name='address1' value='DIRECCIÓN'>
	<input type='hidden' name='city' value='POBLACIÓN'>
	<input type='hidden' name='zip' value='CÓDIGO POSTAL'>
	<input type='hidden' name='night_phone_a' value=''>
	<input type='hidden' name='night_phone_b' value='TELÉFONO'>
	<input type='hidden' name='night_phone_c' value=''>
	<input type='hidden' name='lc' value='es'>
	<input type='hidden' name='country' value='ES'>
</form>
<script type='text/javascript'>
	document.formTpv.submit();
</script-->