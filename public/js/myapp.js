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
      let type = this.subWalletHistoryType(id, data[i].from_wallet_id, data[i].to_wallet_id, data[i].by_admin, data[i].type)
      let type_badge = this.setTypeBadge(type)
      let from = data[i].from_default == 'Y' ? '?????????????????????????????????' : (data[i].by_admin == null) ? '?????????????????????????????? ' + data[i].from_game : '?????????????????????????????????'
      let to = data[i].to_default == 'Y' ? '?????????????????????????????????' : '?????????????????????????????? ' + data[i].to_game
      let status = data[i].status == 'CO' ? '??????????????????????????????' : data[i].status == 'VO' ? '??????????????????????????????' : '????????????????????????'
      let description = data[i].description == null ? '' : '<span class="text-danger">**</span> ' + data[i].description
      let from_admin = data[i].by_admin == null ? '<center><small class="badge badge-info font-weight-normal">' + from + '</small></center>' : '<center><small class="badge badge-primary font-weight-normal">' + from + '</small></center><center><small><small>' + description + '</small></small></center>'
      let to_admin = data[i].by_admin == null ? '<center><small class="badge badge-warning font-weight-normal">' + to + '</small></center>' : '<center><small class="badge badge-secondary font-weight-normal">' + from + '</small></center><center><small><small>' + description + '</small></small></center>'

      let newRow = tbodyRef.insertRow(i)
      newRow.insertCell(0).innerHTML = this.dateToYMD(new Date(data[i].action_date))
      newRow.insertCell(1).innerHTML = '<center>' + type_badge + '</center>'
      newRow.insertCell(2).innerHTML = type == '?????????????????????' || type == '???????????????' ? from_admin : ''
      newRow.insertCell(3).innerHTML = type == '??????????????????' || type == '??????' ? to_admin : ''
      newRow.insertCell(4).innerHTML = '<center>' + data[i].amount + '</center>'
      newRow.insertCell(5).innerHTML = '<center><small class="badge badge-success font-weight-normal">' + status + '</small></center>'
    }
  }
}

function subWalletHistoryType(wallet_id, from_id, to_id, by_admin, type) {
  if(by_admin == null) {
    if(wallet_id == from_id) return '??????????????????'
    if(wallet_id == to_id) return '?????????????????????'
  }else{
    if(type == '???????????????') return '???????????????'
    if(type == '??????') return '??????'
  }
}

function setTypeBadge(type) {
  if(type == '?????????????????????') return '<span class="badge badge-info font-weight-normal fs--16">' + type + '</span>'
  if(type == '??????????????????') return '<span class="badge badge-warning font-weight-normal fs--16">' + type + '</span>'
  if(type == '???????????????') return '<span class="badge badge-primary font-weight-normal fs--16">' + type + '</span>'
  if(type == '??????') return '<span class="badge badge-secondary font-weight-normal fs--16">' + type + '</span>'
}

function dateToYMD(date) {
  var d = date.getDate()
  var m = date.getMonth() + 1 //Month from 0 to 11
  var y = date.getFullYear()
  return '' + (d <= 9 ? '0' + d : d) + '-' + (m<=9 ? '0' + m : m) + '-' + y
}