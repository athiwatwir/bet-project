const is_token = ''

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
function editWallet(id, game, name) {
    document.getElementById('wallet_id').value = id
    document.querySelector('#is_game_name').innerHTML = game
    const res = this.getGameWallet(name)
    res.then(balance => {
      // document.querySelector('#game_balance').innerHTML = balance.data
      document.querySelector('#game_balance_2').innerHTML = balance.data
      this.setAmountDefault(balance.data)
    })
}

async function getGameWallet(user) {
    const response = await fetch(this.thePointer()+'api/v2/pgsoftgame/wallet/'+ user);
    return response.json()
}

// function setAmountDefault(user, amount) {
//   const res = this.getGameWallet(user)
//   res.then(balance => {
//     document.querySelector('#realtime_amount_main').innerHTML = this.formatNumber(balance.data)
//     this.allAmount(balance.data, amount)
//   })
// }

// function pgSoftWallet(user, amount) {
//   this.setAmountDefault(user, amount)
//   setInterval(function () {
//     const res = this.getGameWallet(user)
//     res.then(balance => {
//       document.querySelector('#realtime_amount_main').innerHTML = this.formatNumber(balance.data)
//       this.allAmount(balance.data, amount)
//     })
//   }, 5000);
// }

// function allAmount(game, wallet) {
//   let amount = parseFloat(wallet)
//   let allAmount = game + amount
//   document.querySelector('#realtime_all_amount').innerHTML = this.formatNumber(allAmount)
// }

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
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
        document.getElementById('change_amount_wallet').required = false
    }else{
        document.getElementById('add_amount').style.display = "none"
        document.getElementById('change_amount').style.display = "none"
        document.getElementById('wallet_option').value = ''
        document.getElementById('add_amount_wallet').required = false
        document.getElementById('change_amount_wallet').required = false
    }
}

