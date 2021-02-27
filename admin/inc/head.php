
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Blood Bank - Login</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
    .donor-container,
    .camp-container,
    .unit-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .donor,
    .camp,
    .unit,
    .donation,
    .request {
        display: flex;
        flex-direction: row;
        width: 350px;
        margin: 15px;
        border: 1px solid grey;
        position: relative;
        border-radius: 20px;
        align-items: center;
        padding: 10px;
    }

    .donor {
        max-width: 350px;
        margin: 15px 5px;

    }

    .donor-group,
    .unit-group,
    .blood-group,
    .request-bg {
        width: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.4rem;
        color: white;
        position: relative;
        left: -25px;
        border-radius: 10px;
        padding: 10px;
    }

    .donor-address {
        display: flex;
        flex-direction: column;
    }

    .camp {
        max-width: 450px;
        width: 100%;
        flex-direction: column;
        padding: 10px;
    }

    .camp-name {
        position: relative;
        bottom: 20px;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        color: white;
    }

    .camp-info,
    .camp-contact {
        display: flex;
    }

    .camp-info {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .camp-address {
        display: flex;
        width: 100%;
    }

    .camp-address h5,
    .camp-address h4 {
        display: inline-block;
    }

    .unit {
        max-width: 400px;
        width: 100%;
        height: 300px;
        position: relative;
    }

    .unit-group {
        width: 100%;
        font-size: 4rem;
        height: 150px;
        font-weight: 700;
        position: absolute;
        top: -15px;
        left: -15px;
    }

    .unit-info {
        position: relative;
        top: 20%;
        left: 15%;
    }

    .donation,.request {
        width: 400px;
        padding: 10px;
        font-size: 20px;
    }

    .blood-group, .request-bg {
        background: #DE0A1E;
        left: -40px;
        top: 0;
        padding: 25px 10px;
    }
    .request-bg {
        padding: 0;
        border-radius: 5px;
        overflow: hidden;
    }
.request-bg .blood-group {
    padding: 10px;
}
    .request-bg{
        display: flex;
        flex-direction: column;
        align-items: stretch;
        text-align: center;
        border-radius: 10px;

    }
    .request-bg .urgency{
        background: #EE848E;
        font-size: 16px;
    }
      .request-bg .blood-group{
        width: 100%;
        left:0;
        border-radius: 0;
        background: #DE0A1E;
      }
    </style><!--  -->

</head>
