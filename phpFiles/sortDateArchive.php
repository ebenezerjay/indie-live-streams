<?php
// make connection to database
	$sortDisplayData = new mysqli("localhost:3306", "indieliv_eb", "Helpontheway2112!", "indieliv_Streams");
			
// check connection
if ($sortDisplayData->connect_error) {
	die('Connect error: ' . $sortDisplayData->connect_errno . ': ' . $sortDisplayData->connect_error);
} 

// select table data and sort by name
$dateSortQuery = mysqli_query($sortDisplayData,"SELECT artistName, streamDate, streamTime, link, genre, platform FROM Archive ORDER BY streamDate");

// output data of each row
if(mysqli_num_rows($dateSortQuery) > 0) {
	$submissions = mysqli_fetch_all($dateSortQuery,MYSQLI_ASSOC);
	foreach($submissions as $submission) : ?>
		<tr id="tr-id-date-sort">
			<td class="td-name"><?php echo $submission['artistName']; ?> </td>
			<td class="td-date"><?php echo $submission['streamDate']; ?> </td>
			<td class="td-time"><?php echo $submission['streamTime']; ?> </td>
			<td class="td-link"><a href="<?php echo $submission['link'];?>">Web Address For Live Stream</a></td>
			<td class="td-genre"><?php echo $submission['genre']; ?> </td>
			<td class="td-platform"><?php echo $submission['platform']; ?> </td>
		</tr>
		<?php endforeach;
 }
?>