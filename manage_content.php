<?php require_once("./includes/databases.php");  ?>
<?php require_once("./includes/functions.php");  ?>
<?php
    if (isset($_GET["subject"])) {
        $selected_subject_id = $_GET["subject"];
        $selected_page_id = null;
    } elseif (isset($_GET["page"])) {
        $selected_subject_id = null;
        $selected_page_id = $_GET["page"];
        
    }else {
        $selected_subject_id = null;
        $selected_page_id = null;
    }
?>    
<!DOCTYPE html>
<html>
<head>
	<title>Admin Menu</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/public.css">
</head>
<body>
<div id="main">
  <div id="navigation">
  <?php  
   $subjects_set = find_all_subjects();
    confirm_query($subjects_set);
?>

 <ul class="subjects">
                <?php
                    while ($subject = mysqli_fetch_assoc($subjects_set)) {
                            // output data from each row 
                         ?>
                       <a href="manage_content.php?subject=<?php echo urlencode($subject['id']); ?>">
                        <?php echo $subject["menu_name"] ; ?>
                       
                       <?php
                       ?>
            <li>
                        <?php
                                 $page_set =  find_all_page($subject["id"]);
                                  confirm_query($page_set);
                        ?>
                                            <ul class="pages">
                    <?php
                                             while ($page = mysqli_fetch_assoc($page_set)) {
                                                ?>
                                           <a href="manage_content.php?page=<?php echo urlencode($page['id']); ?>">

                                           <?php echo $page["menu_name"] ; ?>
                                            </a>
                                          </li>
                                          </br>
                        
                
           <?php
                    }
                ?>
                 <?php 
                                // 4. Relese returned data
                                    mysqli_free_result($page_set);
                 ?>
                                        </ul>
                                         </li>
                        <?php
                    }
                ?>

                 <?php 
                                // 4. Relese returned data
                                    mysqli_free_result($subjects_set);
                 ?>
    </ul>
  </div>

  <div id="page">
    <h2>mange content</h2>
      <?php echo $selected_page_id; ?>
    <?php echo $selected_subject_id; ?>
    </div>
</body>
</html>
<?php  
    // 5. clese databese cpnnection
    mysqli_close($connetction);
?>