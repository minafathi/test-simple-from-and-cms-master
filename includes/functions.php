<?php
function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function find_all_subjects() {
	    global $connetction;
	    $query = "SELECT * ";
	    $query .= "FROM subjects ";
	    $query .= "WHERE visible = 1 ";
	    $query .= "ORDER BY position ASC";
	    $subjects_set = mysqli_query($connetction, $query);
                 return $subjects_set;
	}

	function find_all_page($subject_id){
			global $connetction;
		    	$query = "SELECT * ";
                                    $query .= "FROM pages ";
                                    $query .= "WHERE visible = 1 ";
                                    $query .= "AND subject_id = {$subject_id}";
                                    $query .= " ORDER BY position ASC";
                                    $page_set = mysqli_query($connetction, $query);
                                    return $page_set;
	}
?>