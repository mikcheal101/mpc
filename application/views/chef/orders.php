<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="table-striped">
				<table class="table" id="ordersTable">
					<thead>
						<th>#</th>
						<th>Meal</th>
						<th>Servings / Portions</th>
						<th>Duration</th>
						<th><i class="glyphicon glyphicon-cog"></i></th>
					</thead>
					<tfoot>
						<th width="5%">#</th>
						<th>Meal</th>
						<th width="20%">Servings / Portions</th>
						<th width="25%">Duration</th>
						<th width="25%"><i class="glyphicon glyphicon-cog"></i></th>
					</tfoot>
					<tbody>
						<?php $i=0; ?>
						<?php  foreach($orders as $order):?>
							<tr>
								<td><?=(++$i);?></td>
								<td><?=$order->name;?></td>
								<td><?=$order->servings;?> Portions</td>
								<td>
									<input type="number" min="0" value="" placeholder="Hours e.g 2" maxlength="2" class="form-control col-sm-2" />
									<input type="number" min="0" value="" placeholder="Minutes e.g 30" maxlength="2" class="form-control col-sm-2" />
								</td>
								<td>
									<label class="active">
										<input type="radio" class="status" name="status[<?=$i;?>]" value="1" checked="checked" />
										Pending
									</label>
									<label class="">
										<input type="radio" class="status info" name="status[<?=$i;?>]" value="2"  />
										Preparing
									</label>
									<label class="">
										<input type="radio" class="status success" name="status[<?=$i;?>]" value="3" />
										Sent Out
									</label>
								</td>
								
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>