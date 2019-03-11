<?php

include("./Base62x.class.php");
include("./tools.function.php");

$s = Wht::get($_REQUEST, 'mystring');
$isenc = Wht::get($_REQUEST, 'isenc');


if($isenc == '1'){
	$enc = Base62x::encode($s);
	#print "s:[$s] enc:[$enc]";
	print $enc;
}
else{
	$dec = Base62x::decode($s);
	print $dec;
}


//- numbers

$sArr = array('100', '1000', '10000', '1000001', 'abc', 'abc123', 
	'ccbbaa1122ffa', 'a1122334eeeffb', '1a2b3c4d5e6f', 'aabbcc112233');

$ibase = 20;
foreach($sArr as $k=>$v){
	$enc = Base62x::encode($s=$v, $ibase);
	$dec = Base62x::decode($enc, $ibase);
	print "\nibase:$ibase $s enc:[".$enc."] dec:[$dec] eq:[".($s==$dec)."]";
}

$ibase = 16;
foreach($sArr as $k=>$v){
	$enc = Base62x::encode($s=$v, $ibase);
	$dec = Base62x::decode($enc, $ibase);
	print "\nibase:$ibase $s enc:[".$enc."] dec:[$dec] eq:[".($s==$dec)."]";
}
$ibase = 32;
foreach($sArr as $k=>$v){
	$enc = Base62x::encode($s=$v, $ibase);
	$dec = Base62x::decode($enc, $ibase);
	print "\nibase:$ibase $s enc:[".$enc."] dec:[$dec] eq:[".($s==$dec)."]";
}

//- strings

$s = "abcd1234";
$s2 = "abc中文123";
$s3 = "\"Tcler's Wiki: UTF-8 bit by bit (Revision 6)\". 2009-04-25. Retrieved 2009-05-22."
	."In orthodox UTF-8, a NUL byte (\\x00) is represented by a NUL byte. […] But […] we "
	."[…] want NUL bytes inside […] strings […] | ① ② ③ ④ ⑤ ⑥ ⑦ |  Ⅰ Ⅱ Ⅲ Ⅳ Ⅴ Ⅵ Ⅶ Ⅷ Ⅸ Ⅹ | "
	."!  # $ % & ' ( ) * + , - . /";

print "\n\n[$s] encoded:[".($s_enc=Base62x::encode($s))."]\n";
print "[$s_enc] decoded:[".($s_dec=Base62x::decode($s_enc))."] eq:[".($s==$s_dec)."]\n";

print "\n[$s2] encoded:[".($s2_enc=Base62x::encode($s2))."]\n";
print "[$s2_enc] decoded:[".($s2_dec=Base62x::decode($s2_enc))."] eq:[".($s2==$s2_dec)."]\n";

print "\n[$s3] encoded:[".($s3_enc=Base62x::encode($s3))."]\n";
print "[$s3_enc] decoded:[".($s3_dec=Base62x::decode($s3_enc))."] eq:[".($s3==$s3_dec)."] \n";

/*
*/

?>

