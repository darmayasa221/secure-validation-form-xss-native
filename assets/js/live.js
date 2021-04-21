const keyword = document.getElementById('keyword');
const search = document.getElementById('search');
const srch = document.getElementById('srch');

keyword.addEventListener('keyup', function(){
  const con = new XMLHttpRequest();
  con.onreadystatechange = function (){
    if(con.readyState == 4 && con.status == 200){
      srch.innerHTML = con.responseText;
    }
    con.open('GET', 'srch.php?keyword=' + keyword.value, true);
    con.send();
  }
})
