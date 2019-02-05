<script>
var CurrentUser='ElectroSapUser';
var CurrentPassword;
var AuthorizationLevel=0;
</script>
<?php
session_start();
include('check_authorization.php');
?>
<script>
</script>
<!DOCTYPE HTML>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="Expires" content="-1"> 
<meta http-equiv="Cache-Control" content="no-store" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<html>
    <head>
    <title>ELECTROSAP Main Page</title>
	<style>
.SummaryTableTable
{
	border:1px solid grey;
	border-collapse: collapse;	
	position:relative;
	left:20px;
	font-size:14px;
}
.SuppliersName
{

}

.StockValue
{

}

.center-screen
{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 100vh;
}


.OverallTotal
{
	position:absolute;
	left:20px;
	top:-20x;

}
.supplier
{
	cursor:pointer;
}	
body
{
	background-color:#eeeeee;
}

.bigbut
{
	width:200px;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
}
.bigbut:hover {
    background-color: yellow; /* Green */
    color: black;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 1.4s;
    cursor: pointer;
}

.LoginForm_hidden
{
	visibility:hidden;	
}
.LoginForm
{
	position:absolute;
	top:150px;
	left:50px;
	visibility:display;
	width=150px
	border: 
	border:1px solid grey;
}
.LoginDetails
{
	position:absolute;
	top:10px;
	left:50px;
	visibility:display;
	width=150px
	border: 
	border:1px solid grey;	
	
}

.logo
{
	position:relative;
	top:-250px;
	align:center;
}
	
.menubuttons
{
	position:relative;
	top:-400px;
	align:center;
}
.ieFiller
{
	position:relative;
	top:200px
	height=300px;
}

</style>

<script type="text/javascript" src="AJAX-ASYNC.js"></script>

<script>
// Global Variables:

function setCookie(cname, cvalue, exdays) {
     var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
} 
function getCookie(cname) {
     var name = cname + "=";
     var decodedCookie = decodeURIComponent(document.cookie);
     var ca = decodedCookie.split(';');
     for(var i = 0; i <ca.length; i++) {
         var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
         if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
     }
     return "";
 } 

function Login(x)
{
	LoginAction=x.value
	if(LoginAction=='LOGOUT')
	{
		//LogOut()
		document.getElementById('LoginForm').className='LoginForm';
	}
	else
	{
		document.getElementById('LoginForm').className='LoginForm';
	}
}

function LogOut()
{
	document.cookie = "UserName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	document.getElementById('LoginButton').value='LOGIN';
	document.getElementById('LoginForm').className='LoginForm_hidden';
	document.getElementById('user').innerHTML='Default User';
	document.getElementById('level').innerHTML='standard';	
}
function GotoTopic(x)
{
	//alert(x.title)
	var Topic=x.title;
	var TopicFile=Topic + ".php";
	//location.replace(TopicFile)
	location.assign(TopicFile)
}

function get_authorization(x)
{
	var UserName=document.getElementById('UserName').value;
	var UserPass=document.getElementById('UserPass').value;
	CurrentUser=UserName;get_authorization
	
	//alert("New UserName = " + UserName + "\n    New UserPass = " + UserPass);
	
    ParmsRR=new Array();
    ParmsRR['User']=UserName;
	ParmsRR['Pass']=UserPass;
    AJAX(ParmsRR,'get_authorization.php','get_authorization_done');
}

function get_authorization_done(x)
{
	AuthorizationLevel=x;
	document.cookie = "UserName=" + CurrentUser;
	document.cookie = "AuthorizationLevel=" + AuthorizationLevel ;	
// + "; expires=Tue, 13 Nov 2018 13:50:00 UTC; path=//";

	if( AuthorizationLevel>0)
	{
		document.getElementById('LoginButton').value='LOGOUT';
	}
	document.getElementById('LoginForm').className='LoginForm_hidden';
	document.getElementById('user').innerHTML=CurrentUser;
	document.getElementById('level').innerHTML=AuthorizationLevel;
}
</script>
<?php
//ini_set('mssql.charset','UTF-16');
/* Specify the server and connection string attributes. */
$serverName = "192.168.0.240";

