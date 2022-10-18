const img = document.querySelectorAll('.img-galleria');
const imgLight = document.querySelector('.agregar-imagen');
const contLight = document.querySelector('.imagen-light');
const hamburguer1 = document.querySelector('.hamburguer');

console.log(img);
//console.log(imgLight);
//console.log(contLight

img.forEach( imagen =>{
	imagen.addEventListener('click', ()=>{
		//alert('img selected');
		//console.log(imagen.getAttribute('src'));
		apperImg(imagen.getAttribute('src'));
	})
})

contLight.addEventListener('click', (e)=>{
	//console.log(e.target);
	if(e.target !== imgLight){
		contLight.classList.toggle('show');
		imgLight.classList.toggle('showImage');	
		hamburguer1.style.opacity = '1';
	}
})

const apperImg = (imagen)=>{
	imgLight.src = imagen;
	contLight.classList.toggle('show');
	imgLight.classList.toggle('showImage');
	hamburguer1.style.opacity = '0';
}