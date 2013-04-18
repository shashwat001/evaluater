<!DOCTYPE html>
<?php
ini_set( "display_errors", 0);
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui.css" />
  	<script src="js/jquery-1.9.1.js"></script>
  	<script src="js/jquery-ui.js"></script>
<!--	<script type="text/javascript" src="js/myjquery.js"></script>-->
	<title>SportCoder</title>
        <script type="text/javascript">
            function addtcaseContest(obj,i)
            {
                if(obj.count==null)
                {
                    obj.count = 1;
                }
                else
                {
                    obj.count++;
                }
                var t="#tcasebox"+i;
                var old = $(t).html();
                old += '<div>Input:<input type="file" name="tcaseinput'+i+'_'+obj.count+'" />Output:<input type="file" name="tcaseoutput'+i+'_'+obj.count+'" /><button name="cross" onclick="return removediv(this);" >X</button></div>';
                $('#tcasebox'+i).html(old);
                return false;
            }
            function removediv(obj)
            {
                var par = obj.parentNode;
                par.parentNode.removeChild(par);
                return false;
            }
            
            function validate()
            {
                var errstr = "";
                var errflag = 0;
                if($('#code').val()=="")
                {
                    errflag = 1;
                    errstr += "Code is not filled\n";
                }
                else
                {
                    $('#code').val($('#code').val().toUpperCase());
                }
                if(document.getElementById('add').count!=null)
                    $('#hidden').val(document.getElementById('add').count);
                else
                    $('#hidden').val(0);
                if(errflag == 1)
                {
                    alert(errstr);
                    return false;
                }

                return true;
            }


            function generateDynamic()
            {
                
               if(document.getElementById("noOfques").value=="")
                   {
                       alert("enter details");
                      return false;
                   }
                   document.getElementById("Gobutton").style.display="none";
               for(var i=0; i<document.getElementById("noOfques").value; i++)
                { 
                    var table = document.getElementById("contestTable");
                
 
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);

                    var cell1 = row.insertCell(0);
                    cell1.setAttribute('colspan', '2');
                    cell1.setAttribute('align', 'center');
                    //Cell1.allign = "center";
                    cell1.innerHTML="<span class=\"headertextprop\">Enter details for question "+(i+1)+":<span>";
              
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span>Code</span>";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<input type=\"text\" id=\"code"+i+"\" style=\"width: 300px;\" name=\"code"+i+"\" value=\"\">";
                    
                    
                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span>Category</span>";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<select style=\"width:300px\" name=\"category"+i+"\"><option value=\"0\">Easy</option><option value=\"1\">Medium</option><option value=\"2\">Difficult</option></select>";
                    
                    
                    
//                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span>Name</span>";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<input type=\"text\" id=\"name"+i+"\" style=\"width: 300px;\" name=\"name"+i+"\" value=\"\">";
                    
                    
//                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span>Problem</span>";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<input type=\"file\" id=\"probfile"+i+"\" style=\"width: 300px;\" name=\"probfile"+i+"\" value=\"\">";
                    
                    
                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span>Time Limit</span>";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<input type=\"number\" id=\"tlimit"+i+"\" style=\"width: 300px;\" name=\"tlimit"+i+"\" value=\"\">";
                    
                    
                    
                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span>Memory Limit</span>";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<input type=\"number\" id=\"memlimit"+i+"\" style=\"width: 300px;\" name=\"memlimit"+i+"\" value=\"\">";
                    
                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                    cell11.innerHTML="Test Cases";
                   
                    var cell11 = row.insertCell(1);
                    cell11.innerHTML="<input type=\"text\" name=\"tcases"+i+"\" />";
                   
//                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="";
                    var cell11 = row.insertCell(1);
                   
                    
                    cell11.innerHTML="<button id=\"add"+i+"\" name=\"add"+i+"\" onclick='return addtcaseContest(this,"+i+")' >Add</button>";
                    
//                    
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                    
                    cell11.innerHTML="<span></span>";
                    var cell11 = row.insertCell(1);
                   
                    cell11.setAttribute('id', 'tcasebox'+i);
                    cell11.innerHTML="";
                    
                    
                    
                    /*var element1 = document.createElement("input");
                    element1.type = "checkbox";
                    element1.name="chkbox[]";
                    cell1.appendChild(element1);

                   /* var cell2 = row.insertCell(1);
                    cell2.innerHTML = rowCount + 1;

                    var cell3 = row.insertCell(2);
                    var element2 = document.createElement("input");
                    element2.type = "text";
                    element2.name = "txtbox[]";
                    cell3.appendChild(element2);*/

                }
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    var cell11 = row.insertCell(0);
                   
                     cell11.setAttribute('colspan', '2');
                     cell11.setAttribute('align', 'center');
                    cell11.innerHTML="<input type=\"submit\" style=\"width:300px;height:40px;font-size: 20px\" name=\"submit\" value=\"Submit\" />";

            }
        </script>
</head>
<body>
<?php include("perma/header.php");?>	

<section id="frm" class="sec">
    <form method="post" action="createcontest.php" enctype="multipart/form-data" >
    <table class="tableprop" id="contestTable" border="0">
        <tr>
            <th class="headertextprop" colspan="2">Enter details to create contest<th>
        </tr>
        <tr>
            <td>
                <span class="textprop">Enter contest name:<span>
            </td>
            <td>
                <input name="contestname" type="text" style="width: 300px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <span class="textprop">Enter contest code:<span>
            </td>
            <td>
                <input name="code" type="text" style="width: 300px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <span class="textprop">Start Time of contest:<span>
            </td>
            <td>
                <input type="text" name="sdate" value="YYYY-MM-DD" style="width: 150px;"/>
                <input type="text" name="stime" value="HH:MM:SS" style="width: 150px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <span class="textprop">End Time of contest:<span>
            </td>
            <td>
                <input type="text" name="edate" value="YYYY-MM-DD" style="width: 150px;"/>
                <input type="text" name="etime" value="HH:MM:SS" style="width: 150px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <span class="textprop">Number of questions in contest:<span>
            </td>
            <td >
                <input id="noOfques" name="probcount" type="text" style="width: 300px;"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input id="Gobutton" type="button" value="Go" onclick="javascript:generateDynamic()" style="width:300px;height:40px;font-size: 20px" id="gobutton"/>
            </td>
        </tr>
    </table>
    </form>
</section>
<aside id="side"><?php include("sidebar/mainindex.php");?></aside>
<?php include("perma/footer.php");?>	
	
</body>
</html>