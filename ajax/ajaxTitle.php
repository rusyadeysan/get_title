<?
if(!empty($_REQUEST['url'])){

    $res = get_title($_REQUEST['url']);
    exit (json_encode(['data' => $res]));

}

function get_title($url){
    $str = file_get_contents($url);
    if(strlen($str)>0){
        $str = trim(preg_replace('/\s+/', ' ', $str));
        preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title);
        return $title[1];

    }
}