/* Get UID and PWD from application-specific files.  */
//$uid = file_get_contents("C:\AppData\uid.txt");
//$pwd = file_get_contents("C:\AppData\pwd.txt");

$uid ='sa';
$pwd = 'Window5';

/* Specify the server and connection string attributes. */
$serverName = "192.168.0.240";
//MSSQL Server on 192.168.0.240
$connection_string = 'DRIVER={SQL Server};SERVER=192.168.0.240;DATABASE=ELPRD'; 
$user = 'sa'; 
$pass = 'Window5'; 
$cnx = odbc_connect( $connection_string, $user, $pass );


if( $cnx === false )
{
     die("Unable to connect to Server.</br>");
}
//===========================================================================================
?>
<script>
function gotokey(x)
{
	var NextWebPage='GET_PROJECT.php?PROJECT=' + x ;
	location.assign(NextWebPage);
}
</script>


</head>

<body>


<div class=LoginDetails>
<table>
<tr><td>Logged in as</td><td id='user'>ElectrosapUser</td><tr>
<tr><td>Authorization</td><td id='level'>AuthLevel</td><tr>
</table>
</div>

<br>
<br>
<br>

<table align=center>
<tr><td><img src='logos/ElectroSAP.png' width=500px></td></tr>
<tr><td align=center>&nbsp;</td></tr>
<tr><td align=center><input title='LOGIN' id='LoginButton' type=button class="button bigbut" value='LOGIN' onclick=Login(this) /></td></tr>
<tr><td align=center><input title='GET_SUPPLIERS_TOTAL' type=button class="button bigbut" value='SUPPLIERS STOCK' onclick=GotoTopic(this) /></td></tr>
<tr><td align=center><input title='PROJECT_LISTa' type=button class="button bigbut" value='OPEN PROJECTS'  onclick=GotoTopic(this) /></td></tr>
<tr><td align=center><input title='CHECK_STOCK' type=button class="button bigbut" value='ITEMS TO ORDER'  onclick=GotoTopic(this) /></td></tr>
<tr><td align=center><input title='ITEMS_ON_ORDER' type=button class="button bigbut" value='ITEMS ON ORDER'  onclick=GotoTopic(this) /></td></tr>
<tr><td align=center><input title='ITEM_CATALOGUE' type=button class="button bigbut" value='ITEM CATALOG'  onclick=GotoTopic(this) /></td></tr>
<tr><td align=center><input title='TENDER_LIST' type=button class="button bigbut" value='TENDERS'  onclick=GotoTopic(this) /></td></tr>
</table>

<div id=LoginForm class=LoginForm_hidden>
<table id='Login' border=1>
<tr><td>User Name</td><td><input id='UserName' type=text size=20 value='ElectroSapUser' /></td></tr>
<tr><td>Password</td><td><input id='UserPass' type=password size=20 value='' /></td></tr>
<tr><td>Keep me Signed in</td><td><input id='StayLoggedIn' type=checkbox checked /></td></tr>
<tr><td align='center'><input type=button align='center'
value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' onclick=get_authorization() /></td>
<td align='center'><input type=button text-align='center'
value='&nbsp;&nbsp;&nbsp;&nbsp;Logout&nbsp;&nbsp;&nbsp;&nbsp;' onclick=LogOut() /></td></tr>
</table>


</div>




</body>
<script>

if(AuthorizationLevel>0)
{
	document.getElementById('LoginButton').value='LOGOUT';
}
else
{
	document.getElementById('LoginButton').value='LOGIN';
}
//alert("CurrentUser = " + CurrentUser);
//alert("Authorization Level = " + AuthorizationLevel);

CurrentUser=getCookie('UserName')
//alert(CurrentUser);
document.getElementById('user').innerHTML=CurrentUser;
document.getElementById('level').innerHTML=AuthorizationLevel;
document.getElementById('UserName').innerHTML=CurrentUser;
document.getElementById('UserPass').innerHTML=''; 
 
</script>
</html>
