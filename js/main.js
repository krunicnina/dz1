function validateForm() {
    var ime = document.forms["unosTermina"]["ime"].value;
    var prezime = document.forms["unosTermina"]["prezime"].value;
    var usluga = document.forms["unosTermina"]["usluga"].value;
    var datum = document.forms["unosTermina"]["datum"].value;
    var brojtelefona = document.forms["unosTermina"]["brojtelefona"].value;
    
    if (ime == "" || prezime == "" || usluga == "" || datum == ""|| brojtelefona == "") {
      alert("Niste popunili sva polja! ");
      return false;
    }
  }