<html>
<head>
    <title>Admin page</title>
    <link rel="stylesheet" type="text/css" href="admpageCSS.css">
</head>
<body>
<div class="container">
<form>
    <label for="pswd">Enter password for admin: </label>
    <input type="password" id="pswd">
    <input type="button" value="Submit" onclick="checkPswd();" />
    <button onclick="location.href='index.php'" type="button"><span></span>Home</button>
</form>
</div>

<script type="text/javascript">
    
    function checkPswd() {
        var confirmPassword = "dariusman1";
        var password = document.getElementById("pswd").value;
        if (password == confirmPassword) {
             window.location="admpage.php";
        }
        else{
            alert("Passwords do not match.");
        }
    }

</script>
</body>
</html>