/**
 *
 * @access public
 * @return void
 **/
function AddConfirm(){if(confirm("A New Record will be Added"))form1.submit();}

function EdiConfirm(){if(confirm("A Record will be Edited"))form1.submit();}

function DelConfirm(){if(confirm("A Record will be Deleted"))form1.submit();}


/**
 *
 * @access public
 * @return void
 **/
function CKNum(id){
var numOK = true;
var num = document.getElementById(id).value;
	if (num != "") {
		if (isNaN(num)) {
			numOK = false;
			document.getElementById(id).style.backgroundColor = "aquamarine";
			document.getElementById(id).value = "Just Numbers";
		}
		else{document.getElementById(id).style.backgroundColor = "white";}
	}
	else{document.getElementById(id).style.backgroundColor = "white";}
	return numOK;
}

/**
 *
 * @access public
 * @return void
 **/
function CheckEDate(date,id,defaultvalue){
    var msg = "Please enter a valid date on "+id+", format as DD-MM-YYYY";
    if (date!="") {
	var datearr = date.split("-");
	if (!isNaN(datearr[0]) && !isNaN(datearr[1]) && !isNaN(datearr[2])) {
		var day = datearr[0];
		var month = datearr[1] - 1;
		var year = datearr[2];

		source_date = new Date(year,month,day);

      if(year != source_date.getFullYear())
      {
         alert(msg);
         document.getElementById(id).value = defaultvalue ;
         return false;
      }

      if(month != source_date.getMonth())
      {
         alert(msg);
         document.getElementById(id).value = defaultvalue ;
         return false;
      }

      if(day != source_date.getDate())
      {
         alert(msg);
         document.getElementById(id).value = defaultvalue ;
         return false;
      }

      return true;
	}
	else{
	    alert(msg);
	    document.getElementById(id).value = defaultvalue ;
	    return false
	}
}
}

/**
 *
 * @access public
 * @return void
 **/
function CK_DateLateEqualThanTarget(idTarget,idOwn,OwnDefault){

    var msg = idOwn+" must be late than "+idTarget;
	var dateTarget = document.getElementById(idTarget).value;
	var dateOwn = document.getElementById(idOwn).value;
	if (CheckEDate(dateTarget,idTarget,dateTarget) && CheckEDate(dateOwn,idOwn,OwnDefault)) {

		var Tdatearr = dateTarget.split("-");
		var Tdate = new Date(Tdatearr[2],Tdatearr[1],Tdatearr[0]);
		var Odatearr = dateOwn.split("-");
	    var Odate = new Date(Odatearr[2],Odatearr[1],Odatearr[0]);

		if (Odate<Tdate) {
			alert (msg);
			document.getElementById(idOwn).value = OwnDefault;
			return false;
		}

		return true;

	}

}

/**
 *
 * @access public
 * @return void
 **/
function DateDiff(idLate,idEarly,OwnDefault){
	var dateLate = document.getElementById(idLate).value;
	var dateEarly = document.getElementById(idEarly).value;

	if (dateLate != "" && dateEarly != "") {
        //alert ("OK");
		var Ldatearr = dateLate.split("-");
		var Ldate = new Date(Ldatearr[2],Ldatearr[1],Ldatearr[0]);
		var Edatearr = dateEarly.split("-");
	    var Edate = new Date(Edatearr[2],Edatearr[1],Edatearr[0]);
	    var diffday = (Ldate-Edate)/(24*60*60*1000)
	    return diffday;
	}
	else{
	return OwnDefault;}
}

/**
 *
 * @access public
 * @return void
 **/
function DateCalculate(StartID,EndID,days){
	var date = document.getElementById(StartID).value;
	var datearr = date.split("-");
	var Ldate = new Date(datearr[2],datearr[1],datearr[0]);
	Ldate = Ldate.valueOf();
	var Ddate = Ldate + days * 24 * 60 * 60 * 1000;
	Ddate = new Date(Ddate);
	var day = Ddate.getDate();
	day = day<10?"0"+day:day
	var month = Ddate.getMonth();
	month = month<10?"0"+month:month;
	var year = Ddate.getFullYear();
	Ddate = day + "-" + month + "-" + year;
	document.getElementById(EndID).value = Ddate;
}

/**
 *
 * @access public
 * @return void
 **/
function CKNotEmpty(id){
var addok = true;
if(document.getElementById(id).value == "" || document.getElementById(id).value == "Must Enter"){
document.getElementById(id).style.backgroundColor = "aquamarine";
document.getElementById(id).value = "Must Enter";
addok = false;
}
else{document.getElementById(id).style.backgroundColor = "white";}
return addok;
}


function autoclick(id){
 lnk = document.getElementById(id);
 lnk.click();
}

function autoclickparent(id){
 lnk = parent.document.getElementById(id);
 lnk.click();
}
