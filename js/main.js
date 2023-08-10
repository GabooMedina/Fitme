const inputs = document.querySelectorAll(".input");
var user = document.getElementsByName("usuario").values;
var pass = document.getElementsByName("password").values;

function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});


function controles() {
if (user =="" && pass =="") {
	swal("CREDENCIALES INCORRECTAS");
} else {
}
}


