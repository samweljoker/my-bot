<?php
ob_start();
define('API_KEY','token');
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function Bot($hmode,$datas=[]){
$hmo =http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$hmode."?$hmo";
$php82 = file_get_contents($url);
return json_decode($php82);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id ?? $update->callback_query->message->chat->id;
$from_id = $message->from->id ?? $update->callback_query->from->id;
$text = $message->text;
$message_id = $message->message_id ?? $update->callback_query->message->message_id;
$name = $message->from->first_name ?? $update->callback_query->from->first_name;
$username = $message->from->username;
$data = $update->callback_query->data;
$zkrf = json_decode(file_get_contents("zkrf.json"),true);
function save($array){
file_put_contents("zkrf.json",json_encode($array));
}
if($text == "/start"){
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*‹ : اهلا في بوت الزغرفة المتطور .

‹ : يحتوي البوت على اقسام للزغرفة .
‹ : يمكنك الزغرفة باللغة العربية و الانكليزية .*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪِ࣪خِࢪفِةِ عٰࢪبُيُ : ›","callback_data"=>"ar"],['text'=>"‹ : ࢪِ࣪خِࢪفِةِ اެنِكَݪشِ : ›","callback_data"=>"en"]],
[['text'=>"‹ : ࢪِ࣪خِࢪفِةِ اެࢪقِاެمِ : ›","callback_data"=>"0-9"]],
]])
]);
unset($zkrf["Bot"]["$from_id"]);
save($zkrf);
}
if($data == "back"){
Bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*‹ : اهلا في بوت الزغرفة المتطور .

‹ : يحتوي البوت على اقسام للزغرفة .
‹ : يمكنك الزغرفة باللغة العربية و الانكليزية .*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪِ࣪خِࢪفِةِ عٰࢪبُيُ : ›","callback_data"=>"ar"],['text'=>"‹ : ࢪِ࣪خِࢪفِةِ اެنِكَݪشِ : ›","callback_data"=>"en"]],
[['text'=>"‹ : ࢪِ࣪خِࢪفِةِ اެࢪقِاެمِ : ›","callback_data"=>"0-9"]],
]])
]);
unset($zkrf["Bot"]["$from_id"]);
save($zkrf);
}
if($data == "ar"){
Bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*- حسنا قم بأرسال اسمك بلغة العربيةهَ فقط .*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪجَۅعٰ : ›","callback_data"=>"back"]],
]])
]);
$zkrf["Bot"]["$from_id"] = "open ar";
save($zkrf);
}
if($zkrf["Bot"]["$from_id"] == "open ar" and preg_match('/([ا-ي])/i',$text)){
$hmo = str_replace('ض', 'ضِ', $text);
$hmo = str_replace('ص', 'صِ', $hmo);
$hmo = str_replace('ق', 'قِ', $hmo);
$hmo = str_replace('ف', 'فِ', $hmo);
$hmo = str_replace('غ', 'غِ', $hmo);
$hmo = str_replace('ع', 'عٰ', $hmo);
$hmo = str_replace('ه', 'هَ', $hmo);
$hmo = str_replace('خ', 'خِ', $hmo);
$hmo = str_replace('ح', 'حِ', $hmo);
$hmo = str_replace('ج', 'جَ', $hmo);
$hmo = str_replace('ش', 'شِ', $hmo);
$hmo = str_replace('س', 'سُ', $hmo);
$hmo = str_replace('ي', 'يُ', $hmo);
$hmo = str_replace('ب', 'بُ', $hmo);
$hmo = str_replace('ل', 'ݪ', $hmo);
$hmo = str_replace('ا', 'اެ', $hmo);
$hmo = str_replace('ت', 'تِ', $hmo);
$hmo = str_replace('ن', 'نِ', $hmo);
$hmo = str_replace('م', 'مِ', $hmo);
$hmo = str_replace('ك', 'كَ', $hmo);
$hmo = str_replace('ظ', 'ظَ', $hmo);
$hmo = str_replace('ط', 'طَ', $hmo);
$hmo = str_replace('ذ', 'ذِ', $hmo);
$hmo = str_replace('ز', 'ࢪِ࣪', $hmo);
$hmo = str_replace('ر', 'ࢪ', $hmo);
$hmo = str_replace('و', 'ۅ', $hmo);
$hmo = str_replace('ة', 'ةِ', $hmo);
$hmo = str_replace('ث', 'ثِ', $hmo);
Bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"*$hmo*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
]);
$hmo=str_replace('ض','ﺿ',$text);
$hmo=str_replace('ص','ﺻ',$hmo);
$hmo=str_replace('ث','ﺚ',$hmo);
$hmo=str_replace('ق','ﭱ',$hmo);
$hmo=str_replace('ف','ﭫ',$hmo);
$hmo=str_replace('غ','ڠ',$hmo);
$hmo=str_replace('؏','ع',$hmo);
$hmo=str_replace('خ','ݗ',$hmo);
$hmo=str_replace('ح','حُ',$hmo);
$hmo=str_replace('ج','ݘ',$hmo);
$hmo=str_replace('ش','ﺸ',$hmo);
$hmo=str_replace('س','ﺴ',$hmo);
$hmo=str_replace('ي','ﯥ',$hmo);
$hmo=str_replace('ب','ﭘ',$hmo);
$hmo=str_replace('ل','ڸ',$hmo);
$hmo=str_replace('ا','آ',$hmo);
$hmo=str_replace('ت','ٿ',$hmo);
$hmo=str_replace('ن','ﮡ',$hmo);
$hmo=str_replace('م','ﻢ',$hmo);
$hmo=str_replace('ك','ﮗ',$hmo);
$hmo=str_replace('ظ','ظ',$hmo);
$hmo=str_replace('ظ','ظ',$hmo);
$hmo=str_replace('ء','ء',$hmo);
$hmo=str_replace('ؤ','ؤ',$hmo);
$hmo=str_replace('ر','ر',$hmo);
$hmo=str_replace('ى','ى',$hmo);
$hmo=str_replace('ز','ز',$hmo);
$hmo=str_replace('و','ﯛ̲୭',$hmo);
$hmo=str_replace("ه","ۿۿہ",$hmo);
Bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*$hmo*",
'parse_mode'=>'MarkDown',
]);
$hmo = str_replace('ض','ضٰہٰٖ',$text);
$hmo = str_replace('ص','صٰہٰٖ',$hmo);
$hmo = str_replace('ث','ثٰہٰٖ',$hmo);
$hmo = str_replace('ق','قٰہٰٖ',$hmo);
$hmo = str_replace('ف','فٰہٰٖ',$hmo);
$hmo = str_replace('غ','غٰہٰٖ',$hmo);
$hmo = str_replace('ع','عٰہٰٖ',$hmo);
$hmo = str_replace('ه','هٰہٰٖ',$hmo);
$hmo = str_replace('خ','خٰہٰٖ',$hmo);
$hmo = str_replace('ح','حٰہٰٖ',$hmo);
$hmo = str_replace('ج','جٰہٰٖ',$hmo);
$hmo = str_replace('ش','شٰہٰٖ',$hmo);
$hmo = str_replace('س','سٰہٰٖ',$hmo);
$hmo = str_replace('ي','يٰہٰٖ',$hmo);
$hmo = str_replace('ب','بٰہٰٖ',$hmo);
$hmo = str_replace('ل','لہٰٖ',$hmo);
$hmo = str_replace('ا','اٰ',$hmo);
$hmo = str_replace('ت','تٰہٰٖ',$hmo);
$hmo = str_replace('ن','نٰہٰٖ',$hmo);
$hmo = str_replace('م','مٰہٰٖ',$hmo);
$hmo = str_replace('ك','كٰہٰٖ',$hmo);
$hmo = str_replace('ة','ةً',$hmo);
$hmo = str_replace('ء','ء',$hmo);
$hmo = str_replace('ظ','ظٰہٰٖ',$hmo);
$hmo = str_replace('ط','طٰہٰٖ',$hmo);
$hmo = str_replace('ذ','ذٖ',$hmo);
$hmo = str_replace('د','دٰ',$hmo);
$hmo = str_replace('ز','زٖ',$hmo);
$hmo = str_replace('ر','رٰ',$hmo);
$hmo = str_replace('و','وٰ',$hmo);
$hmo = str_replace('ى','ى',$hmo);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$hmo.'*',
'parse_mode'=>'MarkDown',
]);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*- تم انتهاء زخرفه اسمك '.$text.' .',
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪجَۅعٰ : ›","callback_data"=>"back"]],
]])
]);
unset($zkrf["Bot"]["$from_id"]);
save($zkrf);
}

