
const i=document.forms.myForm
const form=document.getElementById('forms')
let passe=i.pass.value
let passe2=i.pass2.value
let nom=document.getElementById('form2Example47')
let Email=document.getElementById('form2Example17')
let passWord1=document.getElementById('form2Example27')
let passWord2=document.getElementById('form2Example37')
 const btn=document.querySelector('#btn')





 i.addEventListener('submit',function(e){


    let bol=verification()
    // if(bol==false){
    //     e.preventDefault();
    // }
   
    if(bol==false){
        e.preventDefault();
    }

 })


 function verification(){
    const mdp=passWord1.value.trim()
    const mdp2=passWord2.value.trim()
    if(mdp!==mdp2){
        // e.preventDefault();
        alert('le deux mdp ne sont relie')
        return false;
      
    }

    // e.preventDefault();
 }

//  passe1=i.pass.value

// function verification(){
//     if(passe1!=passe2){
//         alert('le deux mpd ne sont pas meme')
//         // form.setAttribute('action','registre.php')
//         btn.classList.add('disabled')
//     }
// }



i.addEventListener('submit', function(){
    // if(passe1==passe2){
         document.write('votre pass 1 est '+ passe1)
         alert('votre pass 2 est ' + passe2)
        // form.setAttribute('action','registre.php')
        // btn.classList.add('disabled')
       return false;
        
    //  }
})