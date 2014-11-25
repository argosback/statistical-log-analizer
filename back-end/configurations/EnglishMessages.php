<?php
/*
    File        : EnglishMessages.php
    
    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/
//FOR ERROR MESSAGES
    define('NO_MESSAGE', 'No message for this error is configured, contact your system administrator');

//FOR SINGLETTON
    define('NOT_CLONE', 'Invalid Operation: You can not clone an instance of ');
    define('NOT_DESERIALIZE', 'Invalid Operation: You can not deserialize an instance of ');

//FOR VALIDATOR
    define('SEARCH_NO_RESULT', 'The search returned no results');
    define('NO_SPECIAL_CHARS', 'The following field should not contain special chars: ');
    define('EXCEEDED_CHARS', 'The following field has exceeded the number of characters allowed: ');
    define('UNIQUE', 'The following field must be unique, it already exists in the system: ');
    define('REQUIRED', 'The following field is required, can not be empty: ');
    define('DATETIME', 'The following field must be a valid date and time: ');
    define('DATE', 'The following field must be a valid date: ');
    define('EMAIL', 'The following field must be a valid email: ');
    define('INTEGER_NUMBER', 'The following field must contain only integers numbers: ');
    define('NOT_VALID_ID', 'Not valid identificator');
    define('PASSWORDS_NOT_MATCH', 'Passwords do not match');
    define('NOT_DELETE_ADMIN', 'You can not delete the administrator');
    define('EXISTING_USER', 'Existing user');
    define('EXISTING_ROLE', 'Existing role');
	define('NO_VALID_USER', 'Invalid user!');
	define('NO_AUTHORIZED_ACTION', 'Action not authorized :(');
    define('GO_BACK', 'GO Back!');
    define('USED_ROLE', 'You can not delete, there are users using this role.');
    
//FOR REQUEST DISPATCHER
    define('I_DONT_UNDERSTAND', "I don't understand the following message: ");
    define('METHOD', 'The method ');
    define('NOT_IMPLEMENTED', ' has not yet been implemented :(');

//FOR PAGINATION
    define('FIRST', 'first');    
    define('LAST', 'last');
    define('NEXT', 'next');
    define('PREVIOUS', 'previous');
    define('ROWS_PER_PAGE', 'Rows per page: ');
    define('SET_PAGE', 'Set page: ');
    define('APPLY', 'apply');
    define('GO_TO', 'Go to: ');
    define('PAGE', 'Page: ');
    define('OF', ' of ');


?>