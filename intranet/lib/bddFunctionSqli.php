<?php
function total_views($conn, $page_name = null)
{
	if($page_name === null)
	{
		// count total website views
		$query = "SELECT sum(total_views) as total_views FROM pages";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($row['total_views'] === null)
				{
					return 0;
				}
				else
				{
					return $row['total_views'];
				}
			}
		}
		else
		{
			return "No records found!";
		}
	}
	else
	{
		// count specific page views
		$query = "SELECT total_views FROM pages WHERE name='$page_name'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($row['total_views'] === null)
				{
					return 0;
				}
				else
				{
					return $row['total_views'];
				}
			}
		}
		else
		{
			return "No records found!";
		}
	}
}



function is_unique_view($conn, $visitor_ip, $page_name)
{
	$query = "SELECT * FROM page_views WHERE visitor_ip='$visitor_ip' AND page_name='$page_name'";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}



function add_view($conn, $visitor_ip, $page_name)
{

		// insert unique visitor record for checking whether the visit is unique or not in future.
		$query = "INSERT INTO page_views (visitor_ip, page_name) VALUES ('$visitor_ip', '$page_name')";

		if(mysqli_query($conn, $query))
		{
			// At this point unique visitor record is created successfully. Now update total_views of specific page.
			$query = "UPDATE pages SET total_views = total_views + 1 WHERE name='$page_name'";

			if(!mysqli_query($conn, $query))
			{
				echo "Error updating record: " . mysqli_error($conn);
			}
		}
		else
		{
			echo "Error inserting record: " . mysqli_error($conn);
		}
}
?>
