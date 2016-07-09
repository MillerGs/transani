
<script type="text/javascript">
    $(document).ready(function () {
        $("#txtEmail").jqxInput({placeHolder: "Ingresa tu Email", height: 25, width: 150, minLength: 1});
        $("#txtPass").jqxInput({placeHolder: "Ingresa tu Password", height: 25, width: 150, minLength: 1});

        $("#jqxBtnIngresar").jqxButton({width: '80', theme: 'metrodark'});
        $("#jqxBtnIngresar").on('click', function () {
            fn_Ingresar();
        });


        $("#jqxBtnSalir").jqxButton({width: '80', theme: 'metrodark'});
        $("#jqxBtnSalir").on('click', function () {
            $("#popupIniciarSesion").jqxWindow('close');
        });
    });
    function fn_Ingresar() {
        $("#mensaje_error").html('');
        $("#mensaje_exito").html('');
        $("#cargando").css("display", "inline");
        var str = $("#loginform").serialize();
        $.ajax({
            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/ingresar",
            data: str,
            type: 'post',
            beforeSend: function () {
                $("#cargando").css("display", "inline");
                /*var offset = $("#sesionUsu").offset();
                 $("#popupCargando").jqxWindow({
                 position: { x: parseInt(offset.left) - 155, y: parseInt(offset.top) + 30 },
                 });
                   
                 $("#popupCargando").on('open', function () {
                   
                 }); 
                 $("#popupCargando").jqxWindow('open');  */

            },
            success: function (msg) {
                $("#cargando").css("display", "none");
                if (msg == "0") {
                    $("#msjError").html("");
                    window.location = "<?php echo Yii::app()->createUrl('Site/index'); ?>";

                }
                if (msg == "1") {
                    $("#msjError").html("Email o password incorrecto");
                }
                if (msg == "2") {
                    $("#msjError").html("verifique sus datos");
                }
            },
            error: function (xhr) {
                alert("falló " + xhr.readyState + this.url)

            }
        });
    }
</script>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'loginform',
    'enableClientValidation' => False,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>
<table style="margin: 10px 15px;">
    <tr>
        <td>Email 
        </td>
        <td>

<?php echo $form->textField($model, 'username', array('id' => 'txtEmail', 'type' => "text")); ?>
<?php echo $form->error($model, 'username'); ?>
        </td>
    </tr>
    <tr>
        <td>Contraseña
        </td>
        <td>
<?php echo $form->passwordField($model, 'password', array('id' => 'txtPass', 'type' => "text")); ?>
<?php echo $form->error($model, 'password'); ?>
        </td>
    </tr>
    <tr>
        <td  style="padding-top:10px;">

        </td>
        <td>
            <p class="text-info" id="cargando" style="display:none;">
                <img align="absmiddle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/spinner.gif"/>       Verificando datos...        
            </p>
            <div style="color: red;font-size: 0.9em" id="msjError"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Site/olvideContrasenia/">Recuperar mi contrase&ntilde;a</a></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>

        <td>

        </td>
        <td>
            <input type="button"  value="Ingresar" id='jqxBtnIngresar' />
            <input type="button"  value="Salir" id='jqxBtnSalir' />
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>

