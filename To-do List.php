<html>
    <head>    
        <title>To-do List</title>
        <link rel="stylesheet" href="To-do List Style.css">
    </head>
    <body>
        <center>            
            <button type="button"><a href="New Task.php">Add Task</a></button>
            <button type="button"><a href="View Task.php">View Tasks</a></button>
            <table>
                <tr>                    
                    <th>Task No</th>
                    <th>Start Date</th>
                    <th>End Date</th>                    
                    <th>Task Description</th>
                    <th>Completed</th>
                    <th>Deadline</th>                    
                </tr>
                <?php
                    $con=mysqli_connect("localhost","root","","utsav");                                        
                    $sql="SELECT * FROM to_do_list WHERE Completed='No';";
                    $result=mysqli_query($con,$sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo "<tr>";                            
                            echo "<td>".$row["TNo"]."</td>";
                            echo "<td>".$row["Task_Start_Date"]."</td>";
                            echo "<td>".$row["Task_End_Date"]."</td>";                            
                            echo "<td>".$row["Description"]."</td>";                                                        
                            echo "<td>".$row["Completed"]."</td>";                                                        
                            echo "<td>".$row["Deadline"]."</td>";                                                                                    
                            echo "</tr>";
                        }                        
                    }
                    $sql="SELECT * FROM to_do_list WHERE Completed='Yes';";
                    $result=mysqli_query($con,$sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo "<tr>";                            
                            echo "<td><del>".$row["TNo"]."</del></td>";
                            echo "<td><del>".$row["Task_Start_Date"]."</del></td>";
                            echo "<td><del>".$row["Task_End_Date"]."</del></td>";                            
                            echo "<td><del>".$row["Description"]."</del></td>";                                                        
                            echo "<td><del>".$row["Completed"]."</del></td>";                                                        
                            echo "<td><del>".$row["Deadline"]."</del></td>";                                                                                    
                            echo "</tr>";
                        }                        
                    }
                ?>                        
                <form action="Delete Task.php" method="get">                
                    <tr>
                        <th colspan="3" style="width: 60%;">Enter the Task Number</th>
                        <td><input type="text" name="delno" id="delno"></td>
                        <td colspan="2"><input type="submit" value="Completed"></td>
                    </tr>                    
                </table>
            </form>            
        </center>
    </body>
</html>