<?php
$telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0',    'upper' => '91.108.7.255']];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
//-
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;}
if (!$ok) die();
date_default_timezone_set('Asia/Tehran');
$date=time();
error_reporting(0);
define('API_KEY','5125977425:AAFGWU4liKp7kVN4zhXVcWDciE2WDnsSwaE');
// توکن ربات
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);}}
function Botinfo($what){
    return bot('GetMe',[])->result->$what;}
//━━//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$reply_msgid = $message->reply_to_message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$tc = $update->message->chat->type;
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$textt = $update->callback_query->message->text;
$inline = $update->inline_query->query;
$inline_message_id = $update->callback_query->inline_message_id;
$new_chat_member_id = $update->message->new_chat_member->id;
$new_chat_member_username = $update->message->new_chat_member->username;
$rpto = $update->message->reply_to_message->forward_from->id;
//┅┅//
$admins = array("1949071335","2127270312");
// ایدی عددی مدیران👆
$bottag = "Arvisa_bot"; // یوزرنیم ربات بدون @
$channel = "ArvisaOfficial"; // یوزرنیم چنل بدون @
//┅┅//
$bugun = date('d-M Y',strtotime('3 hour'));
$name_bot = Botinfo('first_name');
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$chat_id));
$user = json_decode(file_get_contents("data/users/$from_id.json"),true);
$stats_n = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
$statjsonq = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chatid&user_id=".$fromid),true);
$setp = $user['step']; // User STEP
$status_n = $stats_n['result']['status']; // STATS
$statusq = $statjsonq['result']['status']; // STATS
$tch = $forchaneel->result->status; // True Channel
$all_gaps = file_get_contents("data/allgap.txt");
$all_users = file_get_contents("data/allusers.txt");
$auto_memorise = file_get_contents("data/autoMemorise.txt");
if(isset($data)){
$fid = $update->callback_query->from->id;}
if(isset($message->from)){
$fid = $message->from->id;}
//=== dev : @Everest666 ===\\
function deletefolder($path){
 if($handle=opendir($path)){
  while (false!==($file=readdir($handle))){
   if($file<>"." AND $file<>".."){
    if(is_file($path.'/'.$file)){ 
     @unlink($path.'/'.$file); } 
    if(is_dir($path.'/'.$file)) { 
     deletefolder($path.'/'.$file); 
     @rmdir($path.'/'.$file); }} } }}
function step($from_id,$step){
$user = json_decode(file_get_contents("data/users/$from_id.json"),true);
$user["step"] = "$step";
$outjson = json_encode($user,true);
file_put_contents("data/users/$from_id.json",$outjson);
return true;
}
function rand_string( $length ){
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#@";
return substr(str_shuffle($chars),0,$length);
}
//━━//
if($auto_memorise == null ){
file_put_contents("data/autoMemorise.txt","⬜");
}
if($tc == "private" ){
$all_users2 = explode("\n",$all_users); 
if(!in_array($chat_id,$all_users2)){
$tctctct = fopen("data/allusers.txt", "a") or die("Unable to open file!");
fwrite($tctctct, "$chat_id\n");
fclose($tctctct);}}
$user_flood = file_get_contents("data/spam/$fid.txt");
if($user_flood < time()){ 
$spamtime = 0.09; // تایم اسپم پشت سرهم
$tt = time() + $spamtime;
file_put_contents("data/spam/$fid.txt",$tt);
//━━//
if($text == "/start"){
if($tc == "private" ){
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' ){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Dear $first_name $last_name; to use $name_bot in your own chat, join our channel then come back here and /start again.",
 'reply_markup' => json_encode([
 'inline_keyboard' => [
    [['text' => "Our Channel:️", 'url' => "https://t.me/$channel"]],
]])
]);
}else{
step($chat_id,"none");
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Hello there [$first_name $last_name](tg://user?id=$from_id)
Wellcome
Add $name_bot to your own group if you want to make it more better.
Use the buttons bellow to execute commands",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Add $name_bot to your group",'url'=>"https://t.me/$bottag?startgroup=new"]],
              [['text'=>"Teach new words to $name_bot",'callback_data'=>'addNewWord'],['text'=>"Configuration Guide",'callback_data'=>'sar']],
  ] ]) ]);  }}}

	if(strpos($text,"'") !== false or strpos($text,'"') !== false or strpos($text,"}") !== false or strpos($text,"{") !== false or strpos($text,")'") !== false or strpos($text,"(") !== false){	
	if($tc == "private" ){
	$tt = time() + 9999999999999999;
file_put_contents("data/spam/$from_id.txt",$tt);
if(!in_array($chat_id,$admins)){
step($chat_id,"none");
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"You're blocked due to trying to send destructive code.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]); 
 bot('sendMessage',[
 'chat_id'=>$admins[0],
 'text'=>"[This User sent destructive code, Sir](tg://user?id=$from_id)",
 'parse_mode'=>"MarkDown",
]); 
}else{
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"You're blocked for compromising security",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
 ]); }}}
elseif($data == "back"){
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' => "Welcome back to the main menu

Use the buttons bellow to execute commands",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Add $name_bot to your group",'url'=>"https://t.me/$bottag?startgroup=new"]],
                [['text'=>"Teach new words to $name_bot",'callback_data'=>'addNewWord'],['text'=>"Configuration Guide",'callback_data'=>'sar']],
              ]]) ]);}

