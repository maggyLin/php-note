$str='我我 test';
echo preg_match ( '/[' . chr ( 0xa1 ) . '-' . chr ( 0xff ) . ']/', $str );     // 汉字
echo preg_match ( '/[0-9]/', $str );                                          // 数字
echo preg_match ( '/[a-zA-Z]/', $str );                                    // 字母
echo preg_match ( '/[\Q~!@#$%^&*()+-_=.:?<>\E]/', $str );                    // 特殊符号



function str_check($str,$kind){
	//kind : 1=漢字 / 2=數字 / 3=字母 / 4=符號

	$match=false; //預設不包含
	if($kind==1){
		if(preg_match ( '/['.chr(0xa1).'-'.chr(0xff).']/', $str )) $match=true;
	}
	elseif($kind==2){
		if(preg_match ( '/[0-9]/', $str )) $match=true;
	}
	elseif($kind==3){
		if(preg_match ( '/[a-zA-Z]/', $str )) $match=true;
	}
	elseif($kind==4){
		if(preg_match ( '/[\Q~!@#$%^&*()+-_=.:?<>\E]/', $str )) $match=true;
	}
	return $match;
}