
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=TH+Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'TH Sarabun', sans-serif;
        }

        .navbar {
            display: flex;
            background-color: #1E2023;
            color: #fff;
        }
        .logo {
            width: 20%;
            display: flex;
            justify-content: center;
        }

        ul {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
        }

        ul li {
            margin: 0 1rem;
        }

        ul li a {
            color: #fff;
            text-decoration: none;
        }

        header {
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url("https://www.ktc.co.th/pub/media/Article/01/Notebook_Lenovo_IG3_02.webp");
        }

        .header-info {
            text-align: center;
            width: 580px;
            height: 300px;
            color: #fff;
            font-size: 20px;
        }

        .header-info a {
            display: block;
            width: 80px;
            margin-left: auto;
            margin-right: auto;
            background-color: #fff;
            color: #000;
            padding: 0.5rem 1rem;
            text-decoration: none;
        }

        .teams {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }
        .teams-items {
            padding: 2rem;
            background: #EDEDED;
            color: #000;
            text-align: center;
        }

        .teams-items img {
            width: 400px;
        }

        .teams-items a {
            text-decoration: none;
            color: #000;
            background: #fff;
            padding: 0.5rem;
        }

        footer {
            background: #1E2023;
            padding: 1rem;
            text-align: center;
            color: #fff;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 10px 15px;
            color: #000;
            text-decoration: none;
        }

        .nav-item:hover .dropdown-content {
            display: block;
        }
        
    </style>