/*
بخش راهنما نصب
*/
elseif($data == "sar"){
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' => "Just add me to your own group and make me admin there full-permission.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Share",'switch_inline_query'=>"All you have to do, is add me to your own group and make me admin there full-permission."]],
              [['text'=> "Main Menu", 'callback_data'=>"back"]],
              ]
        ])
        ]);}
elseif($data == "addNewWord"){
	step($chatid,"addNewWord");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' => "Submit the desired word:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Main Menu", 'callback_data'=>"back"]],
              ]
        ])
        ]);}

elseif($user["step"] == "addNewWord" && $tc == "private"){
if(!file_exists("data/words/$text.txt")){
if(strlen($text) < 160 ){
$user["word"] = $text;
$user["step"] = "adduwgw";
$outjson = json_encode($user,true);
file_put_contents("data/users/$from_id.json",$outjson);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Now, reply the answer phrase(s)...
 
 You can write each random answer in seperated lines in one message.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Main Menu", 'callback_data'=>"back"]],
              ]
        ])
 ]); }else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Your word lenght is too long!
Send another word:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Main Menu", 'callback_data'=>"back"]],
              ]])
]); }}else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"This word already exists.
Send another word:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[[['text'=> "Main Menu", 'callback_data'=>"back"]],]
        ]) ]); }}
elseif($user["step"] == "adduwgw" && $tc == "private"){
if(strlen($text) < 250 ){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/users/$from_id.json",$outjson);
$word = $user["word"];
if($auto_memorise == "⬜"){
file_put_contents("data/words/$word.txt",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>" Your submitted word was registered in my memory.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Main Menu", 'callback_data'=>"back"]],
              ]
        ])
 ]);  }else{
$r = rand(11111111,999999999);
$rand = $r;
$users = json_decode(file_get_contents("data/int/$rand.json"),true);
$users["id"] = $chat_id;
$users["word"] = $word;
$users["answer"] = $text;
$outjsons = json_encode($users,true);
file_put_contents("data/int/$rand.json",$outjsons);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Your submission word has been added to the verification list!

️ <b>( Please do not ever resend the word which you've submitted before )</b>
I'll notify you after verification.",
 'parse_mode'=>"HTML",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[[['text'=> "Main Menu", 'callback_data'=>"back"]],]])
 ]); 
 $somebody = "[Open Profile](tg://user?id=$from_id)";
bot('sendMessage',[
 'chat_id'=>$admins[0],
 'text'=>"The word ( `$word` ) has been sent by the user ( $somebody ).
Defined answers are:
`$text`

Added to waitlist!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Accept", 'callback_data'=>"ta_$rand"],['text'=> "Deny", 'callback_data'=>"la_$rand"]],
[['text'=> "Ban user", 'callback_data'=>"ba_$from_id"]],
              ]
        ])
 ]);  }}else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
    'text'=>"Your word lenght is too long!
Send another word:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Main Menu", 'callback_data'=>"back"]],
  ]
        ])
 ]);}}
elseif(strpos($data,"la_") !== false ){
$ok = str_replace("la_","",$data);
$users = json_decode(file_get_contents("data/int/$ok.json"),true);
$id = $users['id'];
$users_word = $users['word'];
bot('sendMessage',[
 'chat_id'=>$id,
'text'=>"Dear $first_name $last_name the word $users_word hasn't been accepted.
Please don't ever resend it.",
 ]); 
 unlink("data/int/$ok.json");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' => "The word has been denied.",
 'parse_mode'=>"MarkDown",
        ]); }
 elseif(strpos($data,"ta_") !== false ){
 $ok = str_replace("ta_","",$data);
$users = json_decode(file_get_contents("data/int/$ok.json"),true);
     $users_word = $users['word'];
$jav = $users['answer'];
$id = $users['id'];
file_put_contents("data/words/$users_word.txt",$jav);
bot('sendMessage',[
 'chat_id'=>$id,
 'text'=>"Dear $first_name $last_name; the word $users_word has been accepted and added to $name_bot.
 Thank you!",
 ]); 
unlink("data/int/$ok.json");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' => "The word has been added successfully.",
 'parse_mode'=>"MarkDown",
        ]); }
//=== dev : @Everest666 ===\\
 elseif(strpos($data,"ba_") !== false ){
 $ok = str_replace("ba_","",$data);
$tt = time() + 9999999999999999;
file_put_contents("data/spam/$ok.txt",$tt);
	bot('sendMessage',[
 'chat_id'=>$ok,
 'text'=>"$name_bot has banned you.",
 'parse_mode'=>"MarkDown",
	 ]); 
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' => "User has been banned from $name_bot, Sir.",
 'parse_mode'=>"MarkDown",
        ]); }
//━━کامل━//
if($text == "panel" or $text == "پنل"){
   $id_bot = bot('GetMe',[]) -> result -> id;
	$stats_b = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$id_bot),true);
