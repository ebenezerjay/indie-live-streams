<?php
  // connect to database
	$searchData = new mysqli("localhost:3306", "indieliv_eb", "Helpontheway2112!", "indieliv_Streams");
	
	// check connection 
if ($searchData->connect_error) {
	die('Connect error: ' . $searchData->connect_errno . ': ' . $searchData->connect_error);
} 

// get search text
$searchText = $_POST['navSearchInput'];

// selects data based on search input
$query = "SELECT * FROM streamerData WHERE artistName like '%$searchText%' ";

// assigns query data to variable
$result = mysqli_query($searchData,$query);

// loop through table data on database and insert into dom table
if(mysqli_num_rows($result) > 0) {
	$submissions = mysqli_fetch_all($result,MYSQLI_ASSOC);
	foreach($submissions as $submission) : ?>
		<tr id="tr-search-id">
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
