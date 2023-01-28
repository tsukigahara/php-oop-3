<?php
/////////////////////////////////////////////
class Person
{
    private $name;
    private $surname;
    private $date_of_birth;
    private $place_of_birth;
    private $fiscal_code;

    public function __construct(string $name, string $surname, string $date_of_birth, string $place_of_birth, string $fiscal_code)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->date_of_birth = $date_of_birth;
        $this->place_of_birth = $place_of_birth;
        $this->fiscal_code = $fiscal_code;
    }
    // getter setter 

    // print on html
    public function getHTML()
    {
        return "<br>Name: " . $this->name . "<br>"
            . "Surname: " . $this->surname . "<br>"
            . "Date of birth: " . $this->date_of_birth . "<br>"
            . "Place of birth: " . $this->place_of_birth . "<br>"
            . "Fiscal code: " . $this->fiscal_code . "<br>";
    }
}
/////////////////////////////////////////////
class Salary
{
    private $monthly_value;
    private static float $bonus1_value = 1000;
    private static float $bonus2_value = 2000;
    private $bonus1;
    private $bonus2;


    public function __construct(float $monthly_value, bool $bonus1, bool $bonus2)
    {
        $this->monthly_value = $monthly_value;
        $this->bonus1 = $bonus1;
        $this->bonus2 = $bonus2;
    }
    // getter setter

    // annual salary
    public function getAnnual()
    {
        $annual = $this->monthly_value * 12;
        if ($this->bonus1 == true) {
            $annual += $this->bonus1_value;
        }
        if ($this->bonus2 == true) {
            $annual += $this->bonus2_value;
        }
        return $annual;
    }

    // print on html
    public function getHTML()
    {
        return "<br>Monthly salary: " . $this->monthly_value . "<br>"
            . "Bonus 1: " . ($this->bonus1 == true ? "yes" : "no") . "<br>"
            . "Bonus 1 value: " . self::$bonus1_value . "<br>"
            . "Bonus 2: " . ($this->bonus2 == true ? "yes" : "no") . "<br>"
            . "Bonus 2 value: " . self::$bonus2_value . "<br>"
            . "Annual salary: " . $this->getAnnual() . "<br>";
    }
}
////////////////////////////////////////////
class Employer extends Person
{
    private Salary $salary;
    private $date_of_hire;

    public function __construct(string $name, string $surname, string $date_of_birth, string $place_of_birth, string $fiscal_code, Salary $salary, string $date_of_hire)
    {
        parent::__construct($name, $surname, $date_of_birth, $place_of_birth,  $fiscal_code);
        $this->salary = $salary;
        $this->date_of_hire = $date_of_hire;
    }

    // setter getter

    // print on html
    public function getHTML()
    {
        return parent::getHTML()
            . "Salary: " . $this->salary->getAnnual() . "<br>"
            . "Date of hire: " . $this->date_of_hire . "<br>";
    }
}
////////////////////////////////
class Capo extends Person
{
}

// salary instances
$salary1 = new Salary(1600, true, false);
echo $salary1->getHTML();

// person instances
$person1 = new Person("John", "Appleseed", "2023-01-01", "Cupertino", "APPLE1234567890");
echo $person1->getHTML();
//todo 1 done

// employers instances 
$employer1 = new Employer("John", "Apples", "2023-01-27", "Milan", "APPLES0987654321", $salary1, "2023-01-28");
echo $employer1->getHTML();
