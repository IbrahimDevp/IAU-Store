
const lgform = document.getElementById('lgform')
const lgusername = document.getElementById('lgusername')
const lgpwd = document.getElementById('lgpwd')
const lgerror = document.getElementById('lgerror')



lgform.addEventListener('submit',(e) =>{
    let messages=[]
    if (lgusername.value === "" || lgusername.value == null || lgpwd.value === "" || lgpwd.value == null ){
        messages.push('Please Fill All Fields!')  
    }
    if (messages.length> 0){
        e.preventDefault()
        lgerror.innerText = messages.join(', ')
    }
})