var searchIndex = 0

function myFunction() {
  var input, filter, filterAsciiTntValue, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  filterAsciiTntValue = filter.normalize("NFD").replace(/[^\x00-\x7F]/g, "")
  table = document.getElementById("myTable");
  body = table.getElementsByTagName("tbody")[0];
  tr = body.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[searchIndex];
    if (td) {
      txtValue = td.textContent || td.innerText;
      asciiTxtValue = txtValue.normalize("NFD").replace(/[^\x00-\x7F]/g, "")
      if (asciiTxtValue.toUpperCase().indexOf(filterAsciiTntValue) > -1) {
          tr[i].style.display = "";
      } else {
          tr[i].style.display = "none";
      }
    }       
  }
}

function sortTable() {
  var allGroup = ["Name", "Enroll Year"]

      // add the options to the button
      d3.select("#selectButton2")
          .selectAll('myOptions')
          .data(allGroup)
          .enter()
          .append('option')
          .text(function (d) { return d; }) // text showed in the menu
          .attr("value", function (d) { return d; }) // corresponding value returned by the button

      d3.select("#selectButton2").on("change", function(d) {
          var sortIndex;
          input = document.getElementById("myInput");
          input.value = ""
          // recover the option that has been chosen
          var selectedOption = d3.select(this).property("value")
          // run the updateChart function with this selected option
          if(selectedOption == "Name") {
              sortIndex = 0
          }
          if(selectedOption == "Enroll Year") {
              sortIndex = 4
          }

          var table, rows, switching, i, x, y, shouldSwitch;
          table = document.getElementById("myTable");
          switching = true;
          /*Make a loop that will continue until
          no switching has been done:*/
          while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
              //start by saying there should be no switching:
              shouldSwitch = false;
              /*Get the two elements you want to compare,
              one from current row and one from the next:*/
              x = rows[i].getElementsByTagName("TD")[sortIndex];
              y = rows[i + 1].getElementsByTagName("TD")[sortIndex];
              //check if the two rows should switch place:
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
            if (shouldSwitch) {
              /*If a switch has been marked, make the switch
              and mark that a switch has been done:*/
              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
            }
          }
          
  })

  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }


  
}


function filterCols(){

  var allGroup = ["Name:", "Research Area:", "Status:", "Degree Type:", "Enroll Year:", "End Year:", "PT Program:", "PT Institution:", "CMU Program:", "CMU Institution:", "CMU Department:"]

      // add the options to the button
      d3.select("#selectButton")
          .selectAll('myOptions')
          .data(allGroup)
          .enter()
          .append('option')
          .text(function (d) { return d; }) // text showed in the menu
          .attr("value", function (d) { return d; }) // corresponding value returned by the button

      d3.select("#selectButton").on("change", function(d) {
          input = document.getElementById("myInput");
          input.value = ""
          // recover the option that has been chosen
          var selectedOption = d3.select(this).property("value")
          // run the updateChart function with this selected option
          if(selectedOption == "Name:") {
              searchIndex = 0
          }
          if(selectedOption == "Research Area:") {
              searchIndex = 1
          }
          if(selectedOption == "Status:") {
              searchIndex = 2
          }
          if(selectedOption == "Degree Type:") {
              searchIndex = 3
          }
          if(selectedOption == "Enroll Year:") {
              searchIndex = 4
          }
          if(selectedOption == "End Year:") {
              searchIndex = 5
          }
          if(selectedOption == "PT Program:") {
              searchIndex = 6
          }
          if(selectedOption == "PT Institution:") {
              searchIndex = 7
          }
          if(selectedOption == "CMU Program:") {
              searchIndex = 8
          }
          if(selectedOption == "CMU Institution:") {
              searchIndex = 9
          }
          if(selectedOption == "CMU Department:") {
              searchIndex = 10
          }
  })

  searchIndex = 0
}
/*onload="listAuthors();*/