<?php
//  ta th9k mn m3lomat  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //jm3 lm3lomat
    $name = $_POST['name'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $start_date = $_POST['start_date'];

    //   thl milif
    $file = 'employees.txt';
    $handle = fopen($file, 'a');
    
    //     tktbhom f lmilf
    $data = "Name: $name, Age: $age, Position: $position, Salary: $salary, Start Date: $start_date\n";
    fwrite($handle, $data);

    // tab tsd  
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container ">
       
        <h2>Add New Employee</h2>
        <!--  FIN TA DKHL M3LOMAT-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>
            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" required>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
            <button type="submit">Add Employee</button>
        </form>
    </div>
    
    <div>
        <h2>Employee List</h2>
        <!--FIN TAYBANO M3LOMAT-->
        <table  >
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Start Date</th>
                   
                </tr>
            </thead>
          
            <tbody >
                <?php
                // FIN TA IT9RA LM3LOMAT
                $file = 'employees.txt';
                if (file_exists($file)) {
                    $employees = file($file);
                    foreach ($employees as $employee) {
                        $employee_data = explode(', ', $employee);
                        echo "<tr>";
                        foreach ($employee_data as $data) {
                            $data_pair = explode(':', $data);
                            echo "<td>" . $data_pair[1] . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>

