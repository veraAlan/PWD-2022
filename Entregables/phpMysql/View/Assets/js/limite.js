var input=  document.getElementById('NroDni');
var input2=  document.getElementById('Telefono');

input.addEventListener('input',function(){
    if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)
  if (this.value.length > 12)
     this.value = this.value.slice(0,12);
})

input2.addEventListener('input',function(){
    if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)
  if (this.value.length > 12)
     this.value = this.value.slice(0,12);
})