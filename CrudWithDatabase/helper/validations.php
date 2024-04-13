<?php 

function sanitizeValue($input)
{
    return htmlentities(trim($input));
}
function requireValue($input)
{
    if (empty($input)):
        return false;
    else:
        return true;
    endif;
}
function valEmail($input){
    if (filter_var($input, FILTER_VALIDATE_EMAIL)):
        return false;
    else:
        return true;
    endif;
}
function valImage($image,&$errors){
    switch ($image){
        case 1:
            $errors[] = 'Your File Not Allowed';
           return;
        case 2:
            $errors[] = 'You Have An Error';
            return;
        case 3:
            $errors[] = 'Your File is too Big';
            return;
        case 4:
            $errors[] ='Please Choose image';
            return;            
    }
}


?>