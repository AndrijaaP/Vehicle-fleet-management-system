function formValidate(e)
{
	let username = document.getElementById('username');
	if(username.value.length >= 30){
		alert("Greška: Ime osobe mora biti manje od 40 karaktera.");
		username.focus();
		return false;
	}
	
	let driving = document.getElementById('dril');
	if(isNaN(driving.value)){
		alert("Greška: Broj dozvole mora imati tacno 8 cifara!");
		driving.focus();
		return false;
	}

	if(driving.value.length != 8){
		alert("Greška: Broj dozvole mora imati tacno 8 cifara!");
		driving.focus();
		return false;
	}
	
	let password = document.getElementById('pass');
	let cnfrpassword = document.getElementById('cnfrpass');
	if((password.value !="") && (password.value == cnfrpassword.value)){

		let name = document.getElementById('username').value;
		if(password.value.length <8){
			alert("Greška: Lozinka mora imati bar 8 karaktera!");
			password.focus();
			return false;
		}
		if(password.value == name){
			alert("Greška: Ime osobe ne može biti lozinka!");
			password.focus();
			return false;
		}
		var numbers = /[0-9]/g;
		if(!password.value.match(numbers)){
			alert("Greška: Lozinka mora imati bar jedan broj (0-9)!");
	        password.focus();
	        return false;
		}
		var lowerCaseLetters = /[a-z]/g;
		if(!password.value.match(lowerCaseLetters)){
			alert("Greška: Lozinka mora imati bar jedno malo slovo (a-z)!");
	        password.focus();
	        return false;
		}
		var upperCaseLetters = /[A-Z]/g;
		if(!password.value.match(upperCaseLetters)){
			alert("Greška: Lozinka mora imati bar jedno veliko slovo (A-Z)!");
	        password.focus();
	        return false;
		}
	}
	else{
		alert("Greška: Lozinke se ne poklapaju!");
		password.focus();
		return false;
	}
	
	alert("Dobrodošli "+ username.value +" uspešno ste se registrovali!");
   	return true;
   	
}