$status_b = $stats_b['result']['status'];
if ($status_b == 'creator' or $status_b == 'administrator' ){
if ($status_n == 'creator' or $status_n == 'administrator' ){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"In this section, you can view and use different $name_bot commands:
📆: $bugun",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[[['text'=>"Configuration Guide",'switch_inline_query'=>"All you have to do is add me to your own group and make me admin full-permission."],
 ['text'=>"$name_bot Guide",'callback_data'=>'help_g']],
[['text'=>"Add $name_bot to your own group",'url'=>"t.me/$bottag?startgroup=new"]],
]]) ]); 
}else{
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"You're not admin.",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
 ]); }
}else{
bot('sendMessage',[
'chat_id' =>$chat_id,
'text' => "First make me full-permission admin to activate $name_bot in group.",
 'parse_mode'=>"MarkDown",
 'reply_to_message_id'=>$message_id,
]);}}
if($data == "back_g"){
if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$admins) ){
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
            'text' =>"You're back to the main menu panel.
In this section, you can view and use different $name_bot's commands:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"$name_bot Guide",'callback_data'=>'help_g']],
[['text'=>"Add $name_bot to your own group.",'url'=>"t.me/$bottag?startgroup=new"]],
[['text'=>"Support",'url'=>"t.me/Everest666"]], // آیدی پشتیبانی
              ]
       ])
        ]);}else{
	bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "You're not admin.",
        'show_alert' => false
    ]);}}
elseif($data == "help_g"){
if ($statusq == 'creator' or $statusq == 'administrator' or in_array($fromid,$admins) ){
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
          'text' => "$name_bot's group commands guide:

~ Get your own info:
• me

~ Make a gif with the desired text:
• gif

~ Get the desired font:
• font - Font

~ Current time:
Still available for Asia/Tehran time zone
• time - date

~ Password Generator:
• pass

~ Jokes:
• joke
",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=> "Main Menu", 'callback_data'=>"back_g"]],
              ]])
        ]);}else{
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "You're not admin.",
        'show_alert' => false
    ]);}}
