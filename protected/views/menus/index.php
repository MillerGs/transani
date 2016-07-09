
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




<script type="text/javascript">
            $(document).ready(function () {
                



                
                var data = [
                { "id": "2",
                    "parentid": "1",
                    "text": "Hot Chocolate",
                    "value": "$2.3"
                }, {
                    "id": "3",
                    "parentid": "1",
                    "text": "Peppermint Hot Chocolate",
                    "value": "$2.3"
                }, {
                    "id": "4",
                    "parentid": "1",
                    "text": "Salted Caramel Hot Chocolate",
                    "value": "$2.3"
                }, {
                    "id": "5",
                    "parentid": "1",
                    "text": "White Hot Chocolate",
                    "value": "$2.3"
                }, {
                    "text": "Chocolate Beverage",
                    "id": "1",
                    "parentid": "-1",
                    "value": "$2.3"
            }, {
                    "id": "6",
                    "text": "Espresso Beverage",
                    "parentid": "-1",
                    "value": "$2.3"
                }, {
                    "id": "7",
                    "parentid": "6",
                    "text": "Caffe Americano",
                    "value": "$2.3"
                    }, {
                    "id": "8",
                    "text": "Caffe Latte",
                    "parentid": "6",
                    "value": "$2.3"
                }, {
                    "id": "9",
                    "text": "Caffe Mocha",
                    "parentid": "6",
                    "value": "$2.3"
                    }, {
                    "id": "10",
                    "text": "Cappuccino",
                    "parentid": "6",
                    "value": "$2.3"
                }, {
                    "id": "11",
                    "text": "Pumpkin Spice Latte",
                    "parentid": "6",
                    "value": "$2.3"
                    }, {
                    "id": "12",
                    "text": "Frappuccino",
                    "parentid": "-1"
                }, {
                    "id": "13",
                    "text": "Caffe Vanilla Frappuccino",
                    "parentid": "12",
                    "value": "$2.3"
                    }, {
                    "id": "15",
                    "text": "450 calories",
                    "parentid": "13",
                    "value": "$2.3"
                }, {
                    "id": "16",
                    "text": "16g fat",
                    "parentid": "13",
                    "value": "$2.3"
                    }, {
                    "id": "17",
                    "text": "13g protein",
                    "parentid": "13",
                    "value": "$2.3"
                }, {
                    "id": "14",
                    "text": "Caffe Vanilla Frappuccino Light",
                    "parentid": "12",
                    "value": "$2.3"
                    }]
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' ,type: 'string' },
                        { name: 'parentid' ,type: 'string' },
                        { name: 'text' ,type: 'string' },
                        { name: 'value' ,type: 'string' }
                    ],
                    id: 'id',
                    localdata: data
                };
                // create data adapter.
                var dataAdapter = new $.jqx.dataAdapter(source);
                 // get the tree items. The first parameter is the item's id. The second parameter is the parent item's id. The 'items' parameter represents 
                // the sub items collection name. Each jqxTree item has a 'label' property, but in the JSON data, we have a 'text' field. The last parameter 
                // specifies the mapping between the 'text' and 'label' fields. 
                // perform Data Binding.
                dataAdapter.dataBind(); 
                var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items', [{ name: 'text', map: 'label'}]);
                $('#jqxListaMenusAccion').jqxTree({ source: records, width: '300px'});
            });
        </script>

	<div id='jqxListaMenusAccion'>
    </div>