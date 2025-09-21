<?php

abstract class Person {
    protected string $name;
    protected string $address;

    public function __construct(string $name, string $address) {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    abstract public function __toString(): string;
}

class Student extends Person {
    private string $program;
    private int $year;
    private float $fee;

    public function __construct(string $name, string $address, string $program, int $year, float $fee) {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    public function __toString(): string {
        return "
        <div style='border:2px solid #4CAF50; padding:10px; margin:10px; border-radius:10px; background:#f9fff9;'>
            <h3 style='color:#4CAF50;'>🎓 Student Information</h3>
            <p><b>Name:</b> {$this->name}</p>
            <p><b>Address:</b> {$this->address}</p>
            <p><b>Program:</b> {$this->program}</p>
            <p><b>Year:</b> {$this->year}</p>
            <p><b>Fee:</b> {$this->fee}</p>
        </div>
        ";
    }
}
class Staff extends Person {
    private string $school;
    private float $pay;

    public function __construct(string $name, string $address, string $school, float $pay) {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    public function __toString(): string {
        return "
        <div style='border:2px solid #2196F3; padding:10px; margin:10px; border-radius:10px; background:#f0f8ff;'>
            <h3 style='color:#2196F3;'>👩‍🏫 Staff Information</h3>
            <p><b>Name:</b> {$this->name}</p>
            <p><b>Address:</b> {$this->address}</p>
            <p><b>School:</b> {$this->school}</p>
            <p><b>Pay:</b> {$this->pay}</p>
        </div>
        ";
    }
}


$student = new Student("Ziad", "Menofia", "Computer Science", 4, 15000.50);
$staff = new Staff("Sara", "Giza", "Engineering School", 12000.75);

echo "<!DOCTYPE html>
<html>
<head>
    <title>Person Info</title>
    <meta charset='UTF-8'>
</head>
<body style='font-family: Arial, sans-serif; background:#f5f5f5; padding:20px;'>
    {$student}
    {$staff}
</body>
</html>";