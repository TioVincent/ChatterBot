<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Robot | Your friendly ChatterBot</title>
        <link rel="icon" href="images/icon.png" >
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div class="pageHeader">
            <img src="images/logo.png" />
            <h1>Robot</h1><h3> | Your friendly ChatterBot</h3>
        </div>
        <div class="pageMain">
            <div class="tableContent" id="tableContent">
                <table align="center" name="tableChat" id="tableChat">
                    <tr><td class="msgBot"><strong>Robot:</strong> Pergunte-me o que quiser...que tal come&ccedil;ar com um 'oi'?</td></tr>
                </table>
            </div>
            <input type="text" name="userQuote" id="userQuote" placeholder="Digite sua mensagem aqui..." onkeypress="return answerMeToo(event);" class="msgInput">
            <input type="button" name="ask" id="ask" onclick="answerMe(document.getElementById('userQuote').value);" value="Enviar" class="msgButton">
        </div>
        <div class="pageFooter"><p><strong>Copyright &copy; 2017 Luan Franco. All rights reserved.</strong></p></div>
    </body>
</html>

<script language="javascript">
    function OnEnter(evt) {
        var key_code = evt.keyCode  ? evt.keyCode  :
                       evt.charCode ? evt.charCode :
                       evt.which    ? evt.which    : void 0;
 
        if (key_code === 13) {
            return true;
        }
    }
    
    function answerMeToo(e) {
        if(OnEnter(e)) {
            answerMe(document.getElementById('userQuote').value);
        }
    }
    
    function answerMe(userQ) {
        if (userQ !== "") {
            $("#tableChat").append("<tr><td class='msgUser'><strong>Voc&ecirc;:</strong> " + userQ + "</td></tr>");
            $.ajax({
                type: "post",
                url: "ajax/getAnswer.php?userQ=" + userQ,
                success: function(data) {
                    if (data !== "") {
                        $("#tableChat").append("<tr><td class='msgBot'><strong>Robot:</strong> " + data + "</td></tr>");
                    }
                }
            });
            $("#userQuote").val("");
            
            $("#tableContent").animate({                   
                scrollTop: $("#tableChat").height()
            }, 500);
        }
    }
</script>