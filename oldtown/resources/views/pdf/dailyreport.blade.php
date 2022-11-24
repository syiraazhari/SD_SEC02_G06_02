<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div class="">
        <div class="">
            <div>
                <strong>OldTown WhiteCoffee</strong><br>
                Residensi UtmKl <br>
                1-18 Gurney Mall, Residensi UTMKL, <br>
                8, Jalan Maktab, 54100 <br>
                Kuala Lumpur <br>

                <br>
            </div>
        </div>
        <hr>
        <div style="margin-bottom: 2px">&nbsp;</div>
        <div>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <th>Generated By </th>
                            <td class="text-right">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Generated Date: </th>
                            <td class="text-right">{{ $today }}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>
            </div>
        </div>

        <div>
            <table style="width: 80%" align="center">
                <thead>
                    <th style="text-align: left">Report List</th>
                    <th style="text-align: right">Price ( RM )</th>
                </thead>
                <tbody style="text-align: left">
                    <tr>
                    <tr style="background-color: #ddd;">
                        <td style="padding:5px; margin:0%">
                            <div>
                                <strong>Total Daily Sales</strong>
                            </div>
                            <p>Total Daily Sales Today</p>
                        </td>
                        <td style="padding:5px; margin:0%">
                            <div>
                                <strong style="color:#ddd">Total Sum Price</strong>
                            </div>
                            <p class="text-right"> <strong> RM {{ number_format($sale, 2) }} </strong></p>
                        </td>
                    </tr>
                    <tr style="background-color: white;">
                        <td style="padding:5px; margin:0%">
                            <div>
                                <strong>Total Daily Cost</strong>
                            </div>
                            <p  style="background-color: #ddd;" >Total Daily Cost Today</p>
                        </td>
                        <td style="padding:5px; margin:0%">
                            <div>
                                <strong style="color:white">Total Cost Price</strong>
                            </div>
                            <p class="text-right"  style="background-color: #ddd;" >
                                RM {{ number_format( $cost, 2) }} </strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-bottom: 0px">&nbsp;</div>

        <table style="width: 80%" align="center">
            <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px; text-align:left"><div> Total Profits </div></th>
                    <td style="padding: 5px" class="text-right"><strong>  RM {{ number_format($profit, 2) }}
                     </strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
</body>
</html>
