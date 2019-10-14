<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>{{config('app.name', 'HELPDESK')}}</title>
  <style>
    #top_banner { /* Red banner at the top */
      background-color:#990000;
      position: relative;
      margin: 0;
      width: 100%;
      height: 140px;
    }
    p.banner_text { /* White text on top of the banner */
      position: absolute;
      text-align: left;
      color:#ffffff;
      top: 70px;
      transform: translateY(-110%);
      font-size: 75px;
      font-style: italic;
      font-weight: bold;
      font-family: Franklin Gothic Medium Cond, Times;
      text-indent: 15px;
    }
    label.User_Name_And_Password_Title_Styling {
      font-family: helvetica, Times; color: #000000;
      font-size: 18px;
    }
    input[type=text], input[type=password] { /* Input fields */
      font-family: helvetica, Times;
      font-size: 16px;
      width: 100%;
      padding: 12px 14px;
      margin: 8px 0;
      display: inline-block;
      border: 2px solid #bfbfbf;
      box-sizing: border-box;
    }
    button {
      padding: 14px 20px;
      margin: 8px 0;
      cursor: pointer;
      width: 100%;
      font-family: helvetica, Times; color: ivory;
      font-size: 14px;
      background-color: #bfbfbf;
      border-radius: 4px;
    }
    button:hover {
      opacity: 0.8;
    }
    .container {
      padding: 16px;
    }
    .position {
      background-color: #e6e6e6;
      margin: 5px auto;
      border: 3px solid #bfbfbf;
      width: 35%;
      margin-top: 100px;
    }
  </style>
</head>
<body bgcolor="#f2f2f2">
<div id="top_banner">
  <h1 style="text-align: center;"><p class="banner_text">Login Page</p></h1>
</div>
<form class="position">
  <div class="container">
    <label class="User_Name_And_Password_Title_Styling" for="username"><b>Username</b></label>
    <input class="User_Name_Title_Styling" type="text" name="username" placeholder="Enter Username" required>
    <label class="User_Name_And_Password_Title_Styling" for="password"><b>Password</b></label>
    <input type="text" name="password" placeholder="Enter Password" required>
    <button type="submit">Login</button>
  </div>
</form>
</body>
</html>