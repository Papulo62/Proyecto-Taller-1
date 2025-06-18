const imagen = document.getElementById("imagen");
const containerInput = document.querySelector(".cont-talle");
const img = document.getElementById("img");
const btnTalle = document.querySelector(".btn-agregar-talle");

document.addEventListener("DOMContentLoaded", () => {
  console.log("hola si funciona");
  if(containerInput.childElementCount == 1){
    agregarTalle();
  }else{
    agregarEventos();
  }
  btnTalle.addEventListener("click", () => {
    agregarTalle();
  })
})
const agregarTalle = ()=>{
  const btnDisabled = document.querySelector('button:disabled')
  if(btnDisabled){
    console.log(btnDisabled)
    btnDisabled.removeAttribute('disabled')
  }
  const template = document.querySelector("template");
  const templateData = template.content.cloneNode(true);
  containerInput.insertBefore(templateData, containerInput.children[containerInput.children.length - 1]);
  agregarEventos();
}
const agregarEventos = () =>{
  const btnDelete = document.querySelectorAll(".btn-borrar-talle");
  btnDelete.forEach(btn => eliminarTalle(btn));
}

const eliminarTalle = (btn) =>{
  btn.addEventListener("click", () => {
      const containerTalle = btn.closest(".d-flex.gap-3");
      containerTalle.remove();
      if(containerInput.childElementCount == 2){
        containerInput.querySelector('button').setAttribute("disabled", "");
      }
    });
} 
imagen.addEventListener('change', (e) => {
    const labelImagen = document.querySelector('label[for="imagen"]');
    
    if(e.target.files[0]){
        file = new FileReader();
        file.onload = (e) => {
            img.src = e.target.result;
        }
        file.readAsDataURL(e.target.files[0]);
        labelImagen.innerHTML = '<i class="fas fa-check-circle"></i> Imagen agregada correctamente';
        labelImagen.style.backgroundColor = '#28a745';
    } else {
        labelImagen.innerHTML = '<i class="fas fa-upload"></i> Seleccionar Imagen';
        labelImagen.style.backgroundColor = '#007bff';
    }
});

btnSuma.addEventListener("click", () => {
  console.log("hola");
});

btnResta.addEventListener("click", () => {
  console.log("hola");
});

