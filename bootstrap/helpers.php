<?php

function escapeLike($str){
    return str_replace(['\\','%','_','/',"'"],[
        '\\\\','\%','\_','\/','\''
    ], $str);
}
