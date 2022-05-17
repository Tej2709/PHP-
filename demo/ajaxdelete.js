
 window.confirm("Are you sure to delete this record");
if (window.confirm=="yes")
{





function deletere(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText==1)
          { 
              document.getElementById("txtHint").innerHTML = "Record deleted successfully";
              setInterval('window.location.reload()', 2000);
          }
          else
          {
              document.getElementById("txtHint").innerHTML = this.responseText;
          }
  
        }
      };
      xmlhttp.open("GET", "delete.php?id=" + str, true);
      xmlhttp.send();
    }
  
  }
}
else{
  window.write("Record not deleted");
}