if($data == "en"){
Bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*- حسنا قم بأرسال اسمك بلغة انكليزيةه فقط .*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪجَۅعٰ : ›","callback_data"=>"back"]],
]])
]);
$zkrf["Bot"]["$from_id"] = "open en";
save($zkrf);
}
if($zkrf["Bot"]["$from_id"] == "open en" and preg_match('/([a-z])/',$text)){
$devhmo = str_replace('a','ᵃ',$text);
$devhmo = str_replace('A','ᵃ',$devhmo);
$devhmo = str_replace('b','ᵇ',$devhmo);
$devhmo = str_replace('B','ᵇ',$devhmo);
$devhmo = str_replace('c','ᶜ',$devhmo);
$devhmo = str_replace('C','ᶜ',$devhmo);
$devhmo = str_replace('d','ᵈ',$devhmo);
$devhmo = str_replace('D','ᵈ',$devhmo);
$devhmo = str_replace('e','ᵉ',$devhmo);
$devhmo = str_replace('E','ᵉ',$devhmo);
$devhmo = str_replace('f','ᶠ',$devhmo);
$devhmo = str_replace('F','ᶠ',$devhmo);
$devhmo = str_replace('g','ᵍ',$devhmo);
$devhmo = str_replace('G','ᵍ',$devhmo);
$devhmo = str_replace('h','ʰ',$devhmo);
$devhmo = str_replace('H','ʰ',$devhmo);
$devhmo = str_replace('i','ᶤ',$devhmo);
$devhmo = str_replace('I','ᶤ',$devhmo);
$devhmo = str_replace('j','ʲ',$devhmo);
$devhmo = str_replace('J','ʲ',$devhmo);
$devhmo = str_replace('k','ᵏ',$devhmo);
$devhmo = str_replace('K','ᵏ',$devhmo);
$devhmo = str_replace('l','ˡ',$devhmo);
$devhmo = str_replace('L','ˡ',$devhmo);
$devhmo = str_replace('m','ᵐ',$devhmo);
$devhmo = str_replace('M','ᵐ',$devhmo);
$devhmo = str_replace('n','ᶰ',$devhmo);
$devhmo = str_replace('N','ᶰ',$devhmo);
$devhmo = str_replace('o','ᵒ',$devhmo);
$devhmo = str_replace('O','ᵒ',$devhmo);
$devhmo = str_replace('p','ᵖ',$devhmo);
$devhmo = str_replace('P','ᵖ',$devhmo);
$devhmo = str_replace('q','ᵠ',$devhmo);
$devhmo = str_replace('Q','ᵠ',$devhmo);
$devhmo = str_replace('r','ʳ',$devhmo);
$devhmo = str_replace('R','ʳ',$devhmo);
$devhmo = str_replace('s','ˢ',$devhmo);
$devhmo = str_replace('S','ˢ',$devhmo);
$devhmo = str_replace('t','ᵗ',$devhmo);
$devhmo = str_replace('T','ᵗ',$devhmo);
$devhmo = str_replace('u','ᵘ',$devhmo);
$devhmo = str_replace('U','ᵘ',$devhmo);
$devhmo = str_replace('v','ᵛ',$devhmo);
$devhmo = str_replace('V','ᵛ',$devhmo);
$devhmo = str_replace('w','ʷ',$devhmo);
$devhmo = str_replace('W','ʷ',$devhmo);
$devhmo = str_replace('x','ˣ',$devhmo);
$devhmo = str_replace('X','ˣ',$devhmo);
$devhmo = str_replace('y','ʸ',$devhmo);
$devhmo = str_replace('Y','ʸ',$devhmo);
$devhmo = str_replace('z','ᶻ',$devhmo);
$devhmo = str_replace('Z','ᶻ',$devhmo);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo1 = str_replace('a', 'ᴀ', $text);
$devhmo1 = str_replace('b', 'ʙ', $devhmo1);
$devhmo1 = str_replace('c', 'ᴄ', $devhmo1);
$devhmo1 = str_replace('d', 'ᴅ', $devhmo1);
$devhmo1 = str_replace('e', 'ᴇ', $devhmo1);
$devhmo1 = str_replace('f', 'ᴈ', $devhmo1);
$devhmo1 = str_replace('g', 'ɢ', $devhmo1);
$devhmo1 = str_replace('h', 'ʜ', $devhmo1);
$devhmo1 = str_replace('i', 'ɪ', $devhmo1);
$devhmo1 = str_replace('j', 'ᴊ', $devhmo1);
$devhmo1 = str_replace('k', 'ᴋ', $devhmo1);
$devhmo1 = str_replace('l', 'ʟ', $devhmo1);
$devhmo1 = str_replace('m', 'ᴍ', $devhmo1);
$devhmo1 = str_replace('n', 'ɴ', $devhmo1);
$devhmo1 = str_replace('o', 'ᴏ', $devhmo1);
$devhmo1 = str_replace('p', 'ᴘ', $devhmo1);
$devhmo1 = str_replace('q', 'ᴓ', $devhmo1);
$devhmo1 = str_replace('r', 'ʀ', $devhmo1);
$devhmo1 = str_replace('s', 'ᴤ', $devhmo1);
$devhmo1 = str_replace('t', 'ᴛ', $devhmo1);
$devhmo1 = str_replace('u', 'ᴜ', $devhmo1);
$devhmo1 = str_replace('v', 'ᴠ', $devhmo1);
$devhmo1 = str_replace('w', 'ᴡ', $devhmo1);
$devhmo1 = str_replace('x', 'ᴥ', $devhmo1);
$devhmo1 = str_replace('y', 'ʏ', $devhmo1);
$devhmo1 = str_replace('z', 'ᴢ', $devhmo1);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo1.'* ',
'parse_mode'=>'MarkDown',
]); 
$devhmo2 = str_replace('a','α',$text);
$devhmo2 = str_replace("b","в",$devhmo2);
$devhmo2 = str_replace("c","c",$devhmo2);
$devhmo2 = str_replace("d","∂",$devhmo2);
$devhmo2 = str_replace("e","ε",$devhmo2);
$devhmo2 = str_replace("E","ғ",$devhmo2);
$devhmo2 = str_replace("g","g",$devhmo2);
$devhmo2 = str_replace("h","н",$devhmo2);
$devhmo2 = str_replace("i","ι",$devhmo2);
$devhmo2 = str_replace("j","נ",$devhmo2);
$devhmo2 = str_replace("k","к",$devhmo2);
$devhmo2 = str_replace("l","ℓ",$devhmo2);
$devhmo2 = str_replace("m","м",$devhmo2);
$devhmo2 = str_replace("n","η",$devhmo2);
$devhmo2 = str_replace("o","σ",$devhmo2);
$devhmo2 = str_replace("p","ρ",$devhmo2);
$devhmo2 = str_replace("q","q",$devhmo2);
$devhmo2 = str_replace("r","я",$devhmo2);
$devhmo2 = str_replace("s","s",$devhmo2);
$devhmo2 = str_replace("t","т",$devhmo2);
$devhmo2 = str_replace("u","υ",$devhmo2);
$devhmo2 = str_replace("v","v",$devhmo2);
$devhmo2 = str_replace("w","ω",$devhmo2);
$devhmo2 = str_replace("x","x",$devhmo2);
$devhmo2 = str_replace("y","ү",$devhmo2);
$devhmo2 = str_replace("z","z",$devhmo2);
Bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo2.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo3 = str_replace('a','𝙰',$text); 
 $devhmo3 = str_replace('b','𝙱',$devhmo3); 
 $devhmo3 = str_replace('c','𝙲',$devhmo3); 
 $devhmo3 = str_replace('d','𝙳',$devhmo3); 
 $devhmo3 = str_replace('e','𝙴',$devhmo3); 
 $devhmo3 = str_replace('f','𝙵',$devhmo3); 
 $devhmo3 = str_replace('g','𝙶',$devhmo3); 
 $devhmo3 = str_replace('h','𝙷',$devhmo3); 
 $devhmo3 = str_replace('i','𝙸',$devhmo3); 
 $devhmo3 = str_replace('j','??',$devhmo3); 
 $devhmo3 = str_replace('k','𝙺',$devhmo3); 
 $devhmo3 = str_replace('l','𝙻',$devhmo3); 
 $devhmo3 = str_replace('m','𝙼',$devhmo3); 
 $devhmo3 = str_replace('n','𝙽',$devhmo3); 
 $devhmo3 = str_replace('o','𝙾',$devhmo3); 
 $devhmo3 = str_replace('p','𝙿',$devhmo3); 
 $devhmo3 = str_replace('q','𝚀',$devhmo3); 
 $devhmo3 = str_replace('r','𝚁',$devhmo3); 
 $devhmo3 = str_replace('s','𝚂',$devhmo3); 
 $devhmo3 = str_replace('t','𝚃',$devhmo3); 
 $devhmo3 = str_replace('u','𝚄',$devhmo3); 
 $devhmo3 = str_replace('v','𝚅',$devhmo3); 
 $devhmo3 = str_replace('w','𝚆',$devhmo3); 
 $devhmo3 = str_replace('x','𝚇',$devhmo3); 
 $devhmo3 = str_replace('y','𝚈',$devhmo3); 
 $devhmo3 = str_replace('z','𝚉',$devhmo3);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo3.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo4 = str_replace('a','𝖆',$text); 
 $devhmo4 = str_replace('b','𝖇',$devhmo4); 
 $devhmo4 = str_replace('c','𝖈',$devhmo4); 
 $devhmo4 = str_replace('d','𝖉',$devhmo4); 
 $devhmo4 = str_replace('e','𝖊',$devhmo4); 
 $devhmo4 = str_replace('f','𝖋',$devhmo4); 
 $devhmo4 = str_replace('g','𝖌',$devhmo4); 
 $devhmo4 = str_replace('h','𝖍',$devhmo4); 
 $devhmo4 = str_replace('i','𝖎',$devhmo4); 
 $devhmo4 = str_replace('j','𝖏',$devhmo4); 
 $devhmo4 = str_replace('k','𝖐',$devhmo4); 
 $devhmo4 = str_replace('l','𝖑',$devhmo4); 
 $devhmo4 = str_replace('m','𝖒',$devhmo4); 
 $devhmo4 = str_replace('n','𝖓',$devhmo4); 
 $devhmo4 = str_replace('o','𝖔',$devhmo4); 
 $devhmo4 = str_replace('p','𝖕',$devhmo4); 
 $devhmo4 = str_replace('q','𝖖',$devhmo4); 
 $devhmo4 = str_replace('r','𝖗',$devhmo4); 
 $devhmo4 = str_replace('s','𝖘',$devhmo4); 
 $devhmo4 = str_replace('t','𝖙',$devhmo4); 
 $devhmo4 = str_replace('u','𝖚',$devhmo4); 
 $devhmo4 = str_replace('v','𝖛',$devhmo4); 
 $devhmo4 = str_replace('w','𝖜',$devhmo4); 
 $devhmo4 = str_replace('x','𝖝',$devhmo4); 
 $devhmo4 = str_replace('y','𝖞',$devhmo4); 
 $devhmo4 = str_replace('z','𝖟',$devhmo4);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo4.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo5 = str_replace('a','𝔸',$text);
