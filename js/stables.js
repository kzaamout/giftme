/*	_ Object Constructor
========================*/

function sTables( info ) {
	
	console.log(info);
	
	// Check if table ID is supplied.
	if ( info.tableId === undefined ) {
            console.log("tableId is not supplied, abort");
            return {error: 'must supply id'};
	} 
	this.table  = document.getElementById( info.tableId );
        this.header = this.table.createTHead();
        this.body   = this.table.createTBody();


	// add columns to table. but firest, Check if columns are supplied.
	if ( info.columns === undefined ) {
            console.log("columns are not supplied, abort");
            return {error: 'must supply id'};
	} 
	this.columns(info.columns);
      
      
        // Check if data are supplied.
	if ( info.data === undefined ) {
            console.log("data are not supplied, continue");
	} else {  
            this.fill(info.data);
        }
	
	// Check if data are supplied.
	if ( info.ajax === undefined ) {
            console.log("ajax are not supplied, continue");
	} else {  
            this.ajax(info.ajax);
	}
}

/*	_ Prototype Functions
============================*/

sTables.prototype = {
	
	columns: function (columns){
		var row = this.header.insertRow(0);  

                var cell = row.insertCell(0);
		cell.innerHTML = "<b>" + columns[0].text + "</b>";
		cell.setAttribute('style', 'display:none;')	
   
		for (var i = 1; i < columns.length; i++) {
			var cell = row.insertCell(i);
			cell.innerHTML = "<b>" + columns[i] + "</b>";
		}
	},
	
        fill:   function (data) {
            
            for  (var i = 0; i < data.length; i++) {
                var row = this.body.insertRow(i);
                for  (var j = 0; j < data[i].length; j++) {
                    var cell = row.insertCell(j);
                    cell.innerHTML = data[i][j];
                }
                
            }

        },

	append:	function (data) {
		
		var nRows = this.table.getElementsByTagName("tr").length -1;
                
                console.log("Curret number of rows " + nRows);
                
		var row = this.body.insertRow(nRows);

		for  (var i = 0; i < data.length; i++) {
                    if (i == 0){
                        var cell = row.insertCell(i);
                        cell.innerHTML = data[i];
                        cell.setAttribute('style', 'display:none;')	
                    } else if (i == 1){
                        var cell = row.insertCell(1);
                        var aTag = document.createElement('a');
                        aTag.setAttribute('href',"project.php?projectId="+data[0]);
                        aTag.innerHTML = data[1];
                        cell.appendChild (aTag);
                    } else {
                        var cell = row.insertCell(i);
                        cell.innerHTML = data[i];
                    } 
			

		}
	},

	remove:	function () {
            
	},

	ajax: function (obj) {
            var res;
            var this_function = this;
            console.log(obj);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    res = JSON.parse(this.responseText);
                    console.log(res.data);
                    for  (var i = 0; i < res.data.length; i++) {
                        this_function.append(res.data[i]);
                    }   
                }
            };

            xhttp.open("GET", obj.url, true);
            xhttp.send();

            return res;
	},

        editor: function () {
            var mainDiv = document.createElement("div");
            mainDiv.setAttribute("class", "modal fade"); 
            mainDiv.setAttribute("role", "dialog"); 
            mainDiv.setAttribute("id", "saadModal"); 
            
            var dialogDiv = document.createElement("div");
            dialogDiv.setAttribute("class", "modal-dialog"); 
            
            var contentDiv = document.createElement("div");
            contentDiv.setAttribute("class", "modal-content"); 
            
            var headerDiv = document.createElement("div");
            headerDiv.setAttribute("class", "modal-header"); 
            
            var bodyDiv = document.createElement("div");
            bodyDiv.setAttribute("class", "modal-body"); 
            
            // the header will contains title and close button
            var closeBtn = $('<button type="button" class="close" data-dismiss="modal">close</button>');
            headerDiv.append(closeBtn);

            var h4 = document.createElement("h4");
            h4.textContent = "New Project";
            headerDiv.appendChild(h4);

            
            mainDiv.appendChild(dialogDiv);
            dialogDiv.appendChild(contentDiv);
            contentDiv.appendChild(headerDiv);
            contentDiv.appendChild(bodyDiv);
            
            // attach to container or main div
            document.getElementById('CenterColumn').appendChild(mainDiv);  
            
            
		
        }
};
