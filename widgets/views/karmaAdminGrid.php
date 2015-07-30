<?php
// $this->widget('zii.widgets.grid.CGridView', array(
//     'id' => 'ss-grid',
//     'dataProvider' => $reportedContent,
//     'columns' => array(
// 		array(            // display 'create_time' using an expression
// 		    'name'=>'id',
// 		    'value'=>'ID'
// 		)
//     ),
// ));
?>

<div id="reportedcontent-grid" class="grid-view">

<table class="table table-hover">
	<thead>
		<tr>
			<th id="reportedcontent-grid_c0">ID</th>
			<th id="reportedcontent-grid_c1">Name</th>
			<th id="reportedcontent-grid_c2">Points</th>
			<th id="reportedcontent-grid_c3">Description</th>
		</tr>
	</thead>
	<tbody>
		<!-- <td colspan="6" class="empty"><span class="empty">No results found.</span></td> -->
		<tr>
			<td>1</td>
			<td>join</td>
			<td>1</td>
			<td>Earned when joining</td>
		</tr> 
		<tr>
			<td>2</td>
			<td>asked</td>
			<td>5</td>
			<td>Asked a question</td>
		</tr> 
		<tr>
			<td>3</td>
			<td>answered</td>
			<td>3</td>
			<td>Wrote answer</td>
		</tr> 
		<tr>
			<td>4</td>
			<td>question up vote</td>
			<td>10</td>
			<td>User's question up voted</td>
		</tr>
		<tr>
			<td>5</td>
			<td>answer up vote</td>
			<td>10</td>
			<td>User's answer up voted</td>
		</tr>
		<tr>
			<td>6</td>
			<td>best answer</td>
			<td>10</td>
			<td>User's answer selected as best answer</td>
		</tr> 
	</tbody>
</table>

</div>