function editWalletSelectedOptionV2(value) {
  document.querySelector('#wallet_action').value = value
  if(value == 'deposit') {
      document.getElementById('add_amount').style.display = "block"
      document.getElementById('change_amount').style.display = "none"
      document.getElementById('add_amount_wallet').required = true
      document.getElementById('change_amount_wallet').required = false
  }else if(value == 'withdraw'){
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

function subWalletHistory(data, id) {
  if(data !== null) {
    let tbodyRef = document.getElementById('sub_wallet_history_table').getElementsByTagName('tbody')[0]
    
    while (tbodyRef.childNodes.length) {
      tbodyRef.removeChild(tbodyRef.childNodes[0]);
    }

    for(i = 0; i < data.length; i++) {
      let type = this.subWalletHistoryType(id, data[i].from_wallet_id, data[i].to_wallet_id, data[i].by_admin, data[i].type)
      let type_badge = this.setTypeBadge(type)
      let from = data[i].from_default == 'Y' ? 'กระเป๋าหลัก' : (data[i].by_admin == null) ? 'กระเป๋าเกม ' + data[i].from_game : 'ผู้ดูแลระบบ'
      let to = data[i].to_default == 'Y' ? 'กระเป๋าหลัก' : 'กระเป๋าเกม ' + data[i].to_game
      let status = data[i].status == 'CO' ? 'ยืนยันแล้ว' : data[i].status == 'VO' ? 'ปฏิเสธแล้ว' : 'รอยืนยัน'
      let description = data[i].description == null ? '' : '<span class="text-danger">**</span> ' + data[i].description
      let from_admin = data[i].by_admin == null ? '<center><small class="badge badge-info font-weight-normal">' + from + '</small></center>' : '<center><small class="badge badge-primary font-weight-normal">' + from + '</small></center><center><small><small>' + description + '</small></small></center>'
      let to_admin = data[i].by_admin == null ? '<center><small class="badge badge-warning font-weight-normal">' + to + '</small></center>' : '<center><small class="badge badge-secondary font-weight-normal">' + from + '</small></center><center><small><small>' + description + '</small></small></center>'

      let newRow = tbodyRef.insertRow(i)
      newRow.insertCell(0).innerHTML = this.dateToYMD(new Date(data[i].action_date))
      newRow.insertCell(1).innerHTML = '<center>' + type_badge + '</center>'
      newRow.insertCell(2).innerHTML = type == 'รับเข้า' || type == 'ADJUST' ? from_admin : ''
      newRow.insertCell(3).innerHTML = type == 'ส่งออก' || type == 'ADJUST' ? to_admin : ''
      newRow.insertCell(4).innerHTML = '<center>' + data[i].amount + '</center>'
      newRow.insertCell(5).innerHTML = '<center><small class="badge badge-success font-weight-normal">' + status + '</small></center>'
    }
  }
}

function subWalletHistoryType(wallet_id, from_id, to_id, by_admin, type) {
  if(by_admin == null) {
    if(wallet_id == from_id) return 'ส่งออก'
    if(wallet_id == to_id) return 'รับเข้า'
  }else{
    if(type == 'ADJUST') return 'ADJUST'
  }
}

function thePointer()
{
   const isapi = 'https://88.playszone.com/'
  //  const isapi = 'http://127.0.0.1:8000/'
   return isapi
}

function theDestination()
{
  const ispath = 'pgsoftgame/wallet'
  return ispath
}

function setTypeBadge(type) {
  if(type == 'รับเข้า') return '<span class="badge badge-info font-weight-normal fs--16">' + type + '</span>'
  if(type == 'ส่งออก') return '<span class="badge badge-warning font-weight-normal fs--16">' + type + '</span>'
  if(type == 'ADJUST') return '<span class="badge badge-primary font-weight-normal fs--16">' + type + '</span>'
}

function dateToYMD(date) {
  var d = date.getDate()
  var m = date.getMonth() + 1 //Month from 0 to 11
  var y = date.getFullYear()
  return '' + (d <= 9 ? '0' + d : d) + '-' + (m<=9 ? '0' + m : m) + '-' + y
}

function checkPasswordReset() {
  let is_password = document.querySelector('#password').value
  let is_confirmpassword = document.querySelector('#password-confirm').value
  let passStage = false
  let confirmStage = false
  
  if(is_password.length < 8) {
      document.querySelector('#notice-message').innerHTML = 'รหัสผ่านต้องมีมากกว่า 8 ตัว'
      document.querySelector('#password-notice').style.display = "flex"
      passStage = false
  }else{
      document.querySelector('#notice-message').innerHTML = ''
      document.querySelector('#password-notice').style.display = "none"
      passStage = true
  }

  if(is_confirmpassword !== '') {
      if(is_password !== is_confirmpassword) {
          document.querySelector('#notice-message').innerHTML = 'รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบ'
          document.querySelector('#password-notice').style.display = "flex"
          confirmStage = false
      }else{
          document.querySelector('#notice-message').innerHTML = ''
          document.querySelector('#password-notice').style.display = "none"
          confirmStage = true
      }
  }

  if(passStage && confirmStage) {
      document.querySelector('#disabled-btn').style.display = "none"
      document.querySelector('#visibled-btn').style.display = "block"
  }else{
      document.querySelector('#disabled-btn').style.display = "block"
      document.querySelector('#visibled-btn').style.display = "none"
  }
}

function userlogs(token) {
  this.is_token = token
  setInterval(function () {
    fetch(this.thePointer()+'api/v1/logs/user-activities', {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': 'Bearer '+ token,
      },
      method: "POST",
      body: JSON.stringify({activity: window.location.pathname, url: window.location.href})
    })
  }, 10000)
}

function gamewallet(game, key) {
  this.walletFirstLoad(game, key)
  setInterval(function () {
    const res = this.fetchWallet(game)
    res.then(res => {
      document.querySelector('#wallet_game_'+key).innerHTML = this.formatNumber(res.data)
      document.querySelector('#realtime_amount_main').innerHTML = this.formatNumber(res.data)
      this.allAmount(res.data)
    })
  }, 30000)
}

function walletFirstLoad(game, key) {
  const res = this.fetchWallet(game)
    res.then(res => {
      document.querySelector('#wallet_game_'+key).innerHTML = this.formatNumber(res.data)
      document.querySelector('#realtime_amount_main').innerHTML = this.formatNumber(res.data)
      this.allAmount(res.data)
  })
}

function allAmount(game) {
  let wallet = document.querySelector('#default-wallet').innerHTML
  let allAmount = parseFloat(game) + parseFloat(wallet)
  document.querySelector('#realtime_all_amount').innerHTML = this.formatNumber(allAmount)
}

async function fetchWallet(game) {
  const response = await fetch(this.thePointer()+'api/v1/game/wallet/'+game, {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': 'Bearer '+ this.is_token,
      }
  })
  return response.json()
}
