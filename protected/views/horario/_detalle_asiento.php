

<table class="table">
	<tr>
		<td>
			<h4 style="display:inline;font-weight: bold;">Boleto N°</h4> 
		</td>
		<td>
			<?php echo $row["serie"];?>-<?php echo $row["numero"];?> 
		</td>
	</tr>
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">Pasajero : </h7>
		</td>
		<td>
			<?php echo $row["cliente"];?>
		</td>
	</tr>
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">Asiento N° : </h7>
		</td>
		<td>
			<?php echo $row["nroasiento"];?>
		</td>
	</tr>
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">Fecha : </h7>
		</td>
		<td>
			<?php echo $row["fechaviaje"];?>
		</td>
	</tr>
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">Hora : </h7>
		</td>
		<td>
			<?php echo $row["horaviaje"];?>
		</td>
	</tr>
	<tr>
		<td>
			<h7 style="display:inline;font-weight: bold;">Precio : </h7>
		</td>
		<td>
			S/<?php echo $row["precio"];?>
		</td>
	</tr>
</table>
 
    