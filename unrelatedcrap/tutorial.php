<?php

    // install composer
    // install local phpunit from projet folder: composer require phpunit/phpunit --dev
    // create tests, unit folders, create phpunit.xml file and set it up
    // better phpunit vscode extension allows to use shortcut to run tests
    // travis: configure your repo according to the default or define a script:   
    //    before_install:
    //        - chmod +x build.sh
    //    script: ./build.sh
    //to execute when running the build , otherwise it will fail with error 2 


    //include('somefile.php'); // includes file. if doesn't exist, skips and proceeds further incode
    //require('somefile.php'); // includes file. But stops(fatal error), if file was not found, further code is not getting processed
    echo 'Current PHP version: ' . phpversion();

    //superglobals: e.g. $_GET['name'], $_POST['name']
    echo $_SERVER['SERVER_NAME'].'<br />'; // output: localhost
    echo $_SERVER['REQUEST_METHOD'].'<br />'; // output: GET
    echo $_SERVER['SCRIPT_FILENAME'].'<br />'; // output: C:/xampp/htdocs/tutorial_php_netninja/tutorial.php
    echo $_SERVER['PHP_SELF'].'<br />'; // output relative to localhost: /tutorial_php_netninja/tutorial.php

    

    //cookie superglobal stores data on client side


    // number
    $number = 15;
    //string
    $string = 'Yoshi';
    // constant
    define('NAME', 'Mario');

    // strings tutorial #5:
    $string1 = 'My email is ';
    $string2 = 'email@email.email';

    $stringConcatenation = $string1.$string2;
    $stringInputVarInStringUsingDoublequotes = "My email is $string2"; // output: "my email is i@i.i"
    $stringInputVarNameInStringAsTextUsingSinglequotes = 'My email is $string2'; // output: "my email is $string2"
    $stringGetCharAtIndex = $string1[0]; // output: "m";

    // some string functions
    $stringGetLength = strlen($string1);
    $stringToUpper = strtoupper($string1);
    $stringToLower = strtolower($string1);
    $stringReplaceAllSaidLetters = str_replace('i', 'Y', $string1); // replace all i chars with Y char in a string

    // number type variables order prioroties (BIDMAS) Brackets->indicies(**power to or square sqrt)->Division->Multiplication->Addition->Subtraction


    //arrays tutorial #7:
    $IndexedArray = ['shaun', 'crystal', 'ryu']; 
    $IndexedArray_AlternativeCreationWay = array('sonya', 'pifagor', 'liu'); 
    $IndexedArray[] = 'some value'; // Add new value to end
    array_push($IndexedArray, 'Seventhy'); // alternative way to add new element 
    $IndexedArray_ElementCount = count($IndexedArray);
    $IndexedArray_MergedFromOthers = array_merge($IndexedArray, $IndexedArray_AlternativeCreationWay);
    //print_r($IndexedArray); // output: Array ( [0] => shaun [1] => crystal [2] => ryu ). good for seeing all elements of array, when debugging

    $AssocArray = ['keyfirst'=>'black', 'keyotherhere'=>'valueotherhere', 'luigikey'=>'orange'];
    $AssocArrayAlternativeWayOfCreation = array('somekey'=>'somevalue', 'otherkey'=>'othervalue', 'onemorekey'=>'onemorevalue');
    $AssocArray_GetByKey = $AssocArray['luigikey'];
    $AssocArray['newElmAdd'] = 'newValueAdded'; // add new value

    $multidimensionalArray = [
        ['k1'=>'mario party', 'k2'=>'lorem', 'k3'=>30],
        ['k1'=>'mario cheats', 'a2'=>25],
        ['k1'=>'zelda chests', 'k2'=>'link', 'k3'=>50],
    ];
    $multidimensionalArray_AccessByIndexThenByKey = $multidimensionalArray[2]['k1'];
    $multidimensionalArray_poppedElement = array_pop($multidimensionalArray);


    // loops tutorial #9:
    for($i=0; $i<count($AssocArray); ++$i) { echo $i."<br />"; } // add line breaks between
    foreach ($IndexedArray as $Elm) { echo $Elm."&nbsp"; } // add spaces between
    $i = 0; while($i < count($multidimensionalArray)) { echo $multidimensionalArray[$i]['k1']; echo "<br/>"; $i++; }


    // booleans & comparisons tutorial #10:
    // echo true; // output: 1
    // echo false; // output : ""(empty string)
    // echo 5 == '5'; // loose comparison. output: "1"(true);
    // echo 5 === '5'; // strict comparison. output: ""(false);
    //echo false == ''; // output: 1(true);

    // conditiona statements tutorial #11:
    if(1 || 2) { echo '1 or 2 <br/>'; } elseif(3 && 4) { echo '3 and 4 <br>'; } else { echo '5 <br>'; };

    // continue and break keywords #12:
    echo '<br>';
    for($i=0; $i<count($AssocArray); ++$i) 
    { 
        if($IndexedArray[$i] === 'crystal') { echo 'break at element N'.$i; break; }   

        if($IndexedArray[$i] === 'shaun') { echo "skip everything below at element N$i and go back to next iteration<br/>"; continue; }   

        echo $IndexedArray[$i]."<br>";
    } // add line breaks between

    $global_string = 'something';
    $some_string1 = 'something';

    function VariableScope(&$string_by_ref) // pass string2 by reference, same as in c++
    {
        $local_string = '<br>local_variable_inside_func';
        global $global_string; // using global variable inside func
        $global_string = '<br>changing_gloabl_variable_inside_func';
        $string_by_ref = '<br>nothing';
        return $local_string;
    }
    $rv_str = VariableScope($some_string1);
    echo $rv_str.' returned outside func';

    // this func parses link into parts
    $dbparts = parse_url($dburl);
    //$dbhost = $dbparts['host'];
    //$dbuser = $dbparts['user'];
    //$dbpass = $dbparts['pass'];
    //$dbname = ltrim($dbparts['path'],'/');

    // Classes tutorial #41 + #42
    class User
    {
        public function __construct($name, $email)
        {
            $this->name = $name;
            $this->email = $email;
        }

        //public function __destruct() {}

        public function getNameAndEmail()
        {
            return array($this->name, $this->email); // returns as indexed array, strings can't be returns as list()
        }

        public function setName($name) 
        { 
            if(is_string($name) && strlen($name) > 0)
            {
                $this->name = $name; 
            }
            else
            {
                echo 'not a valid name';
            }
        }

        public function setEmail($email) 
        {   
            if(is_string($email) && strlen($email) > 0) // add other validations for email
            {
                $this->email = $email; 
            }
            else
            {
                echo 'not a valid email';
            }
        }

        public function login()
        {
            echo "<br />$this->name($this->email) logged in<br />";
        }
        private $email;
        private $name;
    }
    $userOne = new User('Sigourney Weaver', 'Sigi@nostromo.space');
    $userOne->login();


    // for Sessions tutorial #36
    //session superglobal stores data on server side between requests, loading different pages for keping track of info, user does(e.g. submit forms, go to pages, etc)
    //sessions are useful for sensitive data
    if(isset($_GET['submit']))
    {
        // cookie
        setcookie('gender', $_GET['gender'], time() + 86400); // added expiration cookie for a 1 day

        //session
        session_start();

        $_SESSION['name'] = $_GET['name'];
        $_SESSION['name'] = preg_replace('/[^A-Za-z0-9\-\s]/', '', $_SESSION['name']);
        $_SESSION['name'] = ltrim($_SESSION['name']); // remove all spaces from beginning, also it will strip " " "\t" "\n" "\r" "\0" "\x0B"
        $_SESSION['name'] = rtrim($_SESSION['name']); // remove all spaces from end, also it will strip " " "\t" "\n" "\r" "\0" "\x0B"
        if(strlen($_SESSION['name']) < 1)
        {
            //$_SESSION['name'] = 'Guest';
        }

        header("Location: index.php?name=".($_SESSION['name']));
    }

?>



<?php /*embed php code into html for further dynamic manipulation of page data*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title> my second PHP page</title>
</head>
<body>
    <h1><?php echo 'hello, ninjas;' ?></h1>
    <div><?php echo $string;   ?></div>
    <div><?php echo NAME;   ?></div>
    <div>
    <ul>
        <!-- open php and get element of array-->
        <?php foreach ($IndexedArray as $elm) {?>
            <!-- read elm from php code in between html-->
            <h3><?php echo $elm.'<br />'; ?></h3>
        <!-- close php-->
        <?php } ?>
    </ul>
    </div>
    

    <p>Sessions&cookies tutorials #36 and #38:</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"> <!--current file relative to localhost-->
        <input type="text" name="name">
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

    



</body>
</html>

