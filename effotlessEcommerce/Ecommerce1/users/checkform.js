function validate(userForm){
	div=document.getElementById("emailmsg");
	div.style.color="red";
	if(div.hasChildNodes()){
		div.removeChild(div.firstChild);
	}
	regex=/(^\w+\@\w+\.\w+)/;
	match=regex.exec(userForm.emailaddress.value);
	if(!match){
		div.appendChild(document.createTextNode("Invalid email!"));
		userForm.emailaddress.focus();
		return false;
	}
	div=document.getElementById("passwdmsg");
	div.style.color="red";
	if(div.hasChildNodes()){
		div.removeChild(div.firstChild);
	}
	if(userForm.password.value.length<=5){
		div.appendChild(document.createTextNode("The password should have at least 6 characters!"));
		userForm.emailaddress.focus();
		return false;
	}
	div=document.getElementById("repasswdmsg");
	div.style.color="red";
	if(div.hasChildNodes()){
		div.removeChild(div.firstChild);
	}
	if(userForm.password.value!=userForm.repassword.value){
		div.appendChild(document.createTextNode("The passwords don't match!"));
		userForm.emailaddress.focus();
		return false;
	}
	var div=document.getElementById("usermsg");
	div.style.color="red";
	if(div.hasChildNodes()){
		div.removeChild(div.firstChild);
	}
	if(userForm.fullname.value.length==0){
		div.appendChild(document.createTextNode("Name cannot be blank!"));
		userForm.emailaddress.focus();
		return false;
	}
	return true;
}
