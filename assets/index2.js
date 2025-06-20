const imagen = document.getElementById("imagen");
const containerInput = document.querySelector(".cont-talle");
const img = document.getElementById("img");
const btnTalle = document.querySelector(".btn-agregar-talle");
const tablas = document.querySelectorAll('.tabla');
document.addEventListener("DOMContentLoaded", () => {
    if (containerInput) {
      if (containerInput.childElementCount == 1) {
        agregarTalle();
      } else {
        agregarEventos();
      }
    }
  btnTalle?.addEventListener("click", () => {
    agregarTalle();
  });

  tablas.forEach(tabla => {
    new DataTable(tabla, {
      paging: true,
      searching: true,
      ordering: true,
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'  
      },
      pageLength: 5
    });
  });
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
imagen?.addEventListener('change', (e) => {
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

