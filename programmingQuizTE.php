<?

/*====================================
A class used to access the db for navigation items
======================================= */

class Navigation
{
	public get_links($all=true,$parent){
	
		$query = "SELECT
					navigation.*,
					navigation_links.url
				FROM
					navigation
				LEFT JOIN navigation_links ON navigation.id = navigation_links.id
				WHERE 1	";
		if(!$all){
			$query = " AND parent = " . $parent ;
		}
		
		return pg_query($query);
	}
	
	public remove($remove_id){
	
		//remove the link info
		$query = "DELETE FROM
					navigation_links
				WHERE $1	";
		
		pg_query_params($query,array($remove_id));
		
		//remove the navigation item
		$query = "DELETE FROM
					navigation
				WHERE $1	";
		
		return pg_query_params($query,array($remove_id));
		
	}
    
	public add($name,$parent_id,$url){
		$query = "INSERT INTO navigation (name, parent)
					VALUES('$1','$2')";
		$return = pg_query_params($query,array($name,$parent_id));
		
		if($return){
			$query = "INSERT INTO navigation_links (id,url)
					VALUES('$1','$2')";
			return pg_query_params($query,array($return,$url));
		}
		else{
			return false;
		}
	}
}
?>
