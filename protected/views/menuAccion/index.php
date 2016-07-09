
<?php
$var1 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
    Yii::app()->clientScript->registerScriptFile($var1.'/scripts/jquery-1.11.1.min.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcore.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdata.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxbuttons.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscrollbar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxpanel.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtree.js');
      
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.base.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.arctic.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.ui-start.css');

     


?>

<?php
/* @var $this MenuAccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Menu Accions',
);

$this->menu=array(
	array('label'=>'Create MenuAccion', 'url'=>array('create')),
	array('label'=>'Manage MenuAccion', 'url'=>array('admin')),
);
?>

<h1>Menu Accions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


<script type="text/javascript">
            $(document).ready(function () {
                



                
                var url = "<?php echo Yii::app()->createUrl('MenuAccion/ListaTreeView'); ?>";
	            var source =
	            {
	            	datatype: "json",
	                datafields: [
	                    { name: 'id' },
                        { name: 'parentid' },
                        { name: 'text' },
                        { name: 'value' }
	                ],
	                type:'POST',
	                id: 'id',
	                url: url,
	                root: 'data'
	            };
                // create data adapter.
                var dataAdapter = new $.jqx.dataAdapter(source);
                 // get the tree items. The first parameter is the item's id. The second parameter is the parent item's id. The 'items' parameter represents 
                // the sub items collection name. Each jqxTree item has a 'label' property, but in the JSON data, we have a 'text' field. The last parameter 
                // specifies the mapping between the 'text' and 'label' fields. 
                // perform Data Binding.
                //dataAdapter.dataBind(); 
                var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items', [{ name: 'text', map: 'label'}]);
                $('#jqxListaMenusAccion').jqxTree({ source: dataAdapter, width: '300px'});
            });
        </script>

	<div id='jqxListaMenusAccion'>
    </div>