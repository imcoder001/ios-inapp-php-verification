<html>
    <head>
        <title>iTunes in-app Purchase Validator Tool</title>
        <meta name="description" value="iTunes in-app Purchase Validator Tool" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>

        <style>
            label.receipt{
                margin-bottom:10px;
                font-weight: bold;
                font-family:helvetica,arial;
                font-size:16px;
                display: inline-block;
            }
            .submit{
                cursor: pointer;
                background:#6666ff;
                color: #fff;
                border:0;
                border-radius: 3px;
                padding:5px 10px;
                display: inline-block;
                margin-top:5px;
            }
        </style>
    </head>
    <body>

        <div id="retData" style="text-align:center;">
            <form name="receipttoken" action="submit.php" method="post">
                <div>
                    <label for="receipt" class="receipt">
                        Enter Receipt (base64) code
                    </label>
                </div>
                <div>
                    <textarea type="text" style="width:300px; height:200px;" name="receipt" id="receipt" required="required"></textarea>
                </div>
                <div>
                    <label for="sandbox">Sandbox</label>
                    <input type="checkbox" name="sandbox"  value="1" id="sandbox" />
                </div>
                <div>
                    <input type="submit" value="Validate" class="submit" />
                </div>
            </form>
        </div>
    </body>
</html> 
