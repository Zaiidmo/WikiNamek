const inputs = document.querySelectorAll('.form input');

const patterns = {
  fullname:{
    regex: /^[a-zA-Z_' ']+$/, 
    message: "firstname not valide (example : Full_Name) ",
  },

  email:{
    regex: /^[a-zA-Z0-9_\.\-]+@[a-zA-Z]+\.[a-z]{2,6}$/, 
    message: "email not valide (example : example@email.com) ",
  },
}
//function to check valid inputs
function valide(pattern,input){
  fieldMessage = document.getElementById(input.attributes.name.value + "-message")
  if(!pattern.regex.test(input.value))
  {
    fieldMessage.innerText = pattern.message;
    fieldMessage.style.color = "red";
  }
  else{
    fieldMessage.innerText = "valid";
    fieldMessage.style.color = "green";
  }
  
  if (isAllInputsValide()) {
    document.getElementById("submitBtn").disabled = false;
  } else {
    document.getElementById("submitBtn").disabled = true;
  }
}

inputs.forEach((input) =>{
  input.addEventListener('keyup',function(e){
      valide(patterns[e.target.attributes.name.value],e.target);
  });
});

function isAllInputsValide() {
  let allInputs = document.querySelectorAll(".form > span");
  let isAllValid = true;
  allInputs.forEach(input => {
    if(input.style.color != "green")
      isAllValid = false;
  })
  return isAllValid;
}