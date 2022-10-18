const hamburguer = document.querySelector('.hamburguer');
const menu = document.querySelector('.menu-navegacion');

//console.log(hamburguer);
//console.log(menu);

hamburguer.addEventListener('click', ()=>{
	//alert('click');
	menu.classList.toggle("spread"); //cada que se precione la img ;le agrega la clase
})

window.addEventListener('click', e =>{
	//console.log(e.target)
	if(menu.classList.contains('spread') && e.target != menu && e.target != hamburguer ){
		menu.classList.toggle("spread");
	}
})