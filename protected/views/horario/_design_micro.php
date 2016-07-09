<table>
		<tr><td>	 
				<img align="absmiddle" style="display:inline;width:280px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bus_front.png"/>  
			 
		 </td></tr>
		 <tr><td>
		<table>
			<tr>
				<td  style="vertical-align:top">
					<table style="border: 1px solid black;width: auto;vertical-align:top">
						<?php 
							$i = 1;
							while ($i <= $nroasientos) {

						?>
						<tr>
							<td style="padding-left:10px;padding-right:3px;padding-top:5px;padding-bottom:5px;" class="btnnroasss">
								<?php if($i <= $nroasientos){?>
								<button type="button" onclick="fn_verDetalleAsiento(<?php echo $i;?>)" style="width:50px;"   class="btn btn-sm btn-default"> 
									<div id="imgEstadoasiento<?php echo $i;?>" style="display:inline;"></div>
									<div style="display:inline;" id="idnroasiento<?php echo $i;?>" class="class_asientoDesc"><?php echo $i;?></div>
								</button>
								<?php }?>
							</td>
							<td style="padding-left:3px;padding-right:10px;padding-top:5px;padding-bottom:5px;" class="btnnroasss">
								<?php if($i+1 <= $nroasientos){?>
								<button type="button" onclick="fn_verDetalleAsiento(<?php echo $i+1;?>)" style="width:50px;"   class="btn btn-sm btn-default"> 
									<div id="imgEstadoasiento<?php echo $i+1;?>" style="display:inline;"></div>
									<div style="display:inline;" id="idnroasiento<?php echo $i+1;?>" class="class_asientoDesc"><?php echo $i+1;?></div>
								</button>
								<?php }?>
							</td>
						</tr>
						<?php 
								$i=$i+4;
							}
						?>
					</table>
				</td>
				<td  style="vertical-align:top">
					<table style="border: 1px solid black;width: auto;vertical-align:top">
						<?php 
							$i = 1;
							while ($i <= $nroasientos) {
								$i=$i+3;

						?>
						<tr>
							<td style="padding-left:10px;padding-right:3px;padding-top:5px;padding-bottom:5px;" class="btnnroasss">
								<?php if($i <= $nroasientos){?>
								<button type="button" onclick="fn_verDetalleAsiento(<?php echo $i;?>)" style="width:50px;"   class="btn btn-sm btn-default"> 
									<div id="imgEstadoasiento<?php echo $i;?>" style="display:inline;"></div>
									<div style="display:inline;" id="idnroasiento<?php echo $i;?>" class="class_asientoDesc"><?php echo $i;?></div>
								</button>
								<?php }?>
							</td>
							<td style="padding-left:3px;padding-right:10px;padding-top:5px;padding-bottom:5px;" class="btnnroasss">
								<?php if($i-1 <= $nroasientos){?>
								<button type="button" onclick="fn_verDetalleAsiento(<?php echo $i-1;?>)" style="width:50px;"   class="btn btn-sm btn-default"> 
									<div id="imgEstadoasiento<?php echo $i-1;?>" style="display:inline;"></div>
									<div style="display:inline;" id="idnroasiento<?php echo $i-1;?>" class="class_asientoDesc"><?php echo $i-1;?></div>
								</button>
								<?php }?>
							</td>
						</tr>
						<?php  
								$i=$i+1;
							}
						?>
					</table>
				</td>
			</tr>
		</table>
</table>
