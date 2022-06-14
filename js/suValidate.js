const username = document.getElementById('SUusername')
const password = document.getElementById('SUpwd')
const email = document.getElementById('SUemail')
const name = document.getElementById('SUname')
const DOB = document.getElementById('SUDOB')
const phonenum = document.getElementById('SUphonenum')
const paymentinfo = document.getElementById('SUpaymentinfo')
const city = document.getElementById('SUcity')
const street = document.getElementById('SUstreet')
const signupform = document.getElementById('signupform')
const errorElement = document.getElementById('SUerror')
const country = document.getElementById('SUcountry').selectedIndex
const gender = document.getElementById('SUgender').selectedIndex



signupform.addEventListener('submit',(e) =>{
    
    let messages=[]
    if (name.value === "" || name.value == null || username.value === "" || username.value == null || password.value === "" || password.value == null || email.value === "" || email.value == null || DOB.value === "" || DOB.value == null || phonenum.value === "" || phonenum.value == null || paymentinfo.value === "" || paymentinfo.value == null || city.value === "" || city.value == null || street.value === "" || street.value == null || country==0 || gender==0)
    {
        messages.push('Please Fill All Fields!')
        
    }
    else if (password.value.length<6){
        messages.push('Password Should be at least 6')
    }
    
    if (messages.length> 0){
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
})




function strength(password) {
      var password_strength = document.getElementById("password-text");

      if (password.length == 0) {
        password_strength.innerHTML = "";
        return;
      }

      var regex = new Array();
      regex.push("[A-Z]"); 
      regex.push("[a-z]"); 
      regex.push("[0-9]"); 
      regex.push("[$@$!%*#?&]");

      var passed = 0;

      
      for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(password)) {
          passed++;
        }
      }

     
      var strength = "";
      switch (passed) {
        case 0:
        case 1:
        case 2:
          strength = "<div class='progress-barW'>Weak</div>";
          break;
        case 3:
          strength = "<div class='progress-barM '>Medium</div>";
          break;
        case 4:
          strength = "<div class='progress-barS '>Strong</div>";
          break;

      }
      password_strength.innerHTML = strength;

    }