</head>
<body>
<section class="navbar">
    <div class="logo">
         <img class="d-block mx-auto mb-4" src=" data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMjAuMTk0MTA0NjEyNzQ5MDIgMTI1LjIzOTc1NTc0NDE0MDYyIiBoZWlnaHQ9IjEyNS4yMzk3NTU3NDQxNDA2MiIgd2lkdGg9IjIyMC4xOTQxMDQ2MTI3NDkwMiI+PGc+PHN2ZyB2aWV3Qm94PSIwIDAgMjIwLjE5NDEwNDYxMjc0OTAyIDEyNS4yMzk3NTU3NDQxNDA2MiIgaGVpZ2h0PSIxMjUuMjM5NzU1NzQ0MTQwNjIiIHdpZHRoPSIyMjAuMTk0MTA0NjEyNzQ5MDIiPjxnPjxzdmcgdmlld0JveD0iMCAwIDIyMC4xOTQxMDQ2MTI3NDkwMiAxMjUuMjM5NzU1NzQ0MTQwNjIiIGhlaWdodD0iMTI1LjIzOTc1NTc0NDE0MDYyIiB3aWR0aD0iMjIwLjE5NDEwNDYxMjc0OTAyIj48ZyBpZD0idGV4dGJsb2NrdHJhbnNmb3JtIj48c3ZnIHZpZXdCb3g9IjAgMCAyMjAuMTk0MTA0NjEyNzQ5MDIgMTI1LjIzOTc1NTc0NDE0MDYyIiBoZWlnaHQ9IjEyNS4yMzk3NTU3NDQxNDA2MiIgd2lkdGg9IjIyMC4xOTQxMDQ2MTI3NDkwMiIgaWQ9InRleHRibG9jayI+PGc+PHN2ZyB2aWV3Qm94PSIwIDAgMjIwLjE5NDEwNDYxMjc0OTAyIDY3LjU0ODMzOTg0Mzc1IiBoZWlnaHQ9IjY3LjU0ODMzOTg0Mzc1IiB3aWR0aD0iMjIwLjE5NDEwNDYxMjc0OTAyIj48Zz48c3ZnPjxnLz48Zy8+PC9zdmc+PC9nPjxnPjxzdmc+PGc+PHN2Zy8+PC9nPjxnLz48L3N2Zz48L2c+PGcgaWQ9InRleHQtMCI+PHN2ZyB2aWV3Qm94PSIwIDAgMjIwLjE5NDEwNDYxMjc0OTAyIDY3LjU0ODMzOTg0Mzc1IiBoZWlnaHQ9IjY3LjU0ODMzOTg0Mzc1IiB3aWR0aD0iMjIwLjE5NDEwNDYxMjc0OTAyIj48ZyB0cmFuc2Zvcm09Im1hdHJpeCgxLDAsMCwxLDAsMCkiPjxzdmcgd2lkdGg9IjE0MC42MjY5NTMxMjUiIHZpZXdCb3g9IjEuNjYgLTQxLjE5IDg2LjkxIDQxLjc1IiBoZWlnaHQ9IjY3LjU0ODMzOTg0Mzc1IiBkYXRhLXBhbGV0dGUtY29sb3I9IiMxZWJiZDciPjxwYXRoIGQ9Ik0yNy43MS05LjAxTDI3LjcxLTkuMDFRMjcuNzEtNy4xNSAyNy4xNy01LjcxIDI2LjY0LTQuMjcgMjUuNzEtMy4yMSAyNC43OC0yLjE1IDIzLjUxLTEuNDMgMjIuMjQtMC43MSAyMC43OS0wLjI3IDE5LjM0IDAuMTcgMTcuNzUgMC4zNyAxNi4xNiAwLjU2IDE0LjYgMC41NkwxNC42IDAuNTZRMTIuNSAwLjU2IDEwLjg5IDAuMjkgOS4yOCAwLjAyIDcuODEtMC41NyA2LjM1LTEuMTcgNC45LTIuMTIgMy40NC0zLjA4IDEuNjYtNC40NEwxLjY2LTQuNDQgNi40Ny04LjM3UTcuMTMtNy4xMyA4LjIyLTYuMTIgOS4zLTUuMSAxMC40Ny00LjM3IDExLjY1LTMuNjQgMTIuNzQtMy4yNSAxMy44NC0yLjg2IDE0LjUzLTIuODZMMTQuNTMtMi44NlExNS4wOS0yLjg2IDE1LjgtMi44OSAxNi41LTIuOTMgMTcuMjQtMy4wNCAxNy45Ny0zLjE1IDE4LjY4LTMuMzcgMTkuMzgtMy41OSAxOS45My0zLjk3IDIwLjQ4LTQuMzUgMjAuODEtNC45MiAyMS4xNC01LjQ5IDIxLjE0LTYuM0wyMS4xNC02LjNRMjEuMTQtNy4xMyAyMC43Mi03Ljc1IDIwLjI5LTguMzcgMTkuNi04Ljg0IDE4LjkyLTkuMyAxOC4wNC05LjYyIDE3LjE2LTkuOTQgMTYuMjctMTAuMTggMTUuMzgtMTAuNDIgMTQuNTUtMTAuNjEgMTMuNzItMTAuNzkgMTMuMTEtMTAuOTZMMTMuMTEtMTAuOTZRMTEuOTktMTEuMjggMTAuNzQtMTEuNjEgOS41LTExLjk0IDguMjgtMTIuMzcgNy4wNi0xMi43OSA1Ljk0LTEzLjM4IDQuODMtMTMuOTYgMy45OS0xNC43OCAzLjE1LTE1LjYgMi42NS0xNi43MSAyLjE1LTE3LjgyIDIuMTUtMTkuMzFMMi4xNS0xOS4zMVEyLjE1LTIyLjA1IDMuMjMtMjMuODkgNC4zMi0yNS43MyA2LjEtMjYuODQgNy44OS0yNy45NSAxMC4xNi0yOC40MiAxMi40My0yOC44OCAxNC43Ny0yOC44OEwxNC43Ny0yOC44OFExNi4zOC0yOC44OCAxOC4xNi0yOC41NSAxOS45NS0yOC4yMiAyMS42My0yNy41OCAyMy4zMi0yNi45MyAyNC43OC0yNiAyNi4yNS0yNS4wNyAyNy4yMi0yMy44OEwyNy4yMi0yMy44OCAyMi40MS0xOS45MlEyMS44OC0yMS4zOSAyMS4wMS0yMi40NCAyMC4xNC0yMy40OSAxOS4xMy0yNC4xNiAxOC4xMi0yNC44MyAxNy4wNS0yNS4xNSAxNS45OS0yNS40NiAxNS4wOS0yNS40NkwxNS4wOS0yNS40NlExNC4yMS0yNS40NiAxMy4xMS0yNS4zOSAxMi4wMS0yNS4zMiAxMS4wNS0yNC45OCAxMC4wOC0yNC42MyA5LjQxLTIzLjk0IDguNzQtMjMuMjQgOC43NC0yMi4wMkw4Ljc0LTIyLjAyUTguNzQtMjEuMTQgOS4xNC0yMC41MiA5LjU1LTE5LjkgMTAuMjEtMTkuNDUgMTAuODYtMTguOTkgMTEuNzEtMTguNjkgMTIuNTUtMTguMzggMTMuNDMtMTguMTUgMTQuMzEtMTcuOTIgMTUuMTQtMTcuNzUgMTUuOTctMTcuNTggMTYuNjMtMTcuMzhMMTYuNjMtMTcuMzhRMTcuNzUtMTcuMDcgMTkuMDEtMTYuNzQgMjAuMjYtMTYuNDEgMjEuNDgtMTUuOTggMjIuNzEtMTUuNTUgMjMuODQtMTQuOTggMjQuOTgtMTQuNCAyNS44My0xMy41NyAyNi42OC0xMi43NCAyNy4yLTExLjYzIDI3LjcxLTEwLjUyIDI3LjcxLTkuMDFaTTM5LjY5LTEzLjM4TDM5LjY5LTEzLjM4UTQxLjIxLTEzLjA0IDQyLjcyLTEyLjg0IDQ0LjI0LTEyLjY1IDQ1Ljc3LTEyLjY1TDQ1Ljc3LTEyLjY1UTQ3LjM5LTEyLjY1IDQ4Ljc2LTEyLjk1IDUwLjE0LTEzLjI2IDUxLjE2LTEzLjk4IDUyLjE3LTE0LjcgNTIuNzYtMTUuODkgNTMuMzQtMTcuMDkgNTMuMzQtMTguODdMNTMuMzQtMTguODdRNTMuMzQtMjAuMzEgNTIuOTUtMjEuNTEgNTIuNTYtMjIuNzEgNTEuNzktMjMuNTYgNTEuMDItMjQuNDEgNDkuOS0yNC44OSA0OC43OC0yNS4zNyA0Ny4yOS0yNS4zN0w0Ny4yOS0yNS4zN1E0NS45LTI1LjM3IDQ0Ljc5LTI0Ljg1IDQzLjY3LTI0LjM0IDQyLjgzLTIzLjQ3IDQxLjk5LTIyLjYxIDQxLjM5LTIxLjQ2IDQwLjc5LTIwLjMxIDQwLjQtMTkuMDcgNDAuMDEtMTcuODIgMzkuODQtMTYuNTUgMzkuNjctMTUuMjggMzkuNjctMTQuMTZMMzkuNjctMTQuMTZRMzkuNjctMTMuOTYgMzkuNjctMTMuNzcgMzkuNjctMTMuNTcgMzkuNjktMTMuMzhaTTYwLjAzLTE4Ljk1TDYwLjAzLTE4Ljk1UTYwLjAzLTE3LjIxIDU5LjQ3LTE1Ljg2IDU4LjkxLTE0LjUgNTcuOTQtMTMuNDggNTYuOTgtMTIuNDUgNTUuNzEtMTEuNzQgNTQuNDQtMTEuMDQgNTMtMTAuNTggNTEuNTYtMTAuMTMgNTAuMDMtOS45NCA0OC41MS05Ljc0IDQ3LjA3LTkuNzRMNDcuMDctOS43NFE0NS4yNC05Ljc0IDQzLjQ1LTEwIDQxLjY3LTEwLjI1IDM5Ljk0LTEwLjgyTDM5Ljk0LTEwLjgyUTQwLjIxLTkuMiA0MC43OS03Ljc1IDQxLjM4LTYuMyA0Mi4zNi01LjIxIDQzLjMzLTQuMTMgNDQuNzYtMy40OSA0Ni4xOS0yLjg2IDQ4LjE0LTIuODZMNDguMTQtMi44NlE0OS40NC0yLjg2IDUwLjYxLTMuMjUgNTEuNzgtMy42NCA1Mi43Ni00LjM1IDUzLjczLTUuMDUgNTQuNDgtNi4wMyA1NS4yMi03LjAxIDU1LjY5LTguMkw1NS42OS04LjIgNTkuMjUtNi44OFE1OC40NC00Ljk2IDU3LjA0LTMuNTUgNTUuNjQtMi4xNSA1My44Ny0xLjIzIDUyLjEtMC4zMiA1MC4xMSAwLjEyIDQ4LjEyIDAuNTYgNDYuMTYgMC41Nkw0Ni4xNiAwLjU2UTQyLjk0IDAuNTYgNDAuMjEtMC41MiAzNy40Ny0xLjYxIDM1LjUtMy41NiAzMy41Mi01LjUyIDMyLjM5LTguMjMgMzEuMjctMTAuOTQgMzEuMjctMTQuMTZMMzEuMjctMTQuMTZRMzEuMjctMTcuMzggMzIuMzktMjAuMDkgMzMuNTItMjIuOCAzNS41LTI0Ljc2IDM3LjQ3LTI2LjcxIDQwLjIxLTI3LjggNDIuOTQtMjguODggNDYuMTYtMjguODhMNDYuMTYtMjguODhRNDcuNzMtMjguODggNDkuMzYtMjguNjYgNTEtMjguNDQgNTIuNTQtMjcuOTcgNTQuMDctMjcuNDkgNTUuNDQtMjYuNzMgNTYuODEtMjUuOTggNTcuODItMjQuODcgNTguODQtMjMuNzUgNTkuNDMtMjIuMjkgNjAuMDMtMjAuODMgNjAuMDMtMTguOTVaTTczLjQzLTMyLjYyTDczLjQzIDAgNjUuMTggMCA2NS4xOC00MS4xOSA2OC4zNS00MS4xOSA3My40My0zMi42MlpNODguNTctMzIuNjJMODguNTcgMCA4MC4zMSAwIDgwLjMxLTQxLjE5IDgzLjQ5LTQxLjE5IDg4LjU3LTMyLjYyWiIgb3BhY2l0eT0iMSIgdHJhbnNmb3JtPSJtYXRyaXgoMSwwLDAsMSwwLDApIiBmaWxsPSIjZmZmZmZmIiBjbGFzcz0id29yZG1hcmstdGV4dC0wIiBkYXRhLWZpbGwtcGFsZXR0ZS1jb2xvcj0icHJpbWFyeSIvPjwvc3ZnPjwvZz48Zz48c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgeD0iMTU2LjU3NDcwNzAzMTI1IiB5PSIwIiB2aWV3Qm94PSI3Ljg5OSA1LjMgODQuMjAxIDg5LjQwMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMTAwIDEwMCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgaGVpZ2h0PSI2Ny41NDgzMzk4NDM3NSIgd2lkdGg9IjYzLjYxOTM5NzU4MTQ5OTAxNSIgY2xhc3M9Imljb24tZHhlLTAiIGRhdGEtZmlsbC1wYWxldHRlLWNvbG9yPSJhY2NlbnQiIGlkPSJkeGUtMCIgZmlsbD0iI2ZmZmZmZiI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03OS4wMDEgNTYuMTAxVjU0LjEwMUg4My45NUw4Ni41NSAyOS4zSDI2LjQ1TDI4LjE0OSA0NS4xMDFIMzMuMzk5VjQ3LjEwMUgyOC4zNUwzMC4yNSA2NC43MDFINzcuNzVWNjYuNzAxSDMwLjQ1TDMwLjc1MSA2OS43MDFIODIuM0w4My43NTEgNTYuMTAxek04NC4wMDEgNzkuOEM4NS43MzMgODEuNTMzIDg2LjYwMSA4My42MTcgODYuNjAxIDg2LjA1IDg2LjYwMSA4OC40MTcgODUuNzE4IDkwLjQ1IDgzLjk1MSA5Mi4xNTEgODIuMzE4IDkzLjg1MSA4MC4yODUgOTQuNzAxIDc3Ljg1MSA5NC43MDFTNzMuMzUxIDkzLjg1MSA3MS42NSA5Mi4xNTFDNjkuOTUxIDkwLjM4NCA2OS4xMDEgODguMzUxIDY5LjEwMSA4Ni4wNSA2OS4xMDEgODMuNjE3IDY5Ljk1MSA4MS41NSA3MS42NSA3OS44NTEgNzMuMzUxIDc4LjE1MSA3NS40MTggNzcuMyA3Ny44NTEgNzcuMyA4MC4yNTEgNzcuMyA4Mi4zIDc4LjEzNCA4NC4wMDEgNzkuOE03NS4xNDkgODMuMzUxQTMuODggMy44OCAwIDAgMCA3NC4xIDg2LjA1Qzc0LjEgODcuMDUgNzQuNDY3IDg3LjkwMSA3NS4yIDg4LjYwMSA3NS45MzIgODkuMzMzIDc2LjgxNyA4OS43MDEgNzcuODUgODkuNzAxUzc5Ljc1IDg5LjM1MSA4MC40NSA4OC42NTFDODEuMjE4IDg3Ljg4NCA4MS42IDg3LjAxNyA4MS42IDg2LjA1IDgxLjYgODUuMDE3IDgxLjIxNyA4NC4xMTcgODAuNDUgODMuMzUxIDc5Ljc4NCA4Mi42NTEgNzguOTE3IDgyLjMgNzcuODUgODIuM1M3NS44ODQgODIuNjUgNzUuMTQ5IDgzLjM1MU04Ni43NTEgNzQuN0gyNi4yTDIwLjg5OSAyNC41NUgyMC45NUwxOS4zOTkgMTAuM0g3Ljg5OVY1LjNIMjMuOTVMMjUuOTUgMjQuM0g5Mi4xek01OS44OTkgNTguOEg1Mi4zOTlWNDguNjAxSDQ0Ljc1MUw1Ni4xMDEgMzMuOTUxIDY3LjQgNDguNjAxSDU5Ljl6TTI3LjE0OSA4Ni4wNUMyNy4xNDkgODMuNjE3IDI4LjAwMSA4MS41NSAyOS43IDc5Ljg1MSAzMS4zOTkgNzguMTUxIDMzLjQ2OCA3Ny4zIDM1Ljg5OSA3Ny4zIDM4LjM5OSA3Ny4zIDQwLjQ1IDc4LjE1MSA0Mi4wNDkgNzkuODUxIDQzLjc1IDgxLjU1IDQ0LjYgODMuNjE4IDQ0LjYgODYuMDUgNDQuNiA4OC40ODQgNDMuNzUgOTAuNTE3IDQyLjA0OSA5Mi4xNTEgNDAuNDQ5IDkzLjg1MSAzOC4zOTkgOTQuNzAxIDM1Ljg5OSA5NC43MDEgMzMuNDY3IDk0LjcwMSAzMS4zOTkgOTMuODUxIDI5LjcgOTIuMTUxIDI4LjAwMSA5MC4zODQgMjcuMTQ5IDg4LjM1MSAyNy4xNDkgODYuMDVNMzUuODk5IDgyLjNDMzQuODMzIDgyLjMgMzMuOTMyIDgyLjY1MSAzMy4yIDgzLjM1MUEzLjg4IDMuODggMCAwIDAgMzIuMTQ5IDg2LjA1QzMyLjE0OSA4Ny4wNSAzMi41MTYgODcuOTAxIDMzLjI1MSA4OC42MDEgMzMuOTgzIDg5LjMzMyAzNC44NjYgODkuNzAxIDM1Ljg5OSA4OS43MDFTMzcuNzg0IDg5LjM1MSAzOC40NSA4OC42NTFMMzguNTUgODguNjAxQzM5LjI1MSA4Ny45MDEgMzkuNjAxIDg3LjA1IDM5LjYwMSA4Ni4wNSAzOS42MDEgODQuOTg0IDM5LjIzNCA4NC4wODMgMzguNTAxIDgzLjM1MVY4My4zQzM3LjgzMyA4Mi42MzQgMzYuOTY4IDgyLjMgMzUuODk5IDgyLjMiIGZpbGw9IiNmZmZmZmYiIGRhdGEtZmlsbC1wYWxldHRlLWNvbG9yPSJhY2NlbnQiLz48L3N2Zz48L2c+PC9zdmc+PC9nPjwvc3ZnPjwvZz48ZyB0cmFuc2Zvcm09Im1hdHJpeCgxLDAsMCwxLDQ3Ljg4NzAwODMzNDg2MTU1LDgzLjQ5NDg4MTcyMDcwMzEyKSI+PHN2ZyB2aWV3Qm94PSIwIDAgMTI0LjQyMDA4Nzk0MzAyNTkyIDQxLjc0NDg3NDAyMzQzNzUiIGhlaWdodD0iNDEuNzQ0ODc0MDIzNDM3NSIgd2lkdGg9IjEyNC40MjAwODc5NDMwMjU5MiI+PGcgdHJhbnNmb3JtPSJtYXRyaXgoMSwwLDAsMSwwLDApIj48c3ZnIHdpZHRoPSIxMjQuNDIwMDg3OTQzMDI1OTIiIHZpZXdCb3g9IjIuMTQ5OTk5OTk5OTk5OTk5NSAtNDAuMzUgMTIyLjE5IDQxIiBoZWlnaHQ9IjQxLjc0NDg3NDAyMzQzNzUiIGRhdGEtcGFsZXR0ZS1jb2xvcj0iIzRiOTFmMSI+PHBhdGggZD0iTTIuNi0zOS45NUwyLjYtMzkuOTVRNS4xNS0zOS45NSA5Ljk1LTQwLjE1IDE0Ljc1LTQwLjM1IDE2LjMtNDAuMzVMMTYuMy00MC4zNSAxNy42NS00MC4zNVEyNC4yLTQwLjM1IDI3LjQtMzcuNjggMzAuNi0zNSAzMC42LTMwLjY1TDMwLjYtMzAuNjVRMzAuNi0yNC40NSAyMi41LTIyLjA1TDIyLjUtMjIuMDUgMjIuNS0yMS45UTI3LjItMjEuMiAyOS45My0xOC4yMyAzMi42NS0xNS4yNSAzMi42NS0xMS4xTDMyLjY1LTExLjFRMzIuNjUtNS41NSAyOC44OC0yLjQ1IDI1LjEgMC42NSAxNy44IDAuNjVMMTcuOCAwLjY1UTE1LjggMC42NSAxMS4zMyAwLjMzIDYuODUgMCA0LjIgMEw0LjIgMFEzLjkgMCAzLjI1IDAuMDMgMi42IDAuMDUgMi4zIDAuMDVMMi4zIDAuMDVRMi0wLjg1IDIuMy0xLjc1TDIuMy0xLjc1IDYuNDUtMi4zUTYuNjUtNC4yIDYuNjUtOC4xNUw2LjY1LTguMTUgNi42NS0zNy42IDIuNi0zOC4xUTIuNC0zOC44NSAyLjYtMzkuOTVaTTE2LTIwLjNMMTYtMjAuMyAxMi0yMC4zIDEyLTIuMlExNC41NS0xLjc1IDE2LjA1LTEuNjVMMTYuMDUtMS42NVEyMi4xLTEuNjUgMjQuNC0zLjkzIDI2LjctNi4yIDI2LjctMTEuMDVMMjYuNy0xMS4wNVEyNi43LTE0Ljk1IDIzLjg4LTE3LjYzIDIxLjA1LTIwLjMgMTYtMjAuM1pNMTYuMzUtMzguMjVMMTYuMzUtMzguMjVRMTMuODUtMzguMjUgMTIuMi0zNy45TDEyLjItMzcuOVExMi0zNiAxMi0zMS42NUwxMi0zMS42NSAxMi0yMi44IDE1LjktMjIuOFEyMC41NS0yMi44IDIyLjY4LTI0LjcgMjQuOC0yNi42IDI0LjgtMzAuMzVMMjQuOC0zMC4zNVEyNC44LTM0LjE1IDIyLjQ4LTM2LjIgMjAuMTUtMzguMjUgMTYuMzUtMzguMjVaTTM3LjQ1LTM5Ljk1TDM3LjQ1LTM5Ljk1UTQwLTM5Ljk1IDQ0LjgtNDAuMTUgNDkuNi00MC4zNSA1MS4xNS00MC4zNUw1MS4xNS00MC4zNSA1Mi41LTQwLjM1UTU5LjA1LTQwLjM1IDYyLjI1LTM3LjY4IDY1LjQ1LTM1IDY1LjQ1LTMwLjY1TDY1LjQ1LTMwLjY1UTY1LjQ1LTI0LjQ1IDU3LjM1LTIyLjA1TDU3LjM1LTIyLjA1IDU3LjM1LTIxLjlRNjIuMDUtMjEuMiA2NC43Ny0xOC4yMyA2Ny41LTE1LjI1IDY3LjUtMTEuMUw2Ny41LTExLjFRNjcuNS01LjU1IDYzLjcyLTIuNDUgNTkuOTUgMC42NSA1Mi42NSAwLjY1TDUyLjY1IDAuNjVRNTAuNjUgMC42NSA0Ni4xNyAwLjMzIDQxLjcgMCAzOS4wNSAwTDM5LjA1IDBRMzguNzUgMCAzOC4xIDAuMDMgMzcuNDUgMC4wNSAzNy4xNSAwLjA1TDM3LjE1IDAuMDVRMzYuODUtMC44NSAzNy4xNS0xLjc1TDM3LjE1LTEuNzUgNDEuMy0yLjNRNDEuNS00LjIgNDEuNS04LjE1TDQxLjUtOC4xNSA0MS41LTM3LjYgMzcuNDUtMzguMVEzNy4yNS0zOC44NSAzNy40NS0zOS45NVpNNTAuODUtMjAuM0w1MC44NS0yMC4zIDQ2Ljg1LTIwLjMgNDYuODUtMi4yUTQ5LjQtMS43NSA1MC45LTEuNjVMNTAuOS0xLjY1UTU2Ljk1LTEuNjUgNTkuMjUtMy45MyA2MS41NS02LjIgNjEuNTUtMTEuMDVMNjEuNTUtMTEuMDVRNjEuNTUtMTQuOTUgNTguNzItMTcuNjMgNTUuOS0yMC4zIDUwLjg1LTIwLjNaTTUxLjItMzguMjVMNTEuMi0zOC4yNVE0OC43LTM4LjI1IDQ3LjA1LTM3LjlMNDcuMDUtMzcuOVE0Ni44NS0zNiA0Ni44NS0zMS42NUw0Ni44NS0zMS42NSA0Ni44NS0yMi44IDUwLjc1LTIyLjhRNTUuNC0yMi44IDU3LjUyLTI0LjcgNTkuNjUtMjYuNiA1OS42NS0zMC4zNUw1OS42NS0zMC4zNVE1OS42NS0zNC4xNSA1Ny4zMi0zNi4yIDU1LTM4LjI1IDUxLjItMzguMjVaTTgxLjctMzEuNjVMODEuNy0zMS42NSA4MS43LTIuMiA4NS43NS0xLjdRODUuOTUtMC45NSA4NS43NSAwLjE1TDg1Ljc1IDAuMTVRODIuNiAwIDc4LjkgMEw3OC45IDBRNzYuMiAwIDcyIDAuMUw3MiAwLjFRNzEuNy0wLjggNzItMS43TDcyLTEuNyA3Ni4xNS0yLjNRNzYuMzUtNC4yIDc2LjM1LTguMTVMNzYuMzUtOC4xNSA3Ni4zNS0zNy42IDcyLjMtMzguMVE3Mi4xLTM4Ljg1IDcyLjMtMzkuOTVMNzIuMy0zOS45NVE3NS4wNS0zOS43NSA3OS4xNS0zOS43NUw3OS4xNS0zOS43NVE4Mi44LTM5Ljc1IDg2LjA1LTM5LjlMODYuMDUtMzkuOVE4Ni4zNS0zOSA4Ni4wNS0zOC4xTDg2LjA1LTM4LjEgODEuOS0zNy41UTgxLjctMzUuNiA4MS43LTMxLjY1Wk04OS42OS0yOC4yTDg5Ljc0LTM5LjggMTI0LjI5LTM5LjggMTI0LjM0LTI4LjJRMTIzLjI0LTI4IDEyMi40OS0yOC4yTDEyMi40OS0yOC4yIDEyMC4xNC0zNy4yNSAxMDkuNzQtMzcuMjUgMTA5Ljc0LTIuMiAxMTQuNzktMS43UTExNC45OS0wLjk1IDExNC43OSAwLjE1TDExNC43OSAwLjE1UTExMS42NCAwIDEwNy4xOSAwTDEwNy4xOSAwUTEwMy43NCAwIDk5LjU0IDAuMUw5OS41NCAwLjFROTkuMjQtMC44IDk5LjU0LTEuN0w5OS41NC0xLjcgMTA0LjE5LTIuM1ExMDQuMzktNC4yIDEwNC4zOS04LjE1TDEwNC4zOS04LjE1IDEwNC4zOS0zNy4yNSA5My44OS0zNy4yNSA5MS41NC0yOC4yUTkwLjc5LTI4IDg5LjY5LTI4LjJMODkuNjktMjguMloiIG9wYWNpdHk9IjEiIHRyYW5zZm9ybT0ibWF0cml4KDEsMCwwLDEsMCwwKSIgZmlsbD0iI2ZmZmZmZiIgY2xhc3M9InNsb2dhbi10ZXh0LTEiIGRhdGEtZmlsbC1wYWxldHRlLWNvbG9yPSJzZWNvbmRhcnkiIGlkPSJ0ZXh0LTEiLz48L3N2Zz48L2c+PC9zdmc+PC9nPjwvc3ZnPjwvZz48L3N2Zz48L2c+PC9zdmc+PC9nPjxkZWZzLz48L3N2Zz4=" alt="" width="100" height="100">
    </div>
    <ul>
        <li class="nav-item"><a href="postlie.php" class="nav-link"><i class="fa-solid fa-signs-post"></i>POST</a></li>
        <li class="nav-item"><a href="product-listlie.php">BUY</a></li>
        <li class="nav-item"><a href="https://www.facebook.com/Bebee.IT" class="nav-link">FACEBOOK</a></li>
        <li class="nav-item dropdown"></li>
    </ul>
