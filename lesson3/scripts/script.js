function showForm()	{
	let form = document.getElementById('form');
	form.classList.toggle('show');
}

function openInModal(e){
	// alert(e.dataset.name);
	let modal = document.getElementById('modal');
	modal.classList.toggle('show');
	let img = document.createElement('img');
	img.id='modalimg';
	img.src = "img/full/"+e.dataset.name;
	modal.appendChild(img);

}

function modalClose() {
	let modal = document.getElementById('modal');
	modal.classList.toggle('show');
	let img = document.getElementById('modaling')
	modal.removeChild(modal.firstChild);
}