$devhmo5 = str_replace("b","𝔹",$devhmo5);
$devhmo5 = str_replace("c","ℂ",$devhmo5);
$devhmo5 = str_replace("d","𝔻",$devhmo5);
$devhmo5 = str_replace("e","𝔼",$devhmo5);
$devhmo5 = str_replace("E","𝔽",$devhmo5);
$devhmo5 = str_replace("g","𝔾",$devhmo5);
$devhmo5 = str_replace("h","ℍ",$devhmo5);
$devhmo5 = str_replace("i","𝕀",$devhmo5);
$devhmo5 = str_replace("j","𝕁",$devhmo5);
$devhmo5 = str_replace("k","𝕂",$devhmo5);
$devhmo5 = str_replace("l","𝕃",$devhmo5);
$devhmo5 = str_replace("m","𝕄",$devhmo5);
$devhmo5 = str_replace("n","ℕ",$devhmo5);
$devhmo5 = str_replace("o","𝕆",$devhmo5);
$devhmo5 = str_replace("p","ℙ",$devhmo5);
$devhmo5 = str_replace("q","ℚ",$devhmo5);
$devhmo5 = str_replace("r","ℝ",$devhmo5);
$devhmo5 = str_replace("s","𝕊",$devhmo5);
$devhmo5 = str_replace("t","𝕋",$devhmo5);
$devhmo5 = str_replace("u","𝕌",$devhmo5);
$devhmo5 = str_replace("v","𝕍",$devhmo5);
$devhmo5 = str_replace("w","𝕎",$devhmo5);
$devhmo5 = str_replace("x","𝕏",$devhmo5);
$devhmo5 = str_replace("y","Ý",$devhmo5);
$devhmo5 = str_replace("z","ℤ",$devhmo5);
 Bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo5.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo6 = str_replace('a','𝐀',$text);
