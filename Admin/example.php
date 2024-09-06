<?php if(isset($_POST['search']) || isset($_POST['grade']) )
{
				@$search = $_POST['search'];
				@$grade = $_POST['grade'];
				@$subject = $_POST['subject'];
				
				if ($search != NULL || $grade != "" || $subject != "")
                {
					$sql = "SELECT
                    --selecting tables -->
						tbl_restriction.ID,
						tbl_restriction.Teacher_Code,
						tbl_restriction.Grade_Level,

                       --concating tables --> 
						GROUP_CONCAT(tbl_restriction.Subject_Code SEPARATOR ', ') AS Subject_Codes,
						tbl_restriction.Sy,
                
						CONCAT(tbl_teacherinfo.FNAMES, ' ', tbl_teacherinfo.MNAMES, ' ', tbl_teacherinfo.LNAMES) AS Teacher_Name
					FROM
						tbl_restriction
						INNER JOIN tbl_teacherinfo ON tbl_restriction.Teacher_Code = tbl_teacherinfo.ID
					WHERE 
						(tbl_restriction.ID LIKE '%$search%' OR 
						tbl_restriction.Subject_Code LIKE '%$search%' OR  
						tbl_restriction.Grade_Level LIKE '%$search%' OR 
						CONCAT(tbl_teacherinfo.FNAMES, ' ', tbl_teacherinfo.MNAMES, ' ', tbl_teacherinfo.LNAMES) LIKE '%$search%')";
					
					if ($grade != "") {
						$sql .= " AND tbl_restriction.Grade_Level = '$grade'";
					}
					
					if ($subject != "") {
						$sql .= " AND tbl_restriction.Subject_Code = '$subject'";
					}
					
					$sql .= " GROUP BY Teacher_Code, Grade_Level;";
				} 
                else
                 {
					$sql = "SELECT
						tbl_restriction.ID,
						tbl_restriction.Teacher_Code,
						tbl_restriction.Grade_Level,
						GROUP_CONCAT(tbl_restriction.Subject_Code SEPARATOR ', ') AS Subject_Codes,
						tbl_restriction.Sy,
						CONCAT(tbl_teacherinfo.FNAMES, ' ', tbl_teacherinfo.MNAMES, ' ', tbl_teacherinfo.LNAMES) AS Teacher_Name
					FROM
						tbl_restriction
						INNER JOIN tbl_teacherinfo ON tbl_restriction.Teacher_Code = tbl_teacherinfo.ID
					GROUP BY Teacher_Code, Grade_Level;";
				}
			}
            else
            {

                $sql = "SELECT
                tbl_restriction.Teacher_Code,
                GROUP_CONCAT(DISTINCT tbl_restriction.Grade_Level ORDER BY tbl_restriction.Grade_Level ASC) AS Grade_Level,
                GROUP_CONCAT(tbl_restriction.Subject_Code ORDER BY tbl_restriction.Grade_Level ASC SEPARATOR ', ') AS Subject_Codes,
                CONCAT(tbl_teacherinfo.FNAMES, ' ', tbl_teacherinfo.MNAMES, ' ', tbl_teacherinfo.LNAMES) AS Teacher_Name
                FROM
                tbl_restriction
                INNER JOIN
                tbl_teacherinfo ON tbl_restriction.Teacher_Code = tbl_teacherinfo.TID
                GROUP BY
                tbl_restriction.Teacher_Code;";
            }


?>