//=== dev : @Everest666 ===\\
if($tc == "supergroup" or $tc == "group" ){
$all_gaps2 = explode("\n",$all_gaps); 
if(!in_array($chat_id,$all_gaps2)){
$tctctct = fopen("data/allgap.txt", "a") or die("Unable to open file!");
fwrite($tctctct, "\n$chat_id");
fclose($tctctct);
bot('sendMessage',[
  'chat_id' =>$chat_id,
  'text' => "$name_bot has been configured in group.

📚 <b>First make me full-permission admin then send `panel` to configure the settings.</b>

⚠️ <b>I can't do anything until you make me full-permission admin.</b>",
 'parse_mode'=>"HTML",
]);
bot('sendMessage',[
            'chat_id' =>$admins[0],
'text' => "The group $chat_id has been added to $name_bot.",
 'parse_mode'=>"MarkDown",
]);}
if($text && file_exists("data/words/$text.txt")){
$file = file_get_contents("data/words/$text.txt");
$ex = explode("\n",$file);
$jrand = $ex[rand(0, count($ex)-1)];
bot('sendMessage',[
    'chat_id' =>$chat_id,
    'text' =>$jrand,
'reply_to_message_id'=>$message_id,
]);}
//=== dev : @Everest666 ===\\
if(preg_match('/^(font|Font) (.*)/s', $text, $mtch)){
$matn = strtoupper("$mtch[2]");
$Eng = ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M'];
$Font_0 = ['𝐐','𝐖','𝐄','𝐑','𝐓','𝐘','𝐔','𝐈','𝐎','𝐏','𝐀','𝐒','𝐃','𝐅','𝐆','𝐇','𝐉','𝐊','𝐋','𝐙','𝐗','𝐂','𝐕','𝐁','𝐍','𝐌'];
$Font_1 = ['𝑸','𝑾','𝑬','𝑹','𝑻','𝒀','𝑼','𝑰','𝑶','𝑷','𝑨','𝑺','𝑫','𝑭','𝑮','𝑯','𝑱','𝑲','𝑳','𝒁','𝑿','𝑪','𝑽','𝑩','𝑵','𝑴'];
$Font_2 = ['𝑄','𝑊','𝐸','𝑅','𝑇','𝑌','𝑈','𝐼','𝑂','𝑃','𝐴','𝑆','𝐷','𝐹','𝐺','𝐻','𝐽','𝐾','𝐿','𝑍','𝑋','𝐶','𝑉','𝐵','𝑁','𝑀'];
$Font_3 = ['𝗤','𝗪','𝗘','𝗥','𝗧','𝗬','𝗨','𝗜','𝗢','𝗣','𝗔','𝗦','𝗗','𝗙','𝗚','𝗛','𝗝','𝗞','𝗟','𝗭','𝗫','𝗖','𝗩','𝗕','𝗡','𝗠'];
$Font_4 = ['𝖰','𝖶','𝖤','𝖱','𝖳','𝖸','𝖴','𝖨','𝖮','𝖯','𝖠','𝖲','𝖣','𝖥','𝖦','𝖧','𝖩','𝖪','𝖫','𝖹','𝖷','𝖢','𝖵','𝖡','𝖭','𝖬'];
$Font_5 = ['𝕼','𝖂','𝕰','𝕽','𝕵','𝚼','𝖀','𝕿','𝕺','𝕻','𝕬','𝕾','𝕯','𝕱','𝕲','𝕳','𝕴','𝕶','𝕷','𝖅','𝖃','𝕮','𝖁','𝕭','𝕹','𝕸'];
$Font_6 = ['𝔔','𝔚','𝔈','ℜ','𝔍','ϒ','𝔘','𝔗','𝔒','𝔓','𝔄','𝔖','𝔇','𝔉','𝔊','ℌ','ℑ','𝔎','𝔏','ℨ','𝔛','ℭ','𝔙','𝔅','𝔑','𝔐'];
$Font_7 = ['𝙌','𝙒','𝙀','𝙍','𝙏','𝙔','𝙐','𝙄','𝙊','𝙋','𝘼','𝙎','𝘿','𝙁','𝙂','𝙃','𝙅','𝙆','𝙇','𝙕','𝙓','𝘾','𝙑','𝘽','𝙉','𝙈'];
$Font_8 = ['𝘘','𝘞','𝘌','𝘙','𝘛','𝘠','𝘜','𝘐','𝘖','𝘗','𝘈','𝘚','𝘋','𝘍','𝘎','𝘏','𝘑','𝘒','𝘓','𝘡','𝘟','𝘊','𝘝','𝘉','𝘕','𝘔'];
$Font_9 = ['Q̶̶','W̶̶','E̶̶','R̶̶','T̶̶','Y̶̶','U̶̶','I̶̶','O̶̶','P̶̶','A̶̶','S̶̶','D̶̶','F̶̶','G̶̶','H̶̶','J̶̶','K̶̶','L̶̶','Z̶̶','X̶̶','C̶̶','V̶̶','B̶̶','N̶̶','M̶̶'];
$Font_10 = ['Q̷̷̶̶','W̷̷̶̶','E̷̷̶̶','R̷̷̶̶','T̷̷̶̶','Y̷̷̶̶','U̷̷̶̶','I̷̷̶̶','O̷̷̶̶','P̷̷̶̶','A̷̷̶̶','S̷̷̶̶','D̷̷̶̶','F̷̷̶̶','G̷̷̶̶','H̷̷̶̶','J̷̷̶̶','K̷̷̶̶','L̷̷̶̶','Z̷̷̶̶','X̷̷̶̶','C̷̷̶̶','V̷̷̶̶','B̷̷̶̶','N̷̷̶̶','M̷̷̶̶'];
$Font_11 = ['Q͟͟','W͟͟','E͟͟','R͟͟','T͟͟','Y͟͟','U͟͟','I͟͟','O͟͟','P͟͟','A͟͟','S͟͟','D͟͟','F͟͟','G͟͟','H͟͟','J͟͟','K͟͟','L͟͟','Z͟͟','X͟͟','C͟͟','V͟͟','B͟͟','N͟͟','M͟͟'];
$Font_12 = ['Q͇͇','W͇͇','E͇͇','R͇͇','T͇͇','Y͇͇','U͇͇','I͇͇','O͇͇','P͇͇','A͇͇','S͇͇','D͇͇','F͇͇','G͇͇','H͇͇','J͇͇','K͇͇','L͇͇','Z͇͇','X͇͇','C͇͇','V͇͇','B͇͇','N͇͇','M͇͇'];
$Font_13 = ['Q̤̤','W̤̤','E̤̤','R̤̤','T̤̤','Y̤̤','Ṳ̤','I̤̤','O̤̤','P̤̤','A̤̤','S̤̤','D̤̤','F̤̤','G̤̤','H̤̤','J̤̤','K̤̤','L̤̤','Z̤̤','X̤̤','C̤̤','V̤̤','B̤̤','N̤̤','M̤̤'];
$Font_14 = ['Q̰̰','W̰̰','Ḛ̰','R̰̰','T̰̰','Y̰̰','Ṵ̰','Ḭ̰','O̰̰','P̰̰','A̰̰','S̰̰','D̰̰','F̰̰','G̰̰','H̰̰','J̰̰','K̰̰','L̰̰','Z̰̰','X̰̰','C̰̰','V̰̰','B̰̰','N̰̰','M̰̰'];
$Font_15 = ['디','山','乇','尺','亇','丫','凵','工','口','ㄗ','闩','丂','刀','下','彑','⼶','亅','片','乚','乙','乂','亡','ム','乃','力','从'];
$Font_16= ['ዓ','ሠ','ይ','ዩ','ፐ','ሃ','ሀ','ፗ','ዐ','የ','ል','ና','ሏ','ፑ','ፘ','ዘ','ጋ','ኸ','ረ','ጓ','ጰ','ር','ህ','ፎ','በ','ጠ'];
$Font_17= ['Ꭷ','Ꮃ','Ꭼ','Ꮢ','Ꭲ','Ꭹ','Ꮜ','Ꮖ','Ꮻ','Ꮲ','Ꭺ','Ꮪ','Ꭰ','Ꮀ','Ꮐ','Ꮋ','Ꭻ','Ꮶ','Ꮮ','Ꮓ','Ꮱ','Ꮯ','Ꮩ','Ᏼ','N','Ꮇ'];
$Font_18= ['Ǫ','Ѡ','Σ','Ʀ','Ϯ','Ƴ','Ʋ','Ϊ','Ѳ','Ƥ','Ѧ','Ƽ','Δ','Ӻ','Ǥ','ⴼ','Ɉ','Ҟ','Ɫ','Ⱬ','Ӽ','Ҁ','Ѵ','Ɓ','Ɲ','ᛖ'];
$Font_19= ['ꐎ','ꅐ','ꂅ','ꉸ','ꉢ','ꌦ','ꏵ','ꀤ','ꏿ','ꉣ','ꁲ','ꌗ','ꅓ','ꊰ','ꁅ','ꍬ','ꀭ','ꂪ','꒒','ꏣ','ꉧ','ꊐ','ꏝ','ꃃ','ꊮ','ꂵ'];
$Font_20= ['ᘯ','ᗯ','ᕮ','ᖇ','ᙢ','ᖻ','ᑌ','ᖗ','ᗝ','ᑭ','ᗩ','ᔕ','ᗪ','ᖴ','ᘜ','ᕼ','ᒍ','ᖉ','ᒐ','ᘔ','᙭','ᑕ','ᕓ','ᗷ','ᘉ','ᗰ'];
$Font_21= ['ᑫ','ᗯ','ᗴ','ᖇ','Ꭲ','Ꭹ','ᑌ','Ꮖ','ᝪ','ᑭ','ᗩ','ᔑ','ᗞ','ᖴ','Ꮐ','ᕼ','ᒍ','Ꮶ','Ꮮ','Ꮓ','᙭','ᑕ','ᐯ','ᗷ','ᑎ','ᗰ'];
$Font_22= ['ℚ','Ꮤ','℮','ℜ','Ƭ','Ꮍ','Ʋ','Ꮠ','Ꮎ','⅌','Ꭿ','Ꮥ','ⅅ','ℱ','Ꮹ','ℋ','ℐ','Ӄ','ℒ','ℤ','ℵ','ℭ','Ꮙ','Ᏸ','ℕ','ℳ'];
$Font_23= ['Ԛ','ᚠ','ᛊ','ᚱ','ᛠ','ᚴ','ᛘ','ᛨ','θ','ᚹ','ᚣ','ᛢ','ᚦ','ᚫ','ᛩ','ᚻ','ᛇ','ᛕ','ᚳ','Z','ᚷ','ᛈ','ᛉ','ᛒ','ᚺ','ᚥ'];
$Font_24= ['𝓠','𝓦','𝓔','𝓡','𝓣','𝓨','𝓤','𝓘','𝓞','𝓟','𝓐','𝓢','𝓓','𝓕','𝓖','𝓗','𝓙','𝓚','𝓛','𝓩','𝓧','𝓒','𝓥','𝓑','𝓝','𝓜'];
$Font_25= ['𝒬','𝒲','ℰ','ℛ','𝒯','𝒴','𝒰','ℐ','𝒪','𝒫','𝒜','𝒮','𝒟','ℱ','𝒢','ℋ','𝒥','𝒦','ℒ','𝒵','𝒳','𝒞','𝒱','ℬ','𝒩','ℳ'];$Font_26= ['ℚ','𝕎','𝔼','ℝ','𝕋','𝕐','𝕌','𝕀','𝕆','ℙ','𝔸','𝕊','𝔻','𝔽','𝔾','ℍ','𝕁','𝕂','𝕃','ℤ','𝕏','ℂ','𝕍','𝔹','ℕ','𝕄'];
$Font_27= ['Ｑ','Ｗ','Ｅ','Ｒ','Ｔ','Ｙ','Ｕ','Ｉ','Ｏ','Ｐ','Ａ','Ｓ','Ｄ','Ｆ','Ｇ','Ｈ','Ｊ','Ｋ','Ｌ','Ｚ','Ｘ','Ｃ','Ｖ','Ｂ','Ｎ','Ｍ'];
$Font_28= ['ǫ','ᴡ','ᴇ','ʀ','ᴛ','ʏ','ᴜ','ɪ','ᴏ','ᴘ','ᴀ','s','ᴅ','ғ','ɢ','ʜ','ᴊ','ᴋ','ʟ','ᴢ','x','ᴄ','ᴠ','ʙ','ɴ','ᴍ'];
$Font_29= ['𝚀','𝚆','𝙴','𝚁','𝚃','𝚈','𝚄','𝙸','𝙾','𝙿','𝙰','𝚂','𝙳','𝙵','𝙶','𝙷','𝙹','𝙺','𝙻','𝚉','𝚇','𝙲','𝚅','𝙱','𝙽','𝙼'];
$Font_30= ['ᵟ','ᵂ','ᴱ','ᴿ','ᵀ','ᵞ','ᵁ','ᴵ','ᴼ','ᴾ','ᴬ','ˢ','ᴰ','ᶠ','ᴳ','ᴴ','ᴶ','ᴷ','ᴸ','ᶻ','ˣ','ᶜ','ⱽ','ᴮ','ᴺ','ᴹ'];
$Font_31= ['Ⓠ','Ⓦ','Ⓔ','Ⓡ','Ⓣ','Ⓨ','Ⓤ','Ⓘ','Ⓞ','Ⓟ','Ⓐ','Ⓢ','Ⓓ','Ⓕ','Ⓖ','Ⓗ','Ⓙ','Ⓚ','Ⓛ','Ⓩ','Ⓧ','Ⓒ','Ⓥ','Ⓑ','Ⓝ','Ⓜ'];
$Font_32= ['🅀','🅆','🄴','🅁','🅃','🅈','🅄','🄸','🄾','🄿','🄰','🅂','🄳','🄵','🄶','🄷','🄹','🄺','🄻','🅉','🅇','🄲','🅅','🄱','🄽','🄼'];
$Font_33= ['🅠','🅦','🅔','🅡','🅣','🅨','🅤','🅘','🅞','🅟','🅐','🅢','🅓','🅕','🅖','🅗','🅙','🅚','🅛','🅩​','🅧','🅒','🅥','🅑','🅝','🅜'];
$Font_34= ['🆀','🆆','🅴','🆁','🆃','🆈','🆄','🅸','🅾','🅿','🅰','🆂','🅳','🅵','🅶','🅷','🅹','🅺','🅻','🆉','🆇','🅲','🆅','🅱','🅽','🅼'];
$Font_35= ['🇶 ','🇼 ','🇪 ','🇷 ','🇹 ','🇾 ','🇺 ','🇮 ','🇴 ','🇵 ','🇦 ','🇸 ','🇩 ','🇫 ','🇬 ','🇭 ','🇯 ','🇰 ','🇱 ','🇿 ','🇽 ','🇨 ','🇻 ','🇧 ','🇳 ','🇲 '];
//===. dev : @Everest666 ===\\
$nn = str_replace($Eng,$Font_0,$matn);
$a = str_replace($Eng,$Font_1,$matn);
$b = str_replace($Eng,$Font_2,$matn);
$c = trim(str_replace($Eng,$Font_3,$matn));
$d = str_replace($Eng,$Font_4,$matn);
$e = str_replace($Eng,$Font_5,$matn);
$f = str_replace($Eng,$Font_6,$matn);
$g = str_replace($Eng,$Font_7,$matn);
$h = str_replace($Eng,$Font_8,$matn);
$i = str_replace($Eng,$Font_9,$matn);
$j = str_replace($Eng,$Font_10,$matn);
$k = str_replace($Eng,$Font_11,$matn);
$l = str_replace($Eng,$Font_12,$matn);
$m = str_replace($Eng,$Font_13,$matn);
$n = str_replace($Eng,$Font_14,$matn);
$o = str_replace($Eng,$Font_15,$matn);
$p= str_replace($Eng,$Font_16,$matn);
$q= str_replace($Eng,$Font_17,$matn);
$r= str_replace($Eng,$Font_18,$matn);
$s= str_replace($Eng,$Font_19,$matn);
$t= str_replace($Eng,$Font_20,$matn);
$u= str_replace($Eng,$Font_21,$matn);
$v= str_replace($Eng,$Font_22,$matn);
$w= str_replace($Eng,$Font_23,$matn);
$x= str_replace($Eng,$Font_24,$matn);
$y= str_replace($Eng,$Font_25,$matn);
$z= str_replace($Eng,$Font_26,$matn);
$aa= str_replace($Eng,$Font_27,$matn);
$ac= str_replace($Eng,$Font_28,$matn);
$ad= str_replace($Eng,$Font_29,$matn);
$af= str_replace($Eng,$Font_30,$matn);
$ag= str_replace($Eng,$Font_31,$matn);
$ah= str_replace($Eng,$Font_32,$matn);
$am= str_replace($Eng,$Font_33,$matn);
$as= str_replace($Eng,$Font_34,$matn);
$pol= str_replace($Eng,$Font_35,$matn);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text' => "
1 - $nn
2 - $a
3 - $b
4 - $c
5 - $d
6 - $e
7 - $f
8 - $g
9 - $h
10 - $i
11 - $j
12 - $k
13 - $l
14 - $m
15 - $n
16 - $o
17 - $p
18 - $q
19 - $r
20 - $s
21 - $t
22 - $u
23 - $v
24 - $w
25 - $x
26 - $y
27 - $z
28 - $aa
29 - $ac
30 - $ad
31 - $af
32 - $ag
33 - $ah
34 - $am
35 - $as
36 - $pol

Your font is ready: $mtch[2]
" ,
'parse_mode'=>'MarkDown',
]);}
//=== dev : @Everest666 ===\\
if(preg_match('/^(gif) (.*)/s', $text, $mtch)){
//===. dev : @Everest666 ===\\
$matn = strtoupper("$mtch[2]");
$bot = [
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=alien-glow-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=flash-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=shake-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=highlight-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=blue-fire&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=burn-in-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=whirl-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=inner-fire-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=glitter-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=flaming-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
"https://www.flamingtext.com/net-fu/proxy_form.cgi?imageoutput=true&script=memories-anim-logo&text=$matn&doScale=true&scaleWidth=240&scaleHeight=120",
];
$r = $bot[rand(0, count($bot)-1)];
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>"$r",
'caption'=>"@$channel",
'reply_to_message_id'=>$message_id,
]);}
//-------
if($text == "me"){
$profile = "https://telegram.me/$username";
 bot('sendphoto',[
'chat_id' => $chat_id,
'photo'=>$profile,
'caption' =>"Your account information:
Your ID: $from_id",
  'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"Your username", "callback_data"=>"text"],['text'=>"@$username", "callback_data"=>"text"]],
[['text'=>"Your name", "callback_data"=>"text"]],[['text'=>"$first_name $last_name", "callback_data"=>"text"]],
[['text'=>"Add $name_bot to a group",'url'=>"https://t.me/$bottag?startgroup=new"]],]]) ]);}
//--------//////--------/////-----
//=== dev : @Everest666 ===\\
if($text == "time" or $text == "date" ){
bot('sendMessage',[
 'chat_id'=>$chat_id,
    'text'=>
        $date('Y-m-d  H:i:s'),
        $date('l, F d, Y -- h:i:s microtime(return_float) A'),
    'reply_to_message_id'=>$message_id,
 ]); }