$devhmo6 = str_replace("b","𝐁",$devhmo6);
$devhmo6 = str_replace("c","𝐂",$devhmo6);
$devhmo6 = str_replace("d","𝐃",$devhmo6);
$devhmo6 = str_replace("e","𝐄",$devhmo6);
$devhmo6 = str_replace("E","𝐅",$devhmo6);
$devhmo6 = str_replace("g","𝐆",$devhmo6);
$devhmo6 = str_replace("h","𝐇",$devhmo6);
$devhmo6 = str_replace("i","𝐈",$devhmo6);
$devhmo6 = str_replace("j","𝐉",$devhmo6);
$devhmo6 = str_replace("k","𝐊",$devhmo6);
$devhmo6 = str_replace("l","𝑳",$devhmo6);
$devhmo6 = str_replace("m","𝐌",$devhmo6);
$devhmo6 = str_replace("n","𝐍",$devhmo6);
$devhmo6 = str_replace("o","𝐎",$devhmo6);
$devhmo6 = str_replace("p","𝐏",$devhmo6);
$devhmo6 = str_replace("q","𝐐",$devhmo6);
$devhmo6 = str_replace("r","𝐑",$devhmo6);
$devhmo6 = str_replace("s","𝐒",$devhmo6);
$devhmo6 = str_replace("t","𝐓",$devhmo6);
$devhmo6 = str_replace("u","𝐔",$devhmo6);
$devhmo6 = str_replace("v","𝐕",$devhmo6);
$devhmo6 = str_replace("w","𝐖",$devhmo6);
$devhmo6 = str_replace("x","𝐗",$devhmo6);
$devhmo6 = str_replace("y","𝐘",$devhmo6);
$devhmo6 = str_replace("z","𝐙",$devhmo6);
 Bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo6.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo7 = str_replace('a','𝘢',$text); 
 $devhmo7 = str_replace('b','𝘣',$devhmo7); 
 $devhmo7 = str_replace('c','𝘤',$devhmo7); 
 $devhmo7 = str_replace('d','𝘥',$devhmo7); 
 $devhmo7 = str_replace('e','𝘦',$devhmo7); 
 $devhmo7 = str_replace('f','𝘧',$devhmo7); 
 $devhmo7 = str_replace('g','𝘨',$devhmo7); 
 $devhmo7 = str_replace('h','𝘩',$devhmo7); 
 $devhmo7 = str_replace('i','𝘪',$devhmo7); 
 $devhmo7 = str_replace('j','𝘫',$devhmo7); 
 $devhmo7 = str_replace('k','𝘬',$devhmo7); 
 $devhmo7 = str_replace('l','𝘭',$devhmo7); 
 $devhmo7 = str_replace('m','𝘮',$devhmo7); 
 $devhmo7 = str_replace('n','𝘯',$devhmo7); 
 $devhmo7 = str_replace('o','𝘰',$devhmo7); 
 $devhmo7 = str_replace('p','𝘱',$devhmo7); 
 $devhmo7 = str_replace('q','𝘲',$devhmo7); 
 $devhmo7 = str_replace('r','𝘳',$devhmo7); 
 $devhmo7 = str_replace('s','𝘴',$devhmo7); 
 $devhmo7 = str_replace('t','𝘵',$devhmo7); 
 $devhmo7 = str_replace('u','𝘶',$devhmo7); 
 $devhmo7 = str_replace('v','𝘷',$devhmo7); 
 $devhmo7 = str_replace('w','𝘸',$devhmo7); 
 $devhmo7 = str_replace('x','𝘹',$devhmo7); 
 $devhmo7 = str_replace('y','𝘺',$devhmo7); 
 $devhmo7 = str_replace('z','𝘻',$devhmo7);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo7.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo8 = str_replace('a','𝒂',$text); 
 $devhmo8 = str_replace('b','𝒃',$devhmo8); 
 $devhmo8 = str_replace('c','𝒄',$devhmo8); 
 $devhmo8 = str_replace('d','𝒅',$devhmo8); 
 $devhmo8 = str_replace('e','𝒆',$devhmo8); 
 $devhmo8 = str_replace('f','𝒇',$devhmo8); 
 $devhmo8 = str_replace('g','𝒈',$devhmo8); 
 $devhmo8 = str_replace('h','𝒉',$devhmo8); 
 $devhmo8 = str_replace('i','𝒊',$devhmo8); 
 $devhmo8 = str_replace('j','𝒋',$devhmo8); 
 $devhmo8 = str_replace('k','𝒌',$devhmo8); 
 $devhmo8 = str_replace('l','𝒍',$devhmo8); 
 $devhmo8 = str_replace('m','𝒎',$devhmo8); 
 $devhmo8 = str_replace('n','𝒏',$devhmo8); 
 $devhmo8 = str_replace('o','𝒐',$devhmo8); 
 $devhmo8 = str_replace('p','𝒑',$devhmo8); 
 $devhmo8 = str_replace('q','𝒒',$devhmo8); 
 $devhmo8 = str_replace('r','𝒓',$devhmo8); 
 $devhmo8 = str_replace('s','𝒔',$devhmo8); 
 $devhmo8 = str_replace('t','𝒕',$devhmo8); 
 $devhmo8 = str_replace('u','𝒖',$devhmo8); 
 $devhmo8 = str_replace('v','𝒗',$devhmo8); 
 $devhmo8 = str_replace('w','𝒘',$devhmo8); 
 $devhmo8 = str_replace('x','𝒙',$devhmo8); 
 $devhmo8 = str_replace('y','𝒚',$devhmo8); 
 $devhmo8 = str_replace('z','𝒛',$devhmo8);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo8.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo9 = str_replace('a','𝑎',$text); 
 $devhmo9 = str_replace('b','𝑏',$devhmo9); 
 $devhmo9 = str_replace('c','𝑐',$devhmo9); 
 $devhmo9 = str_replace('d','𝑑',$devhmo9); 
 $devhmo9 = str_replace('e','𝑒',$devhmo9); 
 $devhmo9 = str_replace('f','𝑓',$devhmo9); 
 $devhmo9 = str_replace('g','𝑔',$devhmo9); 
 $devhmo9 = str_replace('h','ℎ',$devhmo9); 
 $devhmo9 = str_replace('i','𝑖',$devhmo9); 
 $devhmo9 = str_replace('j','𝑗',$devhmo9); 
 $devhmo9 = str_replace('k','𝑘',$devhmo9); 
 $devhmo9 = str_replace('l','𝑙',$devhmo9); 
 $devhmo9 = str_replace('m','𝑚',$devhmo9); 
 $devhmo9 = str_replace('n','𝑛',$devhmo9); 
 $devhmo9 = str_replace('o','𝑜',$devhmo9); 
 $devhmo9 = str_replace('p','𝑝',$devhmo9); 
 $devhmo9 = str_replace('q','𝑞',$devhmo9); 
 $devhmo9 = str_replace('r','𝑟',$devhmo9); 
 $devhmo9 = str_replace('s','𝑠',$devhmo9); 
 $devhmo9 = str_replace('t','𝑡',$devhmo9); 
 $devhmo9 = str_replace('u','𝑢',$devhmo9); 
 $devhmo9 = str_replace('v','𝑣',$devhmo9); 
 $devhmo9 = str_replace('w','𝑤',$devhmo9); 
 $devhmo9 = str_replace('x','𝑥',$devhmo9); 
 $devhmo9 = str_replace('y','𝑦',$devhmo9); 
 $devhmo9 = str_replace('z','𝑧',$devhmo9);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo9.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo10 = str_replace('a','𝕒',$text); 
 $devhmo10 = str_replace('b','𝕓',$devhmo10); 
 $devhmo10 = str_replace('c','𝕔',$devhmo10); 
 $devhmo10 = str_replace('d','𝕕',$devhmo10); 
 $devhmo10 = str_replace('e','𝕖',$devhmo10); 
 $devhmo10 = str_replace('f','𝕗',$devhmo10); 
 $devhmo10 = str_replace('g','𝕘',$devhmo10); 
 $devhmo10 = str_replace('h','𝕙',$devhmo10); 
 $devhmo10 = str_replace('i','𝕚',$devhmo10); 
 $devhmo10 = str_replace('j','𝕛',$devhmo10); 
 $devhmo10 = str_replace('k','𝕜',$devhmo10); 
 $devhmo10 = str_replace('l','𝕝',$devhmo10); 
 $devhmo10 = str_replace('m','𝕞',$devhmo10); 
 $devhmo10 = str_replace('n','𝕟',$devhmo10); 
 $devhmo10 = str_replace('o','𝕠',$devhmo10); 
 $devhmo10 = str_replace('p','𝕡',$devhmo10); 
 $devhmo10 = str_replace('q','𝕢',$devhmo10); 
 $devhmo10 = str_replace('r','𝕣',$devhmo10); 
 $devhmo10 = str_replace('s','𝕤',$devhmo10); 
 $devhmo10 = str_replace('t','𝕥',$devhmo10); 
 $devhmo10 = str_replace('u','𝕦',$devhmo10); 
 $devhmo10 = str_replace('v','𝕧',$devhmo10); 
 $devhmo10 = str_replace('w','𝕨',$devhmo10); 
 $devhmo10 = str_replace('x','𝕩',$devhmo10); 
 $devhmo10 = str_replace('y','𝕪',$devhmo10); 
 $devhmo10 = str_replace('z','𝕫',$devhmo10);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*'.$devhmo10.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo11 = str_replace('a','𝗔',$text);