</section>

<header>
    <div class="header-info">
        <h1>Welcome To My Shop BBIT</h1>
        <p>ยินดีต้อนรับสู่ร้านค้าบีบีไอที เลือกสรรค์อุปกรณ์และบริการที่มีคุณภาพในราคาที่เหมาะสม 
            เพื่อลูกค้าทุกท่านที่มาใช้บริการ เราจัดจำหน่ายพร้อมให้บริการสินค้าไอที และคำแนะนำต่างๆ อย่างมั่นใจ</p>
        <a href="http://localhost/shoppingcart/login/register2.php" class="header-btn">Sign in</a>  
    </div>
</header>

<section class="teams">
    <div class="teams-items">
        <h3>เมาส์ USB MOUSE ANITECH A101</h3>
        <img src="https://inwfile.com/s-ge/5ka3lh.jpg" alt="">
        <p>ช่องเสียบแบบ: USB 2.0 ความละเอียด : 1000 จุดต่อนิ้ว ระบบปลั๊กแอนเพลย์ : ไม่จำเป็นต้องมีซอฟต์แวร์เพียงเสียบสาย 
            ไฟเซนเซอร์บนเมาส์ : สีแดง ความยาวสายเคเบิล : 1.2 เมตร</p>
        <a href="http://localhost/shoppingcart/product-details2.php?id=70">ดูสินค้า</a>
    </div>

    <div class="teams-items">
        <h3>ไมโครโฟน Fantech Leviosa MCX01</h3>
        <img src="https://down-th.img.susercontent.com/file/85f1a0398fdc91ceec7c53164811d1f9" alt="">
        <p>Brand.FANTECH Model.LEVIOSA-MCX01 Sensitivity Mic.-38dB±3dB Frequency range Mic.20Hz-20kHz 
            Impedance Mic.16 Ohm Connector.USB Special Feature.</p>
        <a href="http://localhost/shoppingcart/product-details2.php?id=53">ดูสินค้า</a>
    </div>

    <div class="teams-items">
        <h3>จอย JOY STICK XBOX ONE</h3>
        <img src="https://res.cloudinary.com/itcity-production/image/upload/f_jpg,q_80,w_1000/v1661845900/products/PRD202208002999/skus/kxe2gnjbblfdozanx8wv.jpg" alt="">
        <p>InterfaceBluetooth / USB-C Cable Operating System SupportCompatible 
            WithXbox Series X, Xbox Series S, Xbox One, Windows 10/11, Android, and iOS</p>
        <a href="http://localhost/shoppingcart/product-details2.php?id=56">ดูสินค้า</a>
    </div>
</section>

<footer>
    <p>&copy; 2024 CREATE BY BIRD</p>
</footer>
</body>
</html>