if($text == "joke"){
$joke = file_get_contents("http://api.codebazan.ir/jok");
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 ➖➖➖➖🤣➖➖➖➖
 
 $joke
 
 ➖➖➖➖➖➖➖➖➖
",
'reply_to_message_id'=>$message_id,
]); }
 
 if($text == "pass"){
 $passwordSaz = file_get_contents("http://api.codebazan.ir/password/?length=12");
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"
 ➖➖➖➖🔐➖➖➖➖
 
 Your powerfull password is: `$passwordSaz`
 
 ➖➖➖➖➖➖➖➖➖
",
'reply_to_message_id'=>$message_id,
]); }
}}
//=== dev : @Everest666 ===\\
if($text == "/panel"){
if($tc == "private" ){
if(in_array($chat_id,$admins)){
step($chat_id,"none");
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Welcome to my management panel, Sir.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
 'inline_keyboard'=>[
//===. dev : @Everest666 ===\\
 [['text'=>"Clear Waitlist",'callback_data'=>'delint']],
[['text'=>"Force accept the word: $auto_memorise",'callback_data'=>'setAuto']],
 [['text'=>"General statistics",'callback_data'=>'stats'],['text'=>"Delete Word",'callback_data'=>'delWord']],
 [['text'=>"Block user?",'callback_data'=>'black'],['text'=>"Unblock user?",'callback_data'=>'unblack']],
[['text'=>"Forward to Groups",'callback_data'=>'forgp'],['text'=>"Forward to users",'callback_data'=>'foruser']],
[['text'=>"Send to groups",'callback_data'=>'sendgp'],['text'=>"Send to users",'callback_data'=>'senduser']],
[['text'=>"Send to all users and groups",'callback_data'=>'sendall'],['text'=>"Forward to all groups and users",'callback_data'=>'forall']],
[['text'=> "Start Menu", 'callback_data'=>"back"]],]])
]); }}}
if($data == "stats" ){
$ex1 = explode("\n",$all_users);
$ex2 = explode("\n",$all_gaps);
$c1 = count($ex1)-1;
$c2 = count($ex2)-1;
$document = 'data/words';
$scan = scandir($document);
$scan = array_diff($scan, ['.','..']);
$fil = count($scan);
$ca = count($admins);
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"$name_bot Statistics:
 
🚻 Users: $c1
🛗 Groups: $c2
🛃 Admins: $ca
🛄 Words: $fil",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Clear Waitlist",'callback_data'=>'delint']],
                [['text'=>"Force accept the word: $auto_memorise",'callback_data'=>'setAuto']],
                [['text'=>"General statistics",'callback_data'=>'stats'],['text'=>"Delete Word",'callback_data'=>'delWord']],
                [['text'=>"Block user?",'callback_data'=>'black'],['text'=>"Unblock user?",'callback_data'=>'unblack']],
                [['text'=>"Forward to Groups",'callback_data'=>'forgp'],['text'=>"Forward to users",'callback_data'=>'foruser']],
                [['text'=>"Send to groups",'callback_data'=>'sendgp'],['text'=>"Send to users",'callback_data'=>'senduser']],
                [['text'=>"Send to all users and groups",'callback_data'=>'sendall'],['text'=>"Forward to all groups and users",'callback_data'=>'forall']],
                [['text'=> "Start Menu", 'callback_data'=>"back"]],]])
 ]); }
