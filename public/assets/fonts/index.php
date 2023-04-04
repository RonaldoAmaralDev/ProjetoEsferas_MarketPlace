<?php


for ($i=0; $i <=20 ; $i++) { 
    $urls[$i] = [
        'https://unicons.iconscout.com/release/v4.0.0/fonts/line/unicons-'.$i.'.woff2',
        'https://unicons.iconscout.com/release/v4.0.0/fonts/line/unicons-'.$i.'.woff',
        'https://unicons.iconscout.com/release/v4.0.0/fonts/line/unicons-'.$i.'.ttf',
        'https://unicons.iconscout.com/release/v4.0.0/fonts/line/unicons-'.$i.'.svg'
    ];
}


foreach($urls as $url) {
    foreach($url as $aq){
        $file_name = basename($aq);
        if(file_put_contents( $file_name,file_get_contents($aq))) {
            continue;
        }
    }
}


// $url = 'https://unicons.iconscout.com/release/v4.0.0/fonts/line/unicons-2.eot';
 
// // Use basename() function to return the base name of file
// $file_name = basename($url);
  
// // Use file_get_contents() function to get the file
// // from url and use file_put_contents() function to
// // save the file by using base name
// if(file_put_contents( $file_name,file_get_contents($url))) {
//     echo "File downloaded successfully";
// }
// else {
//     echo "File downloading failed.";
// }