$devhmo11 = str_replace('b','𝗕',$devhmo11);
$devhmo11 = str_replace('c','𝗖',$devhmo11);
$devhmo11 = str_replace('d','𝗗',$devhmo11);
$devhmo11 = str_replace('e','𝗘',$devhmo11);
$devhmo11 = str_replace('f','f',$devhmo11);
$devhmo11 = str_replace('g','𝗚',$devhmo11);
$devhmo11 = str_replace('h','𝗛',$devhmo11);
$devhmo11 = str_replace('i','𝗜',$devhmo11);
$devhmo11 = str_replace('j','𝗝',$devhmo11);
$devhmo11 = str_replace('k','𝗞',$devhmo11);
$devhmo11 = str_replace('l','𝗟',$devhmo11);
$devhmo11 = str_replace('m','𝗠',$devhmo11);
$devhmo11 = str_replace('n','𝗡',$devhmo11);
$devhmo11 = str_replace('o','𝗢',$devhmo11);
$devhmo11 = str_replace('p','𝗣',$devhmo11);
$devhmo11 = str_replace('q','𝗤',$devhmo11);
$devhmo11 = str_replace('r','𝗥',$devhmo11);
$devhmo11 = str_replace('s','𝗦',$devhmo11);
$devhmo11 = str_replace('t','𝗧',$devhmo11);
$devhmo11 = str_replace('u','𝗨',$devhmo11);
$devhmo11 = str_replace('v','𝗩',$devhmo11);
$devhmo11 = str_replace('w','𝗪',$devhmo11);
$devhmo11 = str_replace('x','𝗫',$devhmo11);
$devhmo11 = str_replace('y','𝗬',$devhmo11);
$devhmo11 = str_replace('z','𝗭',$devhmo11);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo11.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo13 = str_replace('a','ᗩ',$text);
$devhmo13 = str_replace('b','ᗷ',$devhmo13);
$devhmo13 = str_replace('c','ᑕ',$devhmo13);
$devhmo13 = str_replace('d','ᗞ',$devhmo13);
$devhmo13 = str_replace('e','ᗴ',$devhmo13);
$devhmo13 = str_replace('f','ᖴ',$devhmo13);
$devhmo13 = str_replace('g','Ꮐ',$devhmo13);
$devhmo13 = str_replace('h','ᕼ',$devhmo13);
$devhmo13 = str_replace('i','Ꮖ',$devhmo13);
$devhmo13 = str_replace('j','ᒍ',$devhmo13);
$devhmo13 = str_replace('k','Ꮶ',$devhmo13);
$devhmo13 = str_replace('l','し',$devhmo13);
$devhmo13 = str_replace('m','ᗰ',$devhmo13);
$devhmo13 = str_replace('n','ᑎ',$devhmo13);
$devhmo13 = str_replace('o','ᝪ',$devhmo13);
$devhmo13 = str_replace('p','ᑭ',$devhmo13);
$devhmo13 = str_replace('q','ᑫ',$devhmo13);
$devhmo13 = str_replace('r','ᖇ',$devhmo13);
$devhmo13 = str_replace('s','ᔑ',$devhmo13);
$devhmo13 = str_replace('t','Ꭲ',$devhmo13);
$devhmo13 = str_replace('u','ᑌ',$devhmo13);
$devhmo13 = str_replace('v','ᐯ',$devhmo13);
$devhmo13 = str_replace('w','ᗯ',$devhmo13);
$devhmo13 = str_replace('x','᙭',$devhmo13);
$devhmo13 = str_replace('y','Ꭹ',$devhmo13);
$devhmo13 = str_replace('z','Ꮓ',$devhmo13);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo13.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo14 = str_replace('a','Ａ',$text);
$devhmo14 = str_replace('b','Ｂ',$devhmo14);
$devhmo14 = str_replace('c','Ｃ',$devhmo14);
$devhmo14 = str_replace('d','Ｄ',$devhmo14);
$devhmo14 = str_replace('e','Ｅ',$devhmo14);
$devhmo14 = str_replace('f','Ｆ',$devhmo14);
$devhmo14 = str_replace('g','Ｇ',$devhmo14);
$devhmo14 = str_replace('h','Ｈ',$devhmo14);
$devhmo14 = str_replace('i','Ｉ',$devhmo14);
$devhmo14 = str_replace('j','Ｊ',$devhmo14);
$devhmo14 = str_replace('k','Ｋ',$devhmo14);
$devhmo14 = str_replace('l','Ｌ',$devhmo14);
$devhmo14 = str_replace('m','Ｍ',$devhmo14);
$devhmo14 = str_replace('n','Ｎ',$devhmo14);
$devhmo14 = str_replace('o','Ｏ',$devhmo14);
$devhmo14 = str_replace('p','Ｐ',$devhmo14);
$devhmo14 = str_replace('q','Ｑ',$devhmo14);
$devhmo14 = str_replace('r','Ｒ',$devhmo14);
$devhmo14 = str_replace('s','Ｓ',$devhmo14);
$devhmo14 = str_replace('t','Ｔ',$devhmo14);
$devhmo14 = str_replace('u','Ｕ',$devhmo14);
$devhmo14 = str_replace('v','Ｖ',$devhmo14);
$devhmo14 = str_replace('w','Ｗ',$devhmo14);
$devhmo14 = str_replace('x','Ｘ',$devhmo14);
$devhmo14 = str_replace('y','Ｙ',$devhmo14);
$devhmo14 = str_replace('z','Ｚ',$devhmo14);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo14.'* ',
'parse_mode'=>'MarkDown',
]);

