<?php
 
  require_once 'core/init.php';
  require_once 'core/common.inc.php';

  displayPageHeader(" paging ");
 ?>

	<div class="container">
		<div class="well">
			<h2>Page Navigation</h2>
		</div>

		<div class="well">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Наслов</th>
						<th>Опис</th>
						<th>Датум</th>
						<th>Креиран</th>						
					</tr>
				</thead>

				<tbody>
					<?php
					
					//set the record limit
					$rec_limit = 10;
					
					/* Get total number of records */
					$sql    = "SELECT * FROM view";
					
					$retval = DB::getInstance()->query($sql);					
					$rec_count = $retval->count();
					
					if (isset($_GET{'page'})) {
						$page   = $_GET{'page'} + 1;
						$offset = $rec_limit * $page;
					} else {
						$page   = 0;
						$offset = 0;
					}
					$left_rec = $rec_count - ($page * $rec_limit);

					$sql = "SELECT name, description, user, created FROM view LIMIT $offset, $rec_limit";

					
					$retval = DB::getInstance()->AssQuery($sql);					 
					
					foreach ($retval->results() as $rows) {
										
						echo '<tr>';
						echo '<td>' . $rows['name'] . '</td>';
						echo '<td>' . $rows['description'] . '</td>';
						echo '<td>' . $rows['user'] . '</td>';
						echo '<td>' . $rows['created'] . '</td>';	
												
					}					

					echo '</tr>';
					echo '</tbody>';
					echo '</table>';
					echo '<ul class="pager">';
					if ($left_rec < $rec_limit) {
						$last = $page - 2;
						echo @"<li><a href=\"$_PHP_SELF?page=$last\">Previous</a></li>";
					} else if ($page == 0) {
						echo @"<li><a href=\"$_PHP_SELF?page=$page\"> <li>Next</a></li>";
					} else if ($page > 0) {
						$last = $page - 2;
						echo @"<li><a href=\"$_PHP_SELF?page=$last\">Previous</a></li> ";
						echo @"<li><a href=\"$_PHP_SELF?page=$page\">Next</a></li>";
					}
					echo '</ul>';
					
					?>
				</tbody>
			</table>
		</div>
	</div>


<?php displayPageFooter(); ?>