if($data == "back_p" ){
step($chatid,"none");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"You're back to main management panel, Sir.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Clear Waitlist",'callback_data'=>'delint']],
                [['text'=>"Force accept the word: $auto_memorise",'callback_data'=>'setAuto']],
                [['text'=>"General statistics",'callback_data'=>'stats'],['text'=>"Delete Word",'callback_data'=>'delWord']],
                [['text'=>"Block user?",'callback_data'=>'black'],['text'=>"Unblock user?",'callback_data'=>'unblack']],
                [['text'=>"Forward to Groups",'callback_data'=>'forgp'],['text'=>"Forward to users",'callback_data'=>'foruser']],
                [['text'=>"Send to groups",'callback_data'=>'sendgp'],['text'=>"Send to users",'callback_data'=>'senduser']],
                [['text'=>"Send to all users and groups",'callback_data'=>'sendall'],['text'=>"Forward to all groups and users",'callback_data'=>'forall']],
                [['text'=> "Start Menu", 'callback_data'=>"back"]],]]) ]); }
elseif($data == "setAuto" ){
if($auto_memorise == "✅"){
file_put_contents("data/autoMemorise.txt","⬜");}
if($auto_memorise == "⬜"){
file_put_contents("data/autoMemorise.txt","✅");}
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>$textt,
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Clear Waitlist",'callback_data'=>'delint']],
                [['text'=>"Force accept the word: $auto_memorise",'callback_data'=>'setAuto']],
                [['text'=>"General statistics",'callback_data'=>'stats'],['text'=>"Delete Word",'callback_data'=>'delWord']],
                [['text'=>"Block user?",'callback_data'=>'black'],['text'=>"Unblock user?",'callback_data'=>'unblack']],
                [['text'=>"Forward to Groups",'callback_data'=>'forgp'],['text'=>"Forward to users",'callback_data'=>'foruser']],
                [['text'=>"Send to groups",'callback_data'=>'sendgp'],['text'=>"Send to users",'callback_data'=>'senduser']],
                [['text'=>"Send to all users and groups",'callback_data'=>'sendall'],['text'=>"Forward to all groups and users",'callback_data'=>'forall']],
                [['text'=> "Start Menu", 'callback_data'=>"back"]],
              ]
        ])
]); 
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "✅ Changes applied.",
        'show_alert' => false
    ]);}
