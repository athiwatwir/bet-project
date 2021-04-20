function showPwd(id, el) { // show password
    let x = document.getElementById(id);
    if (x.type === "password") {
      x.type = "text";
      el.className = 'fi fi-eye-disabled field-icon showpwd';
    } else {
      x.type = "password";
      el.className = 'fi fi-eye field-icon showpwd';
    }
  } 


// wallet.blade.php------------------------------------------------------
function editWallet(id, game, amount) {
    document.getElementById('is_amount').innerHTML = game
    document.getElementById('wallet_id').value = id
    document.getElementById('wallet_amount').innerHTML = amount
}

function editWalletSelectedOption(status) {
    let optionSelect = status ? document.getElementById('wallet_option').value : 0
    if(optionSelect == 1) {
        document.getElementById('add_amount').style.display = "block"
        document.getElementById('change_amount').style.display = "none"
        document.getElementById('add_amount_wallet').required = true
        document.getElementById('change_amount_wallet').required = false
    }else if(optionSelect == 2){
        document.getElementById('add_amount').style.display = "none"
        document.getElementById('change_amount').style.display = "block"
        document.getElementById('add_amount_wallet').required = false
        document.getElementById('change_amount_wallet').required = true
    }else{
        document.getElementById('add_amount').style.display = "none"
        document.getElementById('change_amount').style.display = "none"
        document.getElementById('wallet_option').value = ''
        document.getElementById('add_amount_wallet').required = false
        document.getElementById('change_amount_wallet').required = false
    }
}