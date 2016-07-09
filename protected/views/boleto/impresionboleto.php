


<div id="border-radius-panel" style="border-radius: 16px; border: 1px solid rgb(0, 0, 0) ">
 

	<img style="float:right;position: absolute; top: 0; left: 0" height="110px" src="<?php echo Yii::app()->request->baseUrl;?>/images/ico_lgo2.png">
	<div style="margin:10px;">
		<?php echo '<img height="50px" src="'.Yii::app()->request->baseUrl.'/images/banner.png">';?><br>
		<div style="display:inline;left: 100;position:relative;">
					Turismo Transani S.A.C.<br>
					RUC : 34564567898
		</div>
		<div style="color: rgb(240, 5, 5); cursor: auto; font-family: arial, sans-serif; font-size: 25px; display: block; font-weight: bold;">N° <?php echo $data["serie"]."-".$data["numero"];?></div>
		<table style=" border: 1px solid rgb(0, 0, 0)">
			<tr>
				<td>
					Nombres : <div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["cliente"];?></div>
				</td>
				<td style="padding-left:40px;">
					Origen : <div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["origen2"];?></div>
				</td>
				<td style="padding-left:40px;">
					Destino : <div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["destino2"];?></div>
				</td>
			</tr>
			<tr>
				<td>
					Fecha : <div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["fechaviaje"];?></div>
				</td>
				<td style="padding-left:40px;">
					Hora : <div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["horaviaje"];?></div>
				</td>
				<td style="padding-left:40px;">
					N° Asiento : <div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["nroasiento"];?></div>
				</td>
				<td style="padding-left:40px;">
					Precio : S/<div style=" font-size:15px;position:absolute;top:0;left:0;"><?php echo $data["precio"];?></div>
				</td>

			</tr>
		</table>
		<table style=" border: 1px solid rgb(0, 0, 0);display:inline;">
			<tr>
				<td>
					IMPORTANTE. Todo pasajero debe estar 1/2 hora antes de la partida. Conserve su boleto para presentarlo al inspector
				</td> 
			</tr>
		</TABLE>
	</div>


</div>