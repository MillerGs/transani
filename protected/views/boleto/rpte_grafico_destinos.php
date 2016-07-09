

<?php
/* @var $this NoticiaController */
/* @var $dataProvider CActiveDataProvider */

 

$var1 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.ComponenteJQ'));
    Yii::app()->clientScript->registerScriptFile($var1.'/scripts/jquery-1.10.2.min.js');

    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcore.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdata.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxchart.js');
    Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxbuttons.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxscrollbar.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxlistbox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxmenu.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtree.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxcombobox.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdropdownlist.js');
       Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxdragdrop.js');
       Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxtooltip.js');
        Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxexpander.js');
      Yii::app()->clientScript->registerScriptFile($var1.'/jqwidgets/jqxslider.js');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.base.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.arctic.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.ui-start.css');
      Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.ui-darkness.css');
    Yii::app()->clientScript->registerCssFile($var1.'/jqwidgets/styles/jqx.orange.css');

     $var2 =Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.btsap311'));
     Yii::app()->clientScript->registerCssFile($var2.'/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile($var2.'/css/bootstrap-theme.min.css');

    Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/cuadros_msjs.css');
?>
<script type="text/javascript">
  var MouseensimaGrafico=0;
  var maxValor=100;
  $(document).ready(function () {

      var priceslider = $('#priceSlider');
          priceslider.jqxSlider({ showButtons: true,  height: 30, min: 5, max: 100, step: 5, ticksFrequency: 5, mode: 'fixed', values: [5, 5000], rangeSlider: true, width: 164 });
            document.getElementById('priceMax').innerHTML = "100";
            document.getElementById('priceMin').innerHTML = "5";
          $('#priceSlider').on('change', function (event) {
             $("#chartContainer").html("");
             $('#chartContainer').jqxChart('refresh');
             //alert($('#priceSlider').jqxSlider('value').rangeStart);
             maxValor=$('#priceSlider').jqxSlider('value').rangeStart;
             document.getElementById('priceMin').innerHTML = maxValor;
            cargarGrafico();

          });


      $('#jqxExpander').jqxExpander({theme:"ui-darkness", showArrow: true, toggleMode: 'none', width: '100%', height: '430px'});
           
      var url = "<?php echo Yii::app()->createUrl('Boleto/verJsoncats'); ?>";
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'idcategoria', type: 'string' },
                    { name: 'categoria_nombre', type: 'string' }
                ],
                id: 'idcategoria',
                url: url,
                root: 'data'
            };
      var ii=0;
      var dataAdapter = new $.jqx.dataAdapter(source);
      $('#jqxListBox').jqxListBox({
          allowDrop: true, allowDrag: true,
          theme: 'ui-start',
          source: dataAdapter,
          displayMember: "categoria_nombre",
          valueMember: "idcategoria",
          itemHeight: 20,
          height: 430,
          width: '100%',
          renderer: function (index, label, value) {
              //var datarecord = data[index];
              var table = '<div class="dranddr">' + label+ '</div>'; 
              return table;
          }

      });
      cargarCatscmb();
      $("#jqxListBox").on('dragStart', function (event) {
        $(this).jqxDragDrop('data', {
                        price: 34,
                        name: "asasas"
                    });
      });
      $("#jqxListBox").on('dragEnd', function (event) {
              $("#jqxComboBox").jqxComboBox('insertAt', { label: event.args.label,value: event.args.value}, 1 );
               
              $("#jqxComboBox").jqxComboBox('selectIndex', 1 ); 
              $("#jqxComboBox").jqxComboBox('selectIndex', 2 ); 
              $("#jqxComboBox").jqxComboBox('selectIndex', 0 );
              $("#jqxListBox").jqxListBox('removeItem', event.args.value);
                    //alert(event.args.value);
              cargarGrafico();
                });
      cargarGrafico();
      $("#jqxListBox").jqxTooltip({ content: ' <i>Arrastre las ciudades a la gráfica para mostrar el repote</i>', position: 'mouse', autoHide: false, name: 'movieTooltip'});
  });
