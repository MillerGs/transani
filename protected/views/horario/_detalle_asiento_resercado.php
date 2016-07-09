Reservación de asientos
<table class="table"> 
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">Pasajero : </h7>
		</td>
		<td>
			<?php echo $rowc["cliente"];?>
		</td>
	</tr>
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">ASIENTOS : </h7>
		</td>
		<td>
			 
		</td>
	</tr>
	<?php foreach($rowd as $row1) { ?>

	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;"> </h7>
		</td>
		<td>
			<?php echo $row1["nro_asiento"];?>
		</td>
	</tr>
	<?php }?>
	 
</table>