$items = ['𝄮' , '𝄵' , '??' , 'ま' , '†' , '⁦♡⁩' , '⁦˖꒰' , '⁦ਊ' , '❥' , '⁦㉨' , '𝆹𝅥𝅮' , '𝄬' , '𝄋' , '𖤍' , '𖠛' , ' 𝅘𝅥𝅮' , '⁦♬⁩' , '⁦⁦ㇱ' , '𝅘𝅥𝅯' , 'メ', '〠' , '〄' , '⩫' , '༄︎' , '᯾︎' , '۞︎' , '𓃟︎' , '𓃒︎' , '𓃠︎' , '𐂃︎' , '𐂂︎' , '𓃗︎' , '𖢣' , '𒍧' , '𒍦' , '𓏵' , '𐂠' , '𐇪' , '𓆦' , '??' , '𓂀' , '𓆃' , '𓂐' , 'ᝰ͎', '𓃼' , '𓅻' , '𓀎' , '𓉀' , '#1🇮🇶' , '☬' , '༼༽' , '༆' , '༅', '༄' , '༇' , '༈༉' , '༊ ' , '༗' , '࿌' , '࿋' , '࿊' , '࿉' , '࿈' , '࿖' , '࿕' , '࿓' , '࿑' , '࿐' , '࿗࿘', '࿇࿆ ' , '༺' , '༻' , '༢༣' ,]; 
$_smile = array_rand($items,1);
$smile = $items[$_smile];
$count = count($text);
$devhmo15 = str_replace('a','ᴀ',$text);
$devhmo15 = str_replace('b','ʙ',$devhmo15);
$devhmo15 = str_replace('c','ᴄ',$devhmo15);
$devhmo15 = str_replace('d','ᴅ',$devhmo15);
$devhmo15 = str_replace('e','ᴇ',$devhmo15);
$devhmo15 = str_replace('f','ꜰ',$devhmo15);
$devhmo15 = str_replace('g','ɢ',$devhmo15);
$devhmo15 = str_replace('h','ʜ',$devhmo15);
$devhmo15 = str_replace('i','ɪ',$devhmo15);
$devhmo15 = str_replace('j','ᴊ',$devhmo15);
$devhmo15 = str_replace('k','ᴋ',$devhmo15);
$devhmo15 = str_replace('l','ʟ',$devhmo15);
$devhmo15 = str_replace('m','ᴍ',$devhmo15);
$devhmo15 = str_replace('n','ɴ',$devhmo15);
$devhmo15 = str_replace('o','ᴏ',$devhmo15);
$devhmo15 = str_replace('p','ᴩ',$devhmo15);
$devhmo15 = str_replace('q','Q',$devhmo15);
$devhmo15 = str_replace('r','ʀ',$devhmo15);
$devhmo15 = str_replace('s','ꜱ',$devhmo15);
$devhmo15 = str_replace('t','ᴛ',$devhmo15);
$devhmo15 = str_replace('u','ᴜ',$devhmo15);
$devhmo15 = str_replace('v','ᴠ',$devhmo15);
$devhmo15 = str_replace('w','ᴡ',$devhmo15);
$devhmo15 = str_replace('x','x',$devhmo15);
$devhmo15 = str_replace('y','Y',$devhmo15);
$devhmo15 = str_replace('z','ᴢ',$devhmo15);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo15.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo16 = str_replace('a','ᴬ',$text);
$devhmo16 = str_replace('b','ᴮ',$devhmo16);
$devhmo16 = str_replace('c','ᶜ',$devhmo16);
$devhmo16 = str_replace('d','ᴰ',$devhmo16);
$devhmo16 = str_replace('e','ᴱ',$devhmo16);
$devhmo16 = str_replace('f','ᶠ',$devhmo16);
$devhmo16 = str_replace('g','ᴳ',$devhmo16);
$devhmo16 = str_replace('h','ᴴ',$devhmo16);
$devhmo16 = str_replace('i','ᴵ',$devhmo16);
$devhmo16 = str_replace('j','ᴶ',$devhmo16);
$devhmo16 = str_replace('k','ᴷ',$devhmo16);
$devhmo16 = str_replace('l','ᴸ',$devhmo16);
$devhmo16 = str_replace('m','ᴹ',$devhmo16);
$devhmo16 = str_replace('n','ᴺ',$devhmo16);
$devhmo16 = str_replace('o','ᴼ',$devhmo16);
$devhmo16 = str_replace('p','ᴾ',$devhmo16);
$devhmo16 = str_replace('q','Q',$devhmo16);
$devhmo16 = str_replace('r','ᴿ',$devhmo16);
$devhmo16 = str_replace('s','ˢ',$devhmo16);
$devhmo16 = str_replace('t','ᵀ',$devhmo16);
$devhmo16 = str_replace('u','ᵁ',$devhmo16);
$devhmo16 = str_replace('v','ⱽ',$devhmo16);
$devhmo16 = str_replace('w','ᵂ',$devhmo16);
$devhmo16 = str_replace('x','ˣ',$devhmo16);
$devhmo16 = str_replace('y','ʸ',$devhmo16);
$devhmo16 = str_replace('z','ᶻ',$devhmo16);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo16.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo17 = str_replace('a','𝐀',$text);
$devhmo17 = str_replace('b','𝐁',$devhmo17);
$devhmo17 = str_replace('c','𝐂',$devhmo17);
$devhmo17 = str_replace('d','𝐃',$devhmo17);
$devhmo17 = str_replace('e','𝐄',$devhmo17);
$devhmo17 = str_replace('f','𝐅',$devhmo17);
$devhmo17 = str_replace('g','𝐆',$devhmo17);
$devhmo17 = str_replace('h','𝐇',$devhmo17);
$devhmo17 = str_replace('i','𝐈',$devhmo17);
$devhmo17 = str_replace('j','𝐉',$devhmo17);
$devhmo17 = str_replace('k','𝐊',$devhmo17);
$devhmo17 = str_replace('l','𝐋',$devhmo17);
$devhmo17 = str_replace('m','𝐌',$devhmo17);
$devhmo17 = str_replace('n','𝐍',$devhmo17);
$devhmo17 = str_replace('o','𝐎',$devhmo17);
$devhmo17 = str_replace('p','𝐏',$devhmo17);
$devhmo17 = str_replace('q','𝐐',$devhmo17);
$devhmo17 = str_replace('r','𝐑',$devhmo17);
$devhmo17 = str_replace('s','𝐒',$devhmo17);
$devhmo17 = str_replace('t','𝐓',$devhmo17);
$devhmo17 = str_replace('u','𝐔',$devhmo17);
$devhmo17 = str_replace('v','𝐕',$devhmo17);
$devhmo17 = str_replace('w','𝐖',$devhmo17);
$devhmo17 = str_replace('x','𝐗',$devhmo17);
$devhmo17 = str_replace('y','𝐘',$devhmo17);
$devhmo17 = str_replace('z','𝐙',$devhmo17);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo17.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo18 = str_replace('a','ᗩ',$text);
$devhmo18 = str_replace('b','ᗷ',$devhmo18);
$devhmo18 = str_replace('c','ᑕ',$devhmo18);
$devhmo18 = str_replace('d','ᗪ',$devhmo18);
$devhmo18 = str_replace('e','ᗴ',$devhmo18);
$devhmo18 = str_replace('f','ᖴ',$devhmo18);
$devhmo18 = str_replace('g','Ǥ',$devhmo18);
$devhmo18 = str_replace('h','ᕼ',$devhmo18);
$devhmo18 = str_replace('i','Ꭵ',$devhmo18);
$devhmo18 = str_replace('j','ᒎ',$devhmo18);
$devhmo18 = str_replace('k','ᛕ',$devhmo18);
$devhmo18 = str_replace('l','ᒪ',$devhmo18);
$devhmo18 = str_replace('m','ᗰ',$devhmo18);
$devhmo18 = str_replace('n','ᑎ',$devhmo18);
$devhmo18 = str_replace('o','ᗝ',$devhmo18);
$devhmo18 = str_replace('p','ᑭ',$devhmo18);
$devhmo18 = str_replace('q','Ɋ',$devhmo18);
$devhmo18 = str_replace('r','ᖇ',$devhmo18);
$devhmo18 = str_replace('s','Տ',$devhmo18);
$devhmo18 = str_replace('t','丅',$devhmo18);
$devhmo18 = str_replace('u','ᑌ',$devhmo18);
$devhmo18 = str_replace('v','ᐯ',$devhmo18);
$devhmo18 = str_replace('w','ᗯ',$devhmo18);
$devhmo18 = str_replace('x','᙭',$devhmo18);
$devhmo18 = str_replace('y','Ƴ',$devhmo18);
$devhmo18 = str_replace('z','乙',$devhmo18);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo18.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo19 = str_replace('a','A̶',$text);
$devhmo19 = str_replace('b','B̶',$devhmo19);
$devhmo19 = str_replace('c','C̶',$devhmo19);
$devhmo19 = str_replace('d','D̶',$devhmo19);
$devhmo19 = str_replace('e','E̶',$devhmo19);
$devhmo19 = str_replace('f','F̶',$devhmo19);
$devhmo19 = str_replace('g','G̶',$devhmo19);
$devhmo19 = str_replace('h','H̶',$devhmo19);
$devhmo19 = str_replace('i','I̶',$devhmo19);
$devhmo19 = str_replace('j','J̶',$devhmo19);
$devhmo19 = str_replace('k','K̶',$devhmo19);
$devhmo19 = str_replace('l','L̶',$devhmo19);
$devhmo19 = str_replace('m','M̶',$devhmo19);
$devhmo19 = str_replace('n','N̶',$devhmo19);
$devhmo19 = str_replace('o','O̶',$devhmo19);
$devhmo19 = str_replace('p','P̶',$devhmo19);
$devhmo19 = str_replace('q','Q̶',$devhmo19);
$devhmo19 = str_replace('r','R̶',$devhmo19);
$devhmo19 = str_replace('s','S̶',$devhmo19);
$devhmo19 = str_replace('t','T̶',$devhmo19);
$devhmo19 = str_replace('u','U̶',$devhmo19);
$devhmo19 = str_replace('v','V̶',$devhmo19);
$devhmo19 = str_replace('w','W̶',$devhmo19);
$devhmo19 = str_replace('x','X̶',$devhmo19);
$devhmo19 = str_replace('y','Y̶',$devhmo19);
$devhmo19 = str_replace('z','Z̶',$devhmo19);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo19.'* ',
'parse_mode'=>'MarkDown',
]);


