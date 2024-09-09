<?php
            if (isset($_POST['category'])) {
                $category = $_POST['category'];

                // Database connection parameters
                include 'connect.php'; // This should include your connection setup

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                if ($category === 'admin') {
                    $sql = "SELECT Aid, username, fname, lname, email, phone, admin_ID, Role FROM tbl_admin";
                    $result = $conn->query($sql);

                    echo "<table>
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["username"]) . "</td>
                                    <td>" . htmlspecialchars($row["fname"]) . "</td>
                                    <td>" . htmlspecialchars($row["lname"]) . "</td>
                                    <td>" . htmlspecialchars($row["email"]) . "</td>
                                    <td>
                                        <button type='button' class='btn-actions' onclick=\"window.location.href='update_admin.php?id=" . $row["Aid"] . "'\">Update</button>
                                        <button type='button'  class='btn-actions' onclick=\"window.location.href='delete_admin.php?id=" . $row["Aid"] . "'\">Delete</button>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    echo "</tbody></table>";
                }
                if ($category === 'students') {
                    $sql = "SELECT SID, first_name, last_name, phone_number, email, address FROM tbl_student";
                    $result = $conn->query($sql);

                    echo "<table>
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                    <td>" . htmlspecialchars($row["last_name"]) . "</td>
                                    <td>" . htmlspecialchars($row["phone_number"]) . "</td>
                                    <td>" . htmlspecialchars($row["email"]) . "</td>
                                    <td>" . htmlspecialchars($row["address"]) . "</td>
                                    <td>
                                        <button type='button' c class='btn-actions' onclick=\"window.location.href='update_student.php?id=" . $row["SID"] . "'\">Update</button>
                                        <button type='button'  class='btn-actions' onclick=\"window.location.href='delete_student.php?id=" . $row["SID"] . "'\">Delete</button>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    echo "</tbody></table>";
                } 
                if ($category === 'teachers') 
                {
                    $sql = "SELECT TID, first_name, last_name, phone_number, email, address FROM tbl_teacher";
                    $result = $conn->query($sql);

                    echo "<table>
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";

                    if ($result->num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) 
                        {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                    <td>" . htmlspecialchars($row["last_name"]) . "</td>
                                    <td>" . htmlspecialchars($row["phone_number"]) . "</td>
                                    <td>" . htmlspecialchars($row["email"]) . "</td>
                                    <td>" . htmlspecialchars($row["address"]) . "</td>
                                    <td>
                                        <button type='button'  class='btn-actions' onclick=\"window.location.href='update_teacher.php?id=" . $row["TID"] . "'\">Update</button>
                                        <button type='button'  class='btn-actions' onclick=\"window.location.href='delete_teacher.php?id=" . $row["TID"] . "'\">Delete</button>
                                    </td>
                                </tr>";
                        }
                    } 
                    else
                    {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }
                    echo "</tbody></table>";
                }
                if ($category === 'parents') 
                {
                    $sql = "SELECT PID, first_name, last_name, phone_number, email, address FROM tbl_parent";
                    $result = $conn->query($sql);

                    echo "<table>
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";

                    if ($result->num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) 
                        {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["first_name"]) . "</td>
                                    <td>" . htmlspecialchars($row["last_name"]) . "</td>
                                    <td>" . htmlspecialchars($row["phone_number"]) . "</td>
                                    <td>" . htmlspecialchars($row["email"]) . "</td>
                                    <td>" . htmlspecialchars($row["address"]) . "</td>
                                    <td>
                                        <button type='button'  class='btn-actions' onclick=\"window.location.href='update_parent.php?id=" . $row["PID"] . "'\">Update</button>
                                        <button type='button'  class='btn-actions' onclick=\"window.location.href='delete_parent.php?id=" . $row["PID"] . "'\">Delete</button>
                                    </td>
                                </tr>";
                        }
                    } 
                    else
                    {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }
                    echo "</tbody></table>";
                }
                // Close connection
                $conn->close();
            }
            
