<?php
session_start();
//Data type
echo "<hr> <h1>Data Type</h1>";
$int = 12;
$float = 12.2;
$x = true;
$y = false;
$null = null;
$string = "I am Saw ";
$fruit = array('mango', 'banana', 'orange');
echo "$int / $float/ $string / $x/ $y /$null;<br> ";
print_r($fruit);

echo "<hr> <h1>Contastant</h1>";
define("GREETING", "Welcome to W3Schools.com!");
echo GREETING;
echo "<hr> <h1>Object</h1>";
//class
class Color
{
    public $color;
    public function Fun($color)
    {
        return "<br> color is " . $color;
    }
}

$color = new Color();
echo $color->Fun('red');

//String Function
echo "<hr> <h1>String Function</h1>";

echo "<br>" . strlen($string) . "<br>" . str_word_count($string) . "<br>" . strrev($string) . "<br>" . strpos($string, "a") . "<br>" . str_replace('a', 'aaron', $string);

//Number 
echo "<hr> <h1>Number</h1>";
echo "<br>";
var_dump(is_int($float));
var_dump(is_float($x));
$x = acos(8);
var_dump($x);
var_dump(is_numeric($string));
var_dump((int)$float);
//Math
echo "<hr><h1>Math</h1>";
echo (pi()) . "<br>" . max(0, 150, 30, 20, -8, -200) . "<br>" . min(0, 150, 30, 20, -8, -200) . "<br>" . (abs(-6.7)) . "<br>" . sqrt(64) . "<br>" . round(0.49) . "<br>" . rand(1, 4);

//Array
echo "<hr> <h1>Array</h1>";
echo $fruit[1];
$assoArr = array(
    "name" => "Saw",
    "age" => 21
);
$muArr = array(
    array("kyaw", "saw")
);
foreach ($assoArr as $x => $x_value) {
    echo "<br>Key=" . $x . ", Value=" . $x_value;
}
echo "<br>" . $muArr[0][0];
//Sorting Arr
echo "<hr> <h1>Sorting Array</h1>";
sort($fruit);
$clength = count($fruit);
for ($x = 0; $x < $clength; $x++) {
    echo $fruit[$x];
    echo "<br>";
}
ksort($assoArr);
foreach ($assoArr as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
//Control Structure
echo "<hr> <h1>Contro Structure</h1>";
if ($x) {
    echo "hla";
} else {
    echo $y;
}
switch ($y) {
    case 'true':
        echo "ture";
        break;

    default:
        echo "false";
        break;
}
echo "<br>";
while ($int <= 14) {
    echo $int;
    $int++;
}
$x = 6;

do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);

for ($i = 0; $i < 3; $i++) {
    echo ($i);
}
//function
echo "<hr> <h1>Function</h1>";
function writeMsg()
{
    echo "Hello world!<br>";
}
writeMsg();
function addNumbers($a, $b)
{
    return $a + $b;
}
echo addNumbers(5, 5);
//form
echo "<hr> <h1>Form and sercurity and post method</h1>";

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $pass = test_input($_POST["website"]);
        $website = password_hash($pass, PASSWORD_DEFAULT);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)

    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    Password: <input type="password" name="website" value="<?php echo $website; ?>">
    <span class="error"><?php echo $websiteErr; ?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
    <span class="error">* <?php echo $genderErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

//Connect database

echo "<hr> <h1>Database</h1>";

$servername = "localhost";
$username = "root";
$password = "777236";

// Create connection
$conn = new mysqli($servername, $username, $password, "test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//Http Requsest
echo "<hr> <h1>Http form request</h1>";
?>
<a href="get.php?x=PHP&y=get method">Test GET</a>
<?php

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    if (!isset($_COOKIE[$cookie_name])) {
        echo "<br>Cookie named '" . $cookie_name . "' is not set!<br>";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    echo "<br>";
    
   print_r($_SESSION);
   
   //workin with File
   $f=fopen("two.txt","w");
   fwrite($f,"hello hello");
   fclose($f);
   $myfile = fopen("two.txt", "r") or die("Unable to open file!");
 while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
    ?>
    