$devhmo20 = str_replace('a','ꪖ',$text);
$devhmo20 = str_replace('b','᥇',$devhmo20);
$devhmo20 = str_replace('c','ᥴ',$devhmo20);
$devhmo20 = str_replace('d','ᦔ',$devhmo20);
$devhmo20 = str_replace('e','ꫀ',$devhmo20);
$devhmo20 = str_replace('f','ᠻ',$devhmo20);
$devhmo20 = str_replace('g','ᧁ',$devhmo20);
$devhmo20 = str_replace('h','ꫝ',$devhmo20);
$devhmo20 = str_replace('i','𝓲',$devhmo20);
$devhmo20 = str_replace('j','𝓳',$devhmo20);
$devhmo20 = str_replace('k','𝘬',$devhmo20);
$devhmo20 = str_replace('l','ꪶ',$devhmo20);
$devhmo20 = str_replace('m','ꪑ',$devhmo20);
$devhmo20 = str_replace('n','ꪀ',$devhmo20);
$devhmo20 = str_replace('o','ꪮ',$devhmo20);
$devhmo20 = str_replace('p','ρ',$devhmo20);
$devhmo20 = str_replace('q','𝘲',$devhmo20);
$devhmo20 = str_replace('r','𝘳',$devhmo20);
$devhmo20 = str_replace('s','𝘴',$devhmo20);
$devhmo20 = str_replace('t','𝓽',$devhmo20);
$devhmo20 = str_replace('u','ꪊ',$devhmo20);
$devhmo20 = str_replace('v','ꪜ',$devhmo20);
$devhmo20 = str_replace('w','᭙',$devhmo20);
$devhmo20 = str_replace('x','᥊',$devhmo20);
$devhmo20 = str_replace('y','ꪗ',$devhmo20);
$devhmo20 = str_replace('z','ɀ',$devhmo20);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo20.'* ',
'parse_mode'=>'MarkDown',
]);

