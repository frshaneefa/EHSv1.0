<!DOCTYPE html>
<html>
<head>
    <title>Print Tickets latest</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .logo {
            max-width: 320px; /* Adjust the size of the logo as needed */
        }
        .company-address {
            text-align: right;
        }
        .ticket {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 15px;
            page-break-before: always; /* Force page break before each ticket */
        }
        .ticket-header {
            font-weight: bold;
        }
        .print-button {
            display: block; /* Hide print button when printing */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-width: 4px; /* Adjust the thickness of the border */
        }

        td, th {
            border: 4px solid black; /* Border for each cell */
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #dcdcdc; /* Grey background for titles */
        }

        td {
            background-color: #ffffff; /* White background for values */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .dark td, .dark th {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .dark tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        @media print {
            .print-button {
                display: none; /* Show print button only when printing */
            }
        }
    </style>
</head>
<body onload="window.print()">
    @foreach ($tickets as $ticket)
        <div class="ticket">
        <div class="header">
            <img src="{{ asset('images\logo_report.png') }}" alt="Company Logo" class="logo">
            <div class="company-address">
                <p><b>ENETECH SDN BHD 202001042952 (1399273A)</b></p>
                <p><b>No. 32A (1st Floor), Jalan Kota Raja J27/J, Section 27,</b></p>
                <p><b>40400 Shah Alam, Selangor</b></p>
                <p><b>Tel : 03-5102 9093 Fax : 03-5192 0994 Website : www.enetech.my</b></p>
            </div>
        </div>
            <table>
                <tr>
                    <th colspan="9">FIELD SERVICE REPORT</th>
                </tr>
                <tr>
                    <th colspan="2">Ticket ID</th>
                    <td colspan="3">#{{ $ticket->id }}</td>
                    <th colspan="1">Date & Time</th>
                    <td colspan="3">{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                </tr>
                <tr>
                    <th colspan="2">Contact Person</th>
                    <td colspan="3">{{ $ticket->user_id }}</td>
                    <th colspan="1">Contact No.</th>
                    <td colspan="3">{{ $ticket->agensi_tid }}</td>
                </tr>
                <tr>
                    <th colspan="2">Agensi / Organization</th>
                    <td colspan="3">{{ $ticket->user_id }}</td>
                    <th colspan="1">Address / Location</th>
                    <td colspan="3">{{ $ticket->agensi_tid }}</td>
                </tr>
                <tr>
                    <th colspan="1">Equipment</th>
                    <th colspan="2">Quantity</th>
                    <th colspan="2">Part No./Serial No.</th>
                    <th colspan="4">Remarks</th>
                </tr>
                <tr>
                    <td colspan="1">{{ $ticket->equipment }}</td>
                    <td colspan="2">{{ $ticket->quantity }}</td>
                    <td colspan="2">{{ $ticket->part_no }}</td>
                    <td colspan="4">{{ $ticket->remarks }}</td>
                </tr>
                <tr>
                    <th colspan="9">Report Descripton</th>
                </tr>
                <tr>
                    <td colspan="9">{{ $ticket->attachments }} <br> {{ $ticket->report_description }}</td>
                </tr>
                <tr>
                    <th colspan="9">Service Details</th>
                </tr>
                <tr>
                    <td colspan="9">{{ $ticket->service_details }}</td>
                </tr>
                <tr>
                    <th colspan="1">Service Status</th>
                    <th colspan="4">Serviced By</th>
                    <th colspan="4">Certified By</th>
                </tr>
                <tr>
                    <td colspan="1">Sign Off Date:<br><br>{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y') }}</td>
                    <td colspan="4" rowspan="4" style="height: 120px; text-align: left;">
                        Name: <br><br>
                        Designation: <br><br><br><br><br><br>
                        Company Chop:
                    </td> <!-- Adjust the height as needed -->
                    <td colspan="4" rowspan="4" style="height: 120px; text-align: left;">    
                        Name: <br><br>
                        Designation: <br><br><br><br><br><br>
                        Company Chop:
                    </td> <!-- Adjust the height as needed -->
                </tr>
                <tr>
                    <td colspan="1">Sign Off Time:<br><br>{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('H:i') }}</td>
                </tr>
            </table>
        </div>
    @endforeach

    <!-- Print button for convenience -->
    <button class="print-button" onclick="window.print()">Print</button>
</body>
</html>