if($data == "delint"){
deletefolder("data/int");
bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "Waitlist cleared!",
        'show_alert' => true
    ]);}
//=== dev : @Everest666 ===\\
if($data == "forall" ){
step($chatid,"forall");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"Forward the message:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[[['text'=>"Main Menu",'callback_data'=>'back_p']],]])
]); }
elseif($user['step'] == "forall"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"In process،please wait...",
 'parse_mode'=>"MarkDown",
 ]); 
      $ex = explode("\n",$all_users);
    foreach($ex as $key){
bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
 $exs = explode("\n",$all_gaps);
          foreach($exs as $key){
 bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
       ]) ]);  } }
	if($data == "sendall" ){
step($chatid,"sendall");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 Send the message:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
        ]) ]); }

	elseif($user['step'] == "sendall"  && $tc == "private"){
	if($tc == "private" && in_array($chat_id,$admins)){
	 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"In process, please wait...",
 'parse_mode'=>"MarkDown",
	 ]); 
                $ex = explode("\n",$all_users);
               foreach($ex as $key){
 bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
]);}
$exs = explode("\n",$all_gaps);
            foreach($exs as $key){
bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 Message sent for all",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
        ]) ]);  } }
	if($data == "senduser" ){
step($chatid,"senduser");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 Send the message:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
        ]) ]); }
	elseif($user['step'] == "senduser"  && $tc == "private"){
	if($tc == "private" && in_array($chat_id,$admins)){
	 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"In process, please wait...",
 'parse_mode'=>"MarkDown",
	 ]); 
     $ex = explode("\n",$all_users);
      foreach($ex as $key){
  bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
	]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 Message has been sent to all users!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]  ]) ]);  } }
