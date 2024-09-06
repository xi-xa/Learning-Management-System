<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../css_admin/stud.css">
        <body>
            <?php include_once 'navs/nav.php'; ?>
            <center>       
                        <table id="account_table">
                            <thead>
                                <tr>
                                    <div class = "container1">
                                    Student Information
                                    <button type="button" id= "add_student">Add a student</button>
                                    </div>
                                    
                                    <div id="main-modal" class="modal">
                                        <div class="modal-content">
                                            <span class="close-main">&times;</span>
                                            <h2>Add a student</h2>
                
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Subject</th>
                                        <th>Section</th>
                                        <th>Grade-Level</th>
                                        <th>Action</th>
                                        <script src="/admin_script/admin_order.js"></script>
                                    </div>
                                </tr>
                            </thead>
                        <tbody>

                            <?php
                                    include 'connect.php';

                                        // Fetch student and maintenance based on the ID
                                        $sQuery = 
                                        "SELECT
                                        s.SID,
                                        s.first_name, 
                                        s.last_name,
                                        sub.subject,
                                        sec.section,
                                        grd.grade_level
                                    FROM 
                                        tbl_student AS s
                                    INNER JOIN 
                                        tbl_subject AS sub ON s.SID = sub.subID
                                    INNER JOIN
                                        tbl_section AS sec ON s.SID = sec.secID
                                    INNER JOIN
                                        tbl_gradelevel AS grd ON s.SID = grd.gradeID
                                        ";
                                     
                                        $results = $conn ->prepare($sQuery);

                                        $results->execute();

                                        // Get the result set from the executed statement
                                        $results = $results->get_result();

                                        if ($results->num_rows > 0) 
                                        {
                                            while ($row = $results->fetch_assoc()) 
                                            {
                                                echo "<tr>
                                                        <td>{$row['first_name']}</td>
                                                        <td>{$row['last_name']}</td>
                                                        <td>{$row['subject']}</td>
                                                        <td>{$row['section']}</td>
                                                        <td>{$row['grade_level']}</td>
                                                        <td><button type='button' class='btn' onclick=\"window.location.href='update_student.php?id=" .
                                                        $row["SID"] .
                                                        "'\">Update</button>
                                                        <button type='button' class='btn' onclick=\"window.location.href='student_delete.php?id=" .
                                                        $row["SID"] .
                                                        "'\">Delete</button>
                                                        </td>
                                                        
                                                      </tr>";
                                            }
                                        } 
                                        else 
                                        {
                                            echo "<tr><td colspan='3'>No students found</td></tr>";
                                        }
                                    ?>
                                    
                        </tbody>
            </table>
                <script>
                    document.getElementById('add_student').addEventListener('click', function() 
                    {
                        window.location.href = 'add_student.php'; // Replace 'another_file.php' with your actual PHP file
                        
                    });
                    document.getElementById('update_student').addEventListener('click', function()
                    {
                        window.location.href = 'update_student.php'; // Redirect to update_student.php
                    });
                </script>
            </center>  
        </body>
    </head>
</html>