function mouseEnGrafico(elEvento) {
    
}
function cargarGrafico(){

    var items = $("#jqxComboBox").jqxComboBox('getItems');

    var miArray = new Array();
    var myJSONObject=new Array();
    var ind=0;
    var index=0;
    for (index = 0; index < items.length; ++index) {
     //alert(items[index].value);
      miArray[index] = items[index].value;
       myJSONObject[index]={"dataField": items[index].label, "displayText": items[index].label};
    } 
    
    
    if(index==0)
    {
      
    }
    var jsonString = JSON.stringify(miArray);
    var settings1 = {
                        title: "Reporte gráfico Ocurrencias de viajes ",
                        description: "N° de Viajes por Destino",};
    $('#chartContainer').jqxChart(settings1);
            var sampleData;
            $.ajax({
                url:  "<?php echo Yii::app()->createUrl('boleto/VerJson_grafico_destinos'); ?>",
                data: {
                    cats:jsonString
                },
                dataType: 'json',
                type: 'post',
                success: function(data)
                {
                    if(data){
                    var settings = {
                        title: "Reporte gráfico Ocurrencias de viajes",
                        description: "N° de Viajes por Destino",
                        padding: { left: 5, top: 5, right: 5, bottom: 5 },
                        titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                        source: data,
                        categoryAxis:
                            {
                                dataField: 'Day',
                                showGridLines: false
                            },
                        colorScheme: 'scheme09',
                        showToolTips: false,
                        enableAnimations: true,
                        seriesGroups:
                            [
                                {
                                    type: 'column',
                                    valueAxis:
                                    {
                                        minValue: 0,
                                        maxValue: maxValor,
                                        unitInterval: 10,
                                        description: 'Cantidad de viajes'
                                    },
                                    mouseover: myEventHandler,
                                    mouseout: myEventHandler,
                                    click: myEventHandler,
                                    series: myJSONObject
                                }
                            ]
                    };

                    function myEventHandler(e) {
                        var eventData = '<div style="padding:6px;margin-left:30px;" class="alert alert-success"><b><span class="label label-success"><span class="glyphicon glyphicon-bookmark"></span>Estado: </span></b><b> ' + e.serie.dataField + '</b><b>,<span class="label label-warning"><span class="glyphicon glyphicon-eye-open"></span> N° de Proyectos:</span> </b><b>' + e.elementValue + "</b></div>";
                        $('#eventText').html(eventData);
                    };
                    // select the chartContainer DIV element and render the chart.
                      $('#chartContainer').jqxChart(settings);
                    }     
                }
            });
}
function cargarCatscmb(){
        var countries = new Array();
                // Create a jqxComboBox
                $("#jqxComboBox").jqxComboBox({showArrow: false,theme:"arctic",source: countries, multiSelect: true, width: '100%', height: 25});  
                // trigger selection changes.
                $("#jqxComboBox").on('unselect', function (event) {
                  var items = $("#jqxComboBox").jqxComboBox('getSelectedItems');
                  var args = event.args;
                  var item = args.item;
                  $("#jqxComboBox").jqxComboBox('removeAt', args.index);
                   $("#jqxListBox").jqxListBox('insertAt', { label: item.label, value: item.value}, 1 ); 
                   cargarGrafico();
                });
    }
</script>
 

<div class="row">
  <div class="col-sm-3">
    <div class="row">
          <div class="col-sm-12">
            <div class="infoYhody">
                <div >Máximo valor en gráfica</div>
                    <div class="options-value">
                        <div style="float: left" id="priceMin">
                        </div>
                        <div style="float: right" id="priceMax">
                        </div>
                    </div>
                    <br />
                    <div filter="price" id='priceSlider'>
                    </div>
            </div>
          </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div id='jqxExpander'>
              <div>
                  Estados
              </div>
              <div style="overflow: hidden;">
                  <div id='jqxListBox'></div>
              </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
            <div style="margin-top: 5px;" id='jqxComboBox'>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div id='chartContainer' style="width:'100%';padding-left:13px;padding-right:13px; height: 400px"/>
            
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id='eventText' style="width:600px; height: 30px"/>
        </div>
      </div>
  </div>
</div> 
</div>
  
    

