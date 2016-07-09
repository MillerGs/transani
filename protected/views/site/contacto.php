<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;


if (!Yii::app()->user->isGuest) {
?>
    <div class="row">
        <div class="col-md-12">
            <h2>FORMULARIO DE CONTACTO ADMINISTRADOR</h2>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {

    }
    </script>

    <?php
    
}
?>