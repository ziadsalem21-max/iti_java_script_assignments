<?php
class Employee {
    public $id;
    public $firstName;
    public $lastName;
    public $salary;
    public $workHOurs;
    public $rate;

    function __construct($id=0, $firstName="", $lastName="", $salary=0, $workHOurs=0, $rate=""){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
        $this->workHOurs = $workHOurs;
        $this->rate = $rate;
    }
    
    function getName(){
        return $this->firstName . " " . $this->lastName;
    }

    function getWorkHours(){
        return $this->workHOurs;
    }

    function getRate(){
        return $this->rate;
    }
       function getSalary(){
        return $this->salary;
    }
}


class HR_EMPLOYEE extends Employee {
    public $department;
    function __construct($id=0, $firstName="", $lastName="", $salary=0, $workHOurs=0,$department="", $rate=""){
        
        parent::__construct($id, $firstName, $lastName, $salary, $workHOurs, $rate);
         $this->department = $department;
    }

    function evaluateEmployee(Employee $emp){
        $hours = $emp->getWorkHours();
        if($hours > 10){
            $emp->rate = "Very Good";
        } elseif($hours == 10){
            $emp->rate = "Good";
        } else {
            $emp->rate = "Bad";
        }
    }
}

$e1 = new Employee(1, 'Adham', 'Khaled', 9000, 12);
$e2 = new Employee(2, 'Ziad', 'Salm', 10000, 8);

$hr = new HR_EMPLOYEE(100,"ahmed","tark",11000,12,"HR",);

$hr->evaluateEmployee($e1);
$hr->evaluateEmployee($e2);

// echo $e1->getName() . " - Hours: " . $e1->getWorkHours() . " - Rate: " . $e1->getRate() . "<br>";
// echo $e2->getName() . " - Hours: " . $e2->getWorkHours() . " - Rate: " . $e2->getRate() . "<br>";
// echo $hr->getName() . " (Department: " . $hr->department . ")<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees Results</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f9f9f9;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 70%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);
        background: white;
    }

    th,
    td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background: #007BFF;
        color: white;
    }

    tr:hover {
        background: #f1f1f1;
    }

    .rate-good {
        color: green;
        font-weight: bold;
    }

    .rate-bad {
        color: red;
        font-weight: bold;
    }

    .rate-vg {
        color: blue;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <h2>Employees Evaluation</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Hours</th>
            <th>Salary</th>
            <th>Rate</th>
        </tr>
        <tr>
            <td><?php echo $e1->id; ?></td>
            <td><?php echo $e1->getName(); ?></td>
            <td><?php echo $e1->getWorkHours(); ?></td>
            <td><?php echo $e1->getSalary(); ?></td>
            <td
                class="<?php echo ($e1->getRate()=="Very Good"?"rate-vg":($e1->getRate()=="Good"?"rate-good":"rate-bad")); ?>">
                <?php echo $e1->getRate(); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $e2->id; ?></td>
            <td><?php echo $e2->getName(); ?></td>
            <td><?php echo $e2->getWorkHours(); ?></td>
            <td><?php echo $e2->getSalary(); ?></td>
            <td
                class="<?php echo ($e2->getRate()=="Very Good"?"rate-vg":($e2->getRate()=="Good"?"rate-good":"rate-bad")); ?>">
                <?php echo $e2->getRate(); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $hr->id; ?></td>
            <td><?php echo $hr->getName(); ?> (HR)</td>
            <td><?php echo $hr->getWorkHours(); ?></td>
            <td><?php echo $hr->getSalary(); ?></td>
            <td>-</td>
        </tr>
    </table>
</body>

</html>