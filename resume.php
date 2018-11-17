<?php

Function technicalSkills() {
    $programmingLanguages = array( PHP, Java, Ruby, C, 'C++', Python, Assembly );
    $webTechnologies = array( HTML, CSS, Heroku, RubyonRails );
    $operatingSystems = array( Windows, Linux );
    $databases = array( PostgresSQL, MySQL, phpMyAdmin );
    $developmenttools = array( VisualStudio, EclipseIDE, Sublime, Atom );
    $other= array( Word, Excel, Powerpoint );
}

$hello = technicalSkills();
echo $hello[$programmingLanguages];


?>
