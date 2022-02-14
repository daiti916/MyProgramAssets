function check(){
	var err = 0;

	// 値を取得
	const name_1 = document.form.name_1.value;
	const name_2 = document.form.name_2.value;
	const read_1 = document.form.read_1.value;
	const read_2 = document.form.read_2.value;
	const mail = document.form.mail_address.value;
	const mail_confirm = document.form.mail_address_confirm.value;
	const zipcode = document.form.zipcode.value;
	const address = document.form.address.value;
	const phone = document.form.phone.value;

	if (name_1 === ""　|| name_2 === ""){
		err++;
		const name_chk_msg = document.getElementById('name_chk_msg');
		name_chk_msg.innerHTML = "<font color='#DD0000'>氏名が入力されていません。</font>";
	}else{
		const name_chk_msg = document.getElementById('name_chk_msg');
		name_chk_msg.innerHTML = "";
	}

	if (read_1 === ""　|| read_2 === ""){
		err++;
		const read_chk_msg = document.getElementById('read_chk_msg');
		read_chk_msg.innerHTML = "<font color='#DD0000'>氏名（かな）が入力されていません。</font>";
	}else{
		const read_chk_msg = document.getElementById('read_chk_msg');
		read_chk_msg.innerHTML = "<font color='#DD0000'>";
	}


	if (mail === ""){
		err++;
		const mail_chk_msg = document.getElementById('mail_chk_msg');
	mail_chk_msg.innerHTML = "<font color='#DD0000'>メールアドレスが入力されていません。</font>";
	}else{
		const mail_chk_msg = document.getElementById('mail_chk_msg');
		mail_chk_msg.innerHTML = "";	
	}

	if (mail !== mail_confirm){
		err++;
		const mail_confirm_chk_msg = document.getElementById('mail_confirm_chk_msg');
		mail_confirm_chk_msg.innerHTML = "<font color='#DD0000'>メールアドレスが一致していません。</font>";
	}else{
		const mail_confirm_chk_msg = document.getElementById('mail_confirm_chk_msg');
		mail_confirm_chk_msg.innerHTML = "";
	}

	if(zipcode === ""){
		err++;
		const zipcode_chk_msg = document.getElementById('zipcode_chk_msg');
		zipcode_chk_msg.innerHTML = "<font color='#DD0000'>郵便番号が入力されていません。</font>";
	}else{
		const zipcode_chk_msg = document.getElementById('zipcode_chk_msg');
		zipcode_chk_msg.innerHTML = "";
	}

	if(address === ""){
		err++;
		const address_chk_msg = document.getElementById('address_chk_msg');
		address_chk_msg.innerHTML = "<font color='#DD0000'>住所が入力されていません。</font>";
	}else{
		const address_chk_msg = document.getElementById('address_chk_msg');
		address_chk_msg.innerHTML = "";
	}

	if(phone === ""){
		err++;
		const phone_chk_msg = document.getElementById('phone_chk_msg');
		phone_chk_msg.innerHTML = "<font color='#DD0000'>電話番号が入力されていません。</font>";
	}else{
		const phone_chk_msg = document.getElementById('phone_chk_msg');
		phone_chk_msg.innerHTML = "";
	}
	if(err !== 0){
		return false;
	}
}