$devhmo20 = str_replace('a','ą',$text);
$devhmo20 = str_replace('b','ც',$devhmo20);
$devhmo20 = str_replace('c','ƈ',$devhmo20);
$devhmo20 = str_replace('d','ɖ',$devhmo20);
$devhmo20 = str_replace('e','ɛ',$devhmo20);
$devhmo20 = str_replace('f','ʄ',$devhmo20);
$devhmo20 = str_replace('g','ɠ',$devhmo20);
$devhmo20 = str_replace('h','ɧ',$devhmo20);
$devhmo20 = str_replace('i','ı',$devhmo20);
$devhmo20 = str_replace('j','ʝ',$devhmo20);
$devhmo20 = str_replace('k','ƙ',$devhmo20);
$devhmo20 = str_replace('l','Ɩ',$devhmo20);
$devhmo20 = str_replace('m','ɱ',$devhmo20);
$devhmo20 = str_replace('n','ŋ',$devhmo20);
$devhmo20 = str_replace('o','ơ',$devhmo20);
$devhmo20 = str_replace('p','℘',$devhmo20);
$devhmo20 = str_replace('q','զ',$devhmo20);
$devhmo20 = str_replace('r','r',$devhmo20);
$devhmo20 = str_replace('s','ʂ',$devhmo20);
$devhmo20 = str_replace('t','ɬ',$devhmo20);
$devhmo20 = str_replace('u','ų',$devhmo20);
$devhmo20 = str_replace('v','v',$devhmo20);
$devhmo20 = str_replace('w','ῳ',$devhmo20);
$devhmo20 = str_replace('x','ҳ',$devhmo20);
$devhmo20 = str_replace('y','ყ',$devhmo20);
$devhmo20 = str_replace('z','ʑ',$devhmo20);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo20.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo21 = str_replace('a', '[̲̅a̲̅]', $text);
$devhmo21 = str_replace('b', '[̲̅b̲̅]', $devhmo21);
$devhmo21 = str_replace('c', '[̲̅c̲̅]', $devhmo21);
$devhmo21 = str_replace('d', '[̲̅d̲̅]', $devhmo21);
$devhmo21 = str_replace('e', '[̲̅e̲̅]', $devhmo21);
$devhmo21 = str_replace('f', '[̲̅f̲̅]', $devhmo21);
$devhmo21 = str_replace('g', '[̲̅g̲̅]', $devhmo21);
$devhmo21 = str_replace('h', '[̲̅h̲̅]', $devhmo21);
$devhmo21 = str_replace('i', '[̲̅i̲̅]', $devhmo21);
$devhmo21 = str_replace('j', '[̲̅j̲̅]', $devhmo21);
$devhmo21 = str_replace('k', '[̲̅k̲̅]', $devhmo21);
$devhmo21 = str_replace('l', '[̲̅l̲̅]', $devhmo21);
$devhmo21 = str_replace('m', '[̲̅m̲̅]', $devhmo21);
$devhmo21 = str_replace('n', '[̲̅n̲̅]', $devhmo21);
$devhmo21 = str_replace('o', '[̲̅o̲̅]', $devhmo21);
$devhmo21 = str_replace('p', '[̲̅p̲̅]', $devhmo21);
$devhmo21 = str_replace('q', '[̲̅q̲̅]', $devhmo21);
$devhmo21 = str_replace('r', '[̲̅r̲̅]', $devhmo21);
$devhmo21 = str_replace('s', '[̲̅s̲̅]', $devhmo21);
$devhmo21 = str_replace('t', '[̲̅t̲̅]', $devhmo21);
$devhmo21 = str_replace('u', '[̲̅u̲̅]', $devhmo21);
$devhmo21 = str_replace('v', '[̲̅v̲̅]', $devhmo21);
$devhmo21 = str_replace('w', '[̲̅w̲̅]', $devhmo21);
$devhmo21 = str_replace('x', '[̲̅x̲̅]', $devhmo21);
$devhmo21 = str_replace('y', '[̲̅y̲̅]', $devhmo21);
$devhmo21 = str_replace('z', '[̲̅z̲̅]', $devhmo21);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo21.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo22 = str_replace('a','Δ',$text);
$devhmo22 = str_replace("b","β",$devhmo22);
$devhmo22 = str_replace("c","૮",$devhmo22);
$devhmo22 = str_replace("d","ᴅ",$devhmo22);
$devhmo22 = str_replace("e","૯",$devhmo22);
$devhmo22 = str_replace("f","ƒ",$devhmo22);
$devhmo22 = str_replace("g","ɢ",$devhmo22);
$devhmo22 = str_replace("h","み",$devhmo22);
$devhmo22 = str_replace("i","เ",$devhmo22);
$devhmo22 = str_replace("j","ʝ",$devhmo22);
$devhmo22 = str_replace("k","ҡ",$devhmo22);
$devhmo22 = str_replace("l","ɭ",$devhmo22);
$devhmo22 = str_replace("m","ണ",$devhmo22);
$devhmo22 = str_replace("n","ท",$devhmo22);
$devhmo22 = str_replace("o","๏",$devhmo22);
$devhmo22 = str_replace("p","ρ",$devhmo22);
$devhmo22 = str_replace("q","ǫ",$devhmo22);
$devhmo22 = str_replace("r","ʀ",$devhmo22);
$devhmo22 = str_replace("s","ઽ",$devhmo22);
$devhmo22 = str_replace("t","τ",$devhmo22);
$devhmo22 = str_replace("u","υ",$devhmo22);
$devhmo22 = str_replace("v","ѵ",$devhmo22);
$devhmo22 = str_replace("w","ω",$devhmo22);
$devhmo22 = str_replace("x","ﾒ",$devhmo22);
$devhmo22 = str_replace("y","ყ",$devhmo22);
$devhmo22 = str_replace("z","ʑ",$devhmo22);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo22.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo23 = str_replace('a','A꯭',$text);
$devhmo23 = str_replace("b","B꯭",$devhmo23);
$devhmo23 = str_replace("c","C꯭",$devhmo23);
$devhmo23 = str_replace("d","D꯭",$devhmo23);
$devhmo23 = str_replace("e","E꯭",$devhmo23);
$devhmo23 = str_replace("E","F꯭",$devhmo23);
$devhmo23 = str_replace("g","G꯭",$devhmo23);
$devhmo23 = str_replace("h","H꯭",$devhmo23);
$devhmo23 = str_replace("i","I꯭",$devhmo23);
$devhmo23 = str_replace("j","J꯭",$devhmo23);
$devhmo23 = str_replace("k","K꯭",$devhmo23);
$devhmo23 = str_replace("l","L꯭",$devhmo23);
$devhmo23 = str_replace("m","M꯭",$devhmo23);
$devhmo23 = str_replace("n","N꯭",$devhmo23);
$devhmo23 = str_replace("o","O꯭",$devhmo23);
$devhmo23 = str_replace("p","P꯭",$devhmo23);
$devhmo23 = str_replace("q","Q꯭",$devhmo23);
$devhmo23 = str_replace("r","R꯭",$devhmo23);
$devhmo23 = str_replace("s","S꯭",$devhmo23);
$devhmo23 = str_replace("t","T꯭",$devhmo23);
$devhmo23 = str_replace("u","U꯭",$devhmo23);
$devhmo23 = str_replace("v","V꯭",$devhmo23);
$devhmo23 = str_replace("w","W꯭",$devhmo23);
$devhmo23 = str_replace("x","X꯭",$devhmo23);
$devhmo23 = str_replace("y","Y꯭",$devhmo23);
$devhmo23 = str_replace("z","Z꯭",$devhmo23);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo23.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo24 = str_replace('a','ᕱ',$text);
$devhmo24 = str_replace("b","β",$devhmo24);
$devhmo24 = str_replace("c","૮",$devhmo24);
$devhmo24 = str_replace("d","Ɗ",$devhmo24);
$devhmo24 = str_replace("e","ξ",$devhmo24);
$devhmo24 = str_replace("f","ƒ",$devhmo24);
$devhmo24 = str_replace("g","Ǥ",$devhmo24);
$devhmo24 = str_replace("h","ƕ",$devhmo24);
$devhmo24 = str_replace("i","Ĩ",$devhmo24);
$devhmo24 = str_replace("j","ʝ",$devhmo24);
$devhmo24 = str_replace("k","Ƙ",$devhmo24);
$devhmo24 = str_replace("l","Ꮭ",$devhmo24);
$devhmo24 = str_replace("m","ണ",$devhmo24);
$devhmo24 = str_replace("n","ท",$devhmo24);
$devhmo24 = str_replace("o","♡",$devhmo24);
$devhmo24 = str_replace("p","Ƥ",$devhmo24);
$devhmo24 = str_replace("q","𝑄",$devhmo24);
$devhmo24 = str_replace("r","Ꮢ",$devhmo24);
$devhmo24 = str_replace("s","Ƨ",$devhmo24);
$devhmo24 = str_replace("t","Ƭ",$devhmo24);
$devhmo24 = str_replace("u","Ꮜ",$devhmo24);
$devhmo24 = str_replace("v","ѵ",$devhmo24);
$devhmo24 = str_replace("w","ẁ́̀́",$devhmo24);
$devhmo24 = str_replace("x","ﾒ",$devhmo24);
$devhmo24 = str_replace("y","ɣ",$devhmo24);
$devhmo24 = str_replace("z","ʑ",$devhmo24);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo24.'* ',
'parse_mode'=>'MarkDown',
]);
$devhmo26 = str_replace('a','ًٍَُِّA',$text);
$devhmo26 = str_replace("b","ًٍَُِّB",$devhmo26);
$devhmo26 = str_replace("c","ًٍَُِّC",$devhmo26);
$devhmo26 = str_replace("d","ًٍَُِّD",$devhmo26);
$devhmo26 = str_replace("e","ًٍَُِّE",$devhmo26);
$devhmo26 = str_replace("f","ًٍَُِّF",$devhmo26);
$devhmo26 = str_replace("g","ًٍَُِّG",$devhmo26);
$devhmo26 = str_replace("h","ًٍَُِّH",$devhmo26);
$devhmo26 = str_replace("i","ًٍَُِّI",$devhmo26);
$devhmo26 = str_replace("j","ًٍَُِّJ",$devhmo26);
$devhmo26 = str_replace("k","ًٍَُِّK",$devhmo26);
$devhmo26 = str_replace("l","ًٍَُِّL",$devhmo26);
$devhmo26 = str_replace("m","ًٍَُِّM",$devhmo26);
$devhmo26 = str_replace("n","ًٍَُِّN",$devhmo26);
$devhmo26 = str_replace("o","ًٍَُِّO",$devhmo26);
$devhmo26 = str_replace("p","ًٍَُِّP",$devhmo26);
$devhmo26 = str_replace("q","ًٍَُِّQ",$devhmo26);
$devhmo26 = str_replace("r","ًٍَُِّR",$devhmo26);
$devhmo26 = str_replace("s","ًٍَُِّS",$devhmo26);
$devhmo26 = str_replace("t","ًٍَُِّT",$devhmo26);
$devhmo26 = str_replace("u","ًٍَُِّU",$devhmo26);
$devhmo26 = str_replace("v","ًٍَُِّV",$devhmo26);
$devhmo26 = str_replace("w","ًٍَُِّW",$devhmo26);
$devhmo26 = str_replace("x","ًٍَُِّX",$devhmo26);
$devhmo26 = str_replace("y","ًٍَُِّY",$devhmo26);
$devhmo26 = str_replace("z","ًٍَُِّZ",$devhmo26);
Bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>'*'.$devhmo26.'* ',
'parse_mode'=>'MarkDown',
]);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*- تم انتهاء زخرفه اسمك '.$text,
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪجَۅعٰ : ›","callback_data"=>"back"]],
]])
]);
unset($zkrf["Bot"]["$from_id"]);
save($zkrf);
}
if($data == "0-9"){
Bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*- حسنا قم بأرسال ارقام .*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪجَۅعٰ : ›","callback_data"=>"back"]],
]])
]);
$zkrf["Bot"]["$from_id"] = "open 0-9";
save($zkrf);
}
if($zkrf["Bot"]["$from_id"] == "open 0-9" and preg_match('/([0-9])/',$text)){
$hmo = str_replace('0', '𝟎', $text);
$hmo = str_replace('1', '𝟏', $hmo);
$hmo = str_replace('2', '𝟐', $hmo);
$hmo = str_replace('3', '𝟑', $hmo);
$hmo = str_replace('4', '𝟒', $hmo);
$hmo = str_replace('5', '𝟓', $hmo);
$hmo = str_replace('6', '𝟔', $hmo);
$hmo = str_replace('7', '𝟕', $hmo);
$hmo = str_replace('8', '𝟖', $hmo);
$hmo = str_replace('9', '𝟗', $hmo);
Bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"*$hmo*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
]);
$hmo = str_replace('0', '𝟬', $text);
$hmo = str_replace('1', '𝟭', $hmo);
$hmo = str_replace('2', '𝟮', $hmo);
$hmo = str_replace('3', '𝟯', $hmo);
$hmo = str_replace('4', '𝟰', $hmo);
$hmo = str_replace('5', '𝟱', $hmo);
$hmo = str_replace('6', '𝟲', $hmo);
$hmo = str_replace('7', '𝟳', $hmo);
$hmo = str_replace('8', '𝟴', $hmo);
$hmo = str_replace('9', '', $hmo);
Bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"*$hmo*",
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
]);
Bot('sendMessage',[ 
'chat_id'=>$chat_id,
'text'=>'*- تم انتهاء زخرفه ارقام '.$text.' .',
"parse_mode"=>"Markdown",
"reply_to_message_id"=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"‹ : ࢪجَۅعٰ : ›","callback_data"=>"back"]],
]])
]);
unset($zkrf["Bot"]["$from_id"]);
save($zkrf);
}





