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

        p.banner_text { /* White text on top of th ebanner */
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

        .problemsDiv { /* Individual problem boxes */
            width: 100%;
            height: auto;
            border: 1px solid black;
            background-color: #bbb;
            text-align: center;
        }

        * {
            box-sizing: border-box;
        }

        .button_column {
            float: left;
            width: 20%;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 350px;
        }
        .problem_column { /* Ongoing Calls and Resolved Calls layout */
            float: left;
            width: 40%;
            padding: 5px;
            display: relative;
            height: 350px;
            /*overflow-y: scroll;*/
        }

        #new_call { /* button */
            width: 50%;
            height: 10%;
        }
        #solved_problems {
            overflow-y: scroll;
            height: 300px;
        }
        #unsolved_problems {
            overflow-y: scroll;
            height: 300px;
        }
    </style>
</head>

<body>
<div id="top_banner">
    <h1 style="text-align: center;"><p class="banner_text">Splash Page</p></h1>
</div>
<div id="welcome_header">
    <h2 style="display: inline; padding-left: 4px;">Welcome user1</h2>
    <input style="float: right" type="button" name="" value="Log Out">
</div>

<!-- Left-hand side Column -->

<div class="button_column">
    <button id="new_call" type="button" name="button">New Call</button>
</div>

<!-- Middle Column -->

<div  class="problem_column">
    <h3 style="text-align: center">Ongoing Calls</h3>
    <div id="unsolved_problems" style="width:100%">


    </div>
</div>

<!-- Right-hand side column -->

<div class="problem_column">
    <h3 style="text-align: center">Recently Resolved Calls</h3>
    <div id="solved_problems" style="width:100%">


    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    // at init, load in problem info
    var problems = getProblems();
    // filter into solved and unsolved problems, then add to div
    for(var i=0;i<problems.length;i++) {
        if(problems[i].solved) {
            // select div to add problems to
            var addTo = $("#solved_problems");
            var problem = problems[i];
            addTo.append("<div class='problemsDiv'></div>");
            var newDiv = $("> div:last", addTo);
            // add info to div
            newDiv.append("<p>Date: " + problem.date + ", Name: " + problem.name + "</p>");
            newDiv.append("<p>ID: " + problem.ID + "</p>");
            newDiv.append("<p>Problem Type: " + problem.problemType + "</p>");
            // add edit button
            newDiv.append("<div class='problem_edit_button'></div>");
            $("> div:last", newDiv).bind("click", function () {
                // TODO: add edit button
            });
        } else {
            // select div to add problems to
            var addTo = $("#unsolved_problems");
            var problem = problems[i];
            addTo.append("<div class='problemsDiv'></div>");
            var newDiv = $("> div:last", addTo);
            // add info to div
            newDiv.append("<p>Date: " + problem.date + ", Name: " + problem.name + "</p>");
            newDiv.append("<p>ID: " + problem.ID + "</p>");
            newDiv.append("<p>Problem Type: " + problem.problemType + "</p>");
        }
    }



    function getProblems() {
        // generate data for problems, will be taken from database
        var allProblems = [
            {
                date : "09/01/2018",
                name: "Miguel R.",
                ID: 28,
                problemType: "Hardware",
                solved: true
            },
            {
                date: "10/01/2018",
                ID: 3,
                name: "Rachel L.",
                problemType: "Software",
                solved: true
            },
            {
                date: "10/25/2018",
                ID: 4,
                name: "Jason S.",
                problemType: "Software",
                solved: true
            },
            {
                date: "10/10/2018",
                ID: 3,
                name: "David A.",
                problemType: "Software",
                solved: false
            },
            {
                date: "10/08/2018",
                ID: 7,
                name: "Alexandra K.",
                problemType: "Software",
                solved: false
            },
            {
                date: "10/05/2018",
                ID: 18,
                name: "Robert M.",
                problemType: "Hardware",
                solved: false
            }
        ];
        return allProblems;
    }
</script>
</html>