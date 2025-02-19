<html>
    <head>
        <title>
            Mybook | Sign up
        </title>
    </head>
    <style>
        body {
            font-family: tahoma;
            background-color: #e9ebee;
            margin: 0;
            padding: 0;
        }
        #bar {
            height: 100px;
            background-color: #3c5a99;
            color: #d9dfeb;
            font-size: 40px;
            padding: 4px;
        }
        #signup_button {
            background-color: #42b72a;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 4px;
            float: right;
            font-size: 20px;
        }
        #login_card {
            background-color: white;
            width: 800px;
            /* height: 500px; */
            margin: auto;
            margin-top: 50px;
            padding: 10px;
            text-align: center;
            padding-top: 50px;
        }
        #text {
            height: 40px;
            width: 300px;
            border-radius: 4px;
            border: solid 1px #ccc;
            padding: 4px;
            font-size: 14px;
        }
        #button {
            width: 300px;
            height: 40px;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            background-color: #3c5a99;
            color: #d9dfeb;
        }
    </style>
    <body>
        <div id="bar">
            Mybook
            <div id="signup_button">Log in</div>
        </div>
        <div id="login_card">
            <h2>Sign up to Mybook</h2><br><br>
            <input type="text" id="text" placeholder="First Name"><br><br>
            <input type="text" id="text" placeholder="Last Name"><br><br>
            <div style="display: inline-block; text-align: left;">
            <label for="gender" style="display: block;">Gender:</label>
            <select id="text" name="gender">
              <option value="">Choose your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select><br><br>
            <input type="text" id="text" placeholder="User Email"><br><br>
            <input type="password" id="text" placeholder="User's Password"><br><br>
            <input type="password" id="text" placeholder="Retype Password"><br><br>
            <input type="submit" id="button" value="Sign up"><br><br><br>
        </div>
    </body>
</html>
