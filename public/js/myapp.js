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

function subWalletHistory(data, id) {
  if(data !== null) {
    let tbodyRef = document.getElementById('sub_wallet_history_table').getElementsByTagName('tbody')[0]
    
    while (tbodyRef.childNodes.length) {
      tbodyRef.removeChild(tbodyRef.childNodes[0]);
    }

    for(i = 0; i < data.length; i++) {
      let type = this.subWalletHistoryType(id, data[i].from_wallet_id, data[i].to_wallet_id)
      let from = data[i].from_default == 'Y' ? 'กระเป๋าหลัก' : 'กระเป๋าเกม' + data[i].from_game
      let to = data[i].to_default == 'Y' ? 'กระเป๋าหลัก' : 'กระเป๋าเกม' + data[i].to_game
      let status = data[i].status == 'CO' ? 'ยืนยันแล้ว' : data[i].status == 'VO' ? 'ปฏิเสธแล้ว' : 'รอยืนยัน'

      let newRow = tbodyRef.insertRow(i)
      newRow.insertCell(0).innerHTML = data[i].action_date
      newRow.insertCell(1).innerHTML = '<center>' + type + '</center>'
      newRow.insertCell(2).innerHTML = type == 'รับเข้า' ? '<center><small class="badge badge-info font-weight-normal">' + from + '</small></center>' : ''
      newRow.insertCell(3).innerHTML = type == 'ส่งออก' ? '<center><small class="badge badge-warning font-weight-normal">' + to + '</small></center>' : ''
      newRow.insertCell(4).innerHTML = '<center>' + data[i].amount + '</center>'
      newRow.insertCell(5).innerHTML = '<center><small class="badge badge-success font-weight-normal">' + status + '</small></center>'
    }
  }
}

function subWalletHistoryType(wallet_id, from_id, to_id) {
  if(wallet_id == from_id) return 'ส่งออก'
  if(wallet_id == to_id) return 'รับเข้า'
}