if($data == "sendgp" ){
step($chatid,"sendgp");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"📥 Send the message:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
  ]
  ])
 ]); }
//=== .dev : @Everest666 ===\\

elseif($user['step'] == "sendgp"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"In process, please wait...",
 'parse_mode'=>"MarkDown",
	 ]); 
 $ex = explode("\n",$all_gaps);
 foreach($ex as $key){
 bot('sendMessage',[
 'chat_id'=>$key,
 'text'=>$text,
   'disable_web_page_preview'=>true,
	]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 Message has been sent to all groups!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu️",'callback_data'=>'back_p']],
              ] ]) ]);  } }
if($data == "foruser" ){
step($chatid,"foruser");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"📥 Forward the message:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ] ]) ]); }
elseif($user['step'] == "foruser"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"In process, please wait...",
 'parse_mode'=>"MarkDown", ]); 
   $ex = explode("\n",$all_users);
   foreach($ex as $key){
   bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 Message has been forwarded to all users!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
    [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ] ]) ]);  } }
if($data == "forgp" ){
step($chatid,"forgp");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"📥 Forward the message:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
        ]) ]); }
elseif($user['step'] == "forgp"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"In process, please wait...",
 'parse_mode'=>"MarkDown",
 ]); 
  $ex = explode("\n",$all_gaps);
  foreach($ex as $key){
  bot('ForwardMessage',[
'chat_id'=>$key,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📑 Message has been forwarded to all groups!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                  [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
       ]) ]);  } }
//=== dev : @Everest666 ===\\

if($data == "unblack" ){
step($chatid,"unblack");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"🎓 Please send the users username:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
        ]) ]); }

elseif($user['step'] == "unblack"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
$tt = time();
file_put_contents("data/spam/$text.txt",$tt);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🗑️ User has been removed from block list!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
        ]) ]); 
 bot('sendMessage',[
 'chat_id'=>$text,
 'text'=>"You've been removed from block list!",
 'parse_mode'=>"MarkDown",
	 ]);  } }
if($data == "black" ){
step($chatid,"black");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"🎓 Please send the users username:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
       ]) ]); }
elseif($user['step'] == "black"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
$tt = time() + 9999999999999999999;
file_put_contents("data/spam/$text.txt",$tt);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🛡️ User has been blocked!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
       ]) ]); 
 bot('sendMessage',[
 'chat_id'=>$text,
 'text'=>"You've been blocked!",
 'parse_mode'=>"MarkDown",
 ]);  } }
if($data == "delWord" ){
step($chatid,"delWord");
bot('editMessagetext',[
 'chat_id'=>$chatid,
'message_id'=>$messageid,
 'text'=>"🎓 Submit the desired word:",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"Main Menu",'callback_data'=>'back_p']],
              ]
      ]) ]); }
elseif($user['step'] == "delWord"  && $tc == "private"){
if($tc == "private" && in_array($chat_id,$admins)){
if(file_exists("data/words/$text.txt")){
unlink("data/words/$text.txt");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🗑️ The word sent was removed from the $name_bot list!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[ [['text'=>"Main Menu",'callback_data'=>'back_p']],
 ]
       ])
 ]); 
}else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🎓 This word doesn't exist in my memory!",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[[['text'=>"Main Menu",'callback_data'=>'back_p']], ]  ]) ]);  } }}
?>