var xmlhttp = new XMLHttpRequest();
var url = "http://localhost/musicsp/rest/tablet";


sendRequest = function(method, naslov, data) {
  if(!naslov) naslov = null;
  if(!data) data = null;
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText);
      var res = JSON.parse(this.responseText);
      console.log(res);
      if(res.type) {
        var responseObj = {
          type: res.type,
          results: res.results
        } 
      } else {
        var responseObj = {
          type: 'GET',
          results: res
        } 
      }
      console.log(responseObj);
        handleResponse(responseObj);
      }
  };

  if(naslov)
    url = url + '/' + naslov;

  xmlhttp.open(method, url, true);
  if(data) {
    console.log("sending data...");
    xmlhttp.send(JSON.stringify(data));
  } else {
    xmlhttp.send();
  }
  
}

handleResponse = function(response) {
  if (response.type == 'GET') {
    if (window.location.href == 'http://localhost/musicsp/') {
      updateTable(response.results);
    } else {
      prikaziTablet(response.results);
    }
  } else if (response.type == 'DELETE') {
    document.location.href = 'http://localhost/musicsp';
  } else if (response.type == 'POST') {
    document.location.href = 'http://localhost/musicsp';
  } else {
    console.log("Nekaj je slo narobe")
  }
}

updateTable = function(rows) {
  var vrstice = "<thead><tr><th>#</th><th>Ime</th><th>Koncentracija</th><th>Serija</th><th>Možnosti</th></tr></thead>";
  for (i = 0; i < rows.length; i++) {
    var vrsta = '<tr><td>' + rows[i].id + '</td><td><a href="lepIzpis.php?id='+ rows[i].id +' ">' + rows[i].ime + '</a></td><td>' + rows[i].koncentracija + '</td><td>' + rows[i].serija + '</td><td><span onClick="izbris('+rows[i].id+')" class="glyphicon glyphicon-trash"></span></td</tr>';
    vrstice += vrsta;
  }
  document.getElementById('tabletiTabela').innerHTML = vrstice;
  // (vrstice) = vrstice;
}

addNewTablet = function() {
  document.location.href = 'http://localhost/musicsp/dodajTablet.php'
}

zapisiVBazo = function() {
  var tablet = {
    ime: document.getElementById('ime').value,
    koncentracija: document.getElementById('koncentracija').value,
    serija: document.getElementById('serija').value,
  }
  sendRequest('POST', null, tablet);
}

izbris = function(id) {
  sendRequest('DELETE', id);
}

prikaziTablet = function(tablet) {
 
console.log(tablet);

}
