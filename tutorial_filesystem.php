
<?php 

    /*
    
    $file_system_tutorial_part1 = false;
    $file_system_tutorial_part2 = true;
    if($file_system_tutorial_part1)
    {
        //read file:
        $quotes = '';
        $file = 'readme.txt';
        if(file_exists($file))
        {
            // read file
            $quotes = readfile($file);
            echo '<br />';

            // copy file
            copy($file, 'quotes.txt'); // if destination file quotes.txt doesn't exist, it will be created

            // get absolute path
            echo realpath($file);
            echo '<br />';

            // get filesize in bytes
            echo filesize($file);
            echo '<br />';

            // rename file
            rename($file, 'test.txt');
            

        }
        else
        {
            echo "file doesn't exist";
            rename('test.txt', 'readme.txt');
        }
        
        // create folder
        mkdir('quotes');


        echo $quotes;
    }
    
    if($file_system_tutorial_part2)
    {
        $file = 'quotes.txt';
        
        
        // open file for reading and get it's handle
        //$handle = fopen($file, 'r'); // for read only
        //$handle = fopen($file, 'r+'); // for read & overwrite
        $handle = fopen($file, 'a+'); // for read & writing text to the end of file(appending)

        
        // read file
        //echo fread($handle, filesize($file));

        // read a single line
        echo fgets($handle);
        echo '<br />';
        echo fgets($handle); // second reading starts from where first stopped, because it save a pointer inside
        
        // read a single character
        echo '<br />';
        echo fgetc($handle); // it also starts to search from last saved pointer 


        // writing to a file
        fwrite($handle, "\nEverything popular is wrong"); // overwrites data in file starting from last saved pointer

        fclose($handle);

        // delete file;
        unlink($file); 

    }

    */
?>
