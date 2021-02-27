<?php
session_start();
$curl = curl_init();
if(empty($_POST['foo'])){
    $search_string = 'appetizers';
}
else{$search_string = $_POST['foo'];}


$url = "https://www.chilis.com/menu/$search_string";
$url2 = "https://www.chilis.com/locations/results?query=Fullerton+College%2C+East+Chapman+Avenue%2C+Fullerton%2C+CA%2C+USA&address=321+E+Chapman+Ave&address2=&lat=33.8758146&lng=-117.9174827&city=Fullerton&state=CA&zip=92832";

//echo $data;
$menu = array();

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($curl);

//image

preg_match_all('!https:\/\/static.olocdn.net\/menu\/chilis\/[^\s]*.jpg!',$result,$matches);

//https:\/\/static.olocdn.net\/menu\/chilis\/[^\s]*jpg$
$menu['image'] = array_values(array_unique($matches[0],SORT_REGULAR));


preg_match_all('!<span itemprop="name">(.*?)</span>!',$result,$matches);
$menu['title'] = $matches[0];


//<p class="description categoryItemDescription ng-binding" ng-show="menuItem.description" ng-bind-html="menuItem.description" aria-hidden="false">An Outback Original! Our special onion is hand-carved, cooked until golden and ready to dip into our spicy signature bloom sauce.</p>
preg_match_all('!<span itemprop="description" title=(.*?)>(.*?)</span>!',$result,$matches);
$menu['des'] = $matches[0];

// for($i =0; $i < count($menu['image']); $i++){
   
//     if(!preg_replace('!(.*jpg$)!','!(.*jpg$)!',$ $menu['image'][$i])){
//        // $menu['image'][$i] = $test2[1];

//         //echo $i.' '  .$test2[0] .' <br/>';
//     }
//     echo $i.' '  .$menu['image'][$i] .' <br/>';
// }

for($i=0; $i < count($menu['image']); $i++) {
   // echo $menu['title'][$i] .' '.$menu['image'][$i] .'<br/>';
    }
    

for($i =0; $i < count($matches[0]); $i++){
   
    if(preg_match('!>(.*?)<!',$menu['title'][$i],$test2)){
        $menu['title'][$i] = $test2[1];
      
    }
}
for($i=0; $i < count($menu['title']); $i++) {
   // echo $i .' '.$menu['title'][$i] .'<br/>';
    }
    

for($i =0; $i < count($matches[0]); $i++){
   
    if(preg_match('!>(.*?)<!',$menu['des'][$i],$test2)){
        $menu['des'][$i] = $test2[1];
 
    }
}



curl_close($curl);
$url = "https://www.fastfoodmenuprices.com/chilis-prices/";
$curl = curl_init();

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$resultPrice=curl_exec($curl);
$appetizer  = array();
//<input type="hidden" class="table-press-ori" value="$10.99">
preg_match_all('!<span>(.*?)</span>!',$resultPrice,$matches);




if($search_string =='appetizers'){
    $j=0;
    for($i=1; $i< 18; $i++){
        $menu['price'][$j]= $matches[0][$i];
       // echo  $menu['price'][$j];
       $j++;
    }
}
if($search_string =='ribs-steaks'){
    $j=0;
    for($i=94; $i< 108; $i++){
        $menu['price'][$j]= $matches[0][$i];
       // echo  $menu['price'][$j];
       $j++;
    }
}
if($search_string =='big-mouth-burgers'){
    $j=0;
    for($i=119; $i< 130; $i++){
        $menu['price'][$j]= $matches[0][$i];
       // echo  $menu['price'][$j];
       $j++;
    }
}
if($search_string =='fajitas'){
    $j=0;
    for($i=63; $i< 72; $i++){
        $menu['price'][$j]= $matches[0][$i];
       // echo  $menu['price'][$j];
       $j++;
    }
}
if($search_string =='salads-soups-chili'){
    $j=0;
    for($i=25; $i< 45; $i++){
        $menu['price'][$j]= $matches[0][$i];
       // echo  $menu['price'][$j];
       $j++;
    }
}
if($search_string =='desserts'){
    $j=0;
    for($i=142; $i< 147; $i++){
        $menu['price'][$j]= $matches[0][$i];
       // echo  $menu['price'][$j];
       $j++;
    }
}


$_SESSION["content"] = $menu;
print_r($_SESSION["content"]['price']);
curl_close($curl);
 header('